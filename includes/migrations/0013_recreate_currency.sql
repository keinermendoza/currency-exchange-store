-- this is a combination of migrations 0002, 0010

CREATE TABLE currency (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    symbol VARCHAR(5) DEFAULT NOT NULL,
    image VARCHAR(300) NULL,
);
