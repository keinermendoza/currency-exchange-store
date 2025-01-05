-- this is a combination of migrations 0005, 0008, 0011
CREATE TABLE IF NOT EXISTS info_site (
    id INT PRIMARY KEY AUTO_INCREMENT,
    domain VARCHAR(200) NULL,
    email VARCHAR(200) NULL,
    address VARCHAR(200) NULL,
    phone_number VARCHAR(20) NULL,
    whatsapp_number VARCHAR(20) NULL,
    whatsapp_message VARCHAR(400) NULL
)
