<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');
        $password = password_hash('Password123!', PASSWORD_DEFAULT);

        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Alyssa Reyes', 'email' => 'alyssa.reyes@example.com', 'phone' => '0917-123-4567', 'created_at' => $createdAt],
            ['full_name' => 'Marco Santos', 'email' => 'marco.santos@example.com', 'phone' => '0918-234-5678', 'created_at' => $createdAt],
            ['full_name' => 'Bianca Cruz', 'email' => 'bianca.cruz@example.com', 'phone' => '0919-345-6789', 'created_at' => $createdAt],
            ['full_name' => 'Daniel Lim', 'email' => 'daniel.lim@example.com', 'phone' => '0920-456-7890', 'created_at' => $createdAt],
            ['full_name' => 'Sofia Mendoza', 'email' => 'sofia.mendoza@example.com', 'phone' => '0921-567-8901', 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insertBatch([
            ['username' => 'admin01', 'full_name' => 'Andrea Flores', 'password' => $password, 'created_at' => $createdAt],
            ['username' => 'cashier01', 'full_name' => 'Paolo Garcia', 'password' => $password, 'created_at' => $createdAt],
            ['username' => 'cashier02', 'full_name' => 'Mika Torres', 'password' => $password, 'created_at' => $createdAt],
            ['username' => 'manager01', 'full_name' => 'Carlo Villanueva', 'password' => $password, 'created_at' => $createdAt],
            ['username' => 'stock01', 'full_name' => 'Nina Ramos', 'password' => $password, 'created_at' => $createdAt],
        ]);
    }
}
