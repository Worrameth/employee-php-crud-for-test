CREATE TABLE employees (
    employee_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    start_date DATE NOT NULL,
    position VARCHAR(50) NOT NULL,
    status VARCHAR(10) NOT NULL
);