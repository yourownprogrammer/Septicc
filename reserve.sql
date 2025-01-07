CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    pole_number VARCHAR(50) NOT NULL,
    house_number INT NOT NULL,
    service_type VARCHAR(255) NOT NULL,
    capacity VARCHAR(255) NOT NULL,
    delivery_day DATE (50) NOT NULL,
    delivery_time TIME(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
