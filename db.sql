CREATE DATABASE IF NOT EXISTS web_database;
USE web_database;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female', 'other'),
    phone VARCHAR(15),
    birthday DATE,
    province VARCHAR(255),
    district VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users(name,email,password,gender, phone,birthday,role)
VALUES 
('ton1', 'ton1@gmail.com','ton1','male', 121, '01-01-1010','user'),
('ton2', 'ton2@gmail.com','ton2','male', 122, '01-01-1010','user'),
('ton3', 'ton3@gmail.com','ton3','male', 123, '01-01-1010','user'),
('ton4', 'ton4@gmail.com','ton4','male', 124, '01-01-1010','user');