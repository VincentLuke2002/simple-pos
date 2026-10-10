CREATE DATABASE IF NOT EXISTS pos_system
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE pos_system;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS customers;

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    avatar VARCHAR(255) NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
    ('Alyssa Reyes', 'alyssa.reyes@example.com', '0917-123-4567', NOW()),
    ('Marco Santos', 'marco.santos@example.com', '0918-234-5678', NOW()),
    ('Bianca Cruz', 'bianca.cruz@example.com', '0919-345-6789', NOW()),
    ('Daniel Lim', 'daniel.lim@example.com', '0920-456-7890', NOW()),
    ('Sofia Mendoza', 'sofia.mendoza@example.com', '0921-567-8901', NOW());

INSERT INTO users (username, full_name, avatar, created_at) VALUES
    ('admin01', 'Andrea Flores', NULL, NOW()),
    ('cashier01', 'Paolo Garcia', NULL, NOW()),
    ('cashier02', 'Mika Torres', NULL, NOW()),
    ('manager01', 'Carlo Villanueva', NULL, NOW()),
    ('stock01', 'Nina Ramos', NULL, NOW());
