-- creates a table for display custom object info like airplane passages or trip planes

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL UNIQUE,
    excerpt VARCHAR(100) NULL,
    show_in_home TINYINT(1) DEFAULT 0,
    image VARCHAR(300) NULL,
    body TEXT NULL
);
