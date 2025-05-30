CREATE DATABASE IF NOT EXISTS galeria;
USE galeria;

CREATE TABLE IF NOT EXISTS obrazy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(255) NOT NULL,
    sciezka VARCHAR(255) NOT NULL,
    kategoria VARCHAR(100),
    slowa_kluczowe TEXT,
    data_dodania TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
