<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $userModel->findAll(),
        ]);
    }

    public function new(): string
    {
        return view('users/form', [
            'title'      => 'New User',
            'heading'    => 'Add New User',
            'formAction' => site_url('users'),
            'user'       => [],
            'isEdit'     => false,
        ]);
    }

    public function create()
    {
        $data = $this->userData();

        if (! $this->validateData($data, $this->userRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        (new UserModel())->insert($data);

        return redirect()->to(site_url('users'))->with('success', 'User account created successfully.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/form', [
            'title'      => 'Edit User',
            'heading'    => 'Edit User Account',
            'formAction' => site_url("users/{$id}"),
            'user'       => $user,
            'isEdit'     => true,
        ]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $data = $this->userData();

        if (! $this->validateData($data, $this->userRules($id))) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $avatar = $this->request->getFile('avatar');

        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            if (! $this->validate($this->avatarRules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $extension = strtolower((string) $avatar->guessExtension());
            $extension = $extension === 'jpeg' ? 'jpg' : $extension;
            $filename  = bin2hex(random_bytes(16)) . '.' . $extension;
            $uploadDir = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars';

            if (! is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            service('image')
                ->withFile($avatar->getTempName())
                ->fit(240, 240, 'center')
                ->save($uploadDir . DIRECTORY_SEPARATOR . $filename, 85);

            $data['avatar'] = $filename;
        }

        $model->update($id, $data);

        return redirect()->to(site_url('users'))->with('success', 'User account updated successfully.');
    }

    private function userData(): array
    {
        return [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];
    }

    private function userRules(?int $id = null): array
    {
        $uniqueRule = $id === null
            ? 'is_unique[users.username]'
            : "is_unique[users.username,id,{$id}]";

        return [
            'username' => [
                'label'  => 'Username',
                'rules'  => "required|max_length[50]|alpha_numeric_punct|{$uniqueRule}",
                'errors' => [
                    'required'  => 'Username is required.',
                    'is_unique' => 'That username is already being used.',
                ],
            ],
            'full_name' => [
                'label'  => 'Full name',
                'rules'  => 'required|max_length[100]',
                'errors' => ['required' => 'Full name is required.'],
            ],
        ];
    }

    private function avatarRules(): array
    {
        return [
            'avatar' => [
                'label' => 'Profile picture',
                'rules' => [
                    'uploaded[avatar]',
                    'max_size[avatar,2048]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                    'ext_in[avatar,jpg,jpeg,png]',
                ],
                'errors' => [
                    'max_size' => 'The profile picture must be 2 MB or smaller.',
                    'is_image' => 'The selected file must be a valid image.',
                    'mime_in'  => 'Only JPG and PNG images are allowed.',
                    'ext_in'   => 'Only JPG and PNG images are allowed.',
                ],
            ],
        ];
    }
}
