USE online_shopping_app;

CREATE TABLE IF NOT EXISTS products(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(30) NOT NULL,
    description varchar(50),
    price DOUBLE(10, 2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE IF NOT EXISTS orders(
    id VARCHAR(50) PRIMARY KEY NOT NULL,
    total DOUBLE(10, 2) NOT NULL,
    completed_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS order_items(
    PRIMARY KEY (order_id, product_id),
    quantity INT NOT NULL,
    price DOUBLE(10, 2) NOT NULL,
    order_id VARCHAR(100) NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);