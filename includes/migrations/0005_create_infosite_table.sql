CREATE TABLE IF NOT EXISTS info_site (
    id INT PRIMARY KEY AUTO_INCREMENT,
    domain VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    address VARCHAR(200) NULL,
    phone_number VARCHAR(20) NULL,
    whatsapp_number VARCHAR(20) NOT NULL
)
    