CREATE DATABASE IF NOT EXISTS web_database;
USE web_database;
GO

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
GO


CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT DEFAULT 1,
    size VARCHAR(255) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
);
ALTER TABLE orders
ADD CONTRAINTS FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE

INSERT INTO orders(user_id,product_name, quantity,size)
VALUES
(7,'áo 103',1,'M'),
(6,'áo 103',2,'L'),
(3,'áo 103',3,'S'),
(4,'áo 103',4,'XL'),
(5,'áo 103',5,'XXL');
GO