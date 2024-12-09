
DROP DATABASE IF EXISTS core_of_shadow;
CREATE DATABASE core_of_shadow;
USE core_of_shadow;

CREATE TABLE `user` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(180) NOT NULL UNIQUE,
    roles JSON NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    quantum_signature VARCHAR(255) NOT NULL,
    initiation_date DATETIME NOT NULL,
    clearance_level VARCHAR(255) NOT NULL,
    gold_balance DOUBLE PRECISION DEFAULT 0.0,
    purchase_history JSON NOT NULL,
    preferences JSON NULL,
    lore_read_history JSON NULL,
    item_interactions JSON NOT NULL,
    search_history JSON NOT NULL,
    browsing_history JSON NOT NULL,
    category_preferences JSON NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE blessing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    power DOUBLE PRECISION NOT NULL DEFAULT 0.0,
    price DOUBLE PRECISION NOT NULL DEFAULT 0.0,
    duration INT NOT NULL DEFAULT 0,
    benefits TEXT NOT NULL,
    rarity VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE curse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    power DOUBLE PRECISION NOT NULL DEFAULT 0.0,
    price DOUBLE PRECISION NOT NULL DEFAULT 0.0,
    duration INT NOT NULL DEFAULT 0,
    side_effects TEXT NOT NULL,
    rarity VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE shop_lore (
    id INT AUTO_INCREMENT PRIMARY KEY,
    discovery_date DATETIME NOT NULL,
    chapter VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    era VARCHAR(100) NOT NULL,
    secrets_revealed TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE transaction_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DOUBLE PRECISION NOT NULL,
    timestamp DATETIME NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    INDEX IDX_transaction_user (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE shop (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gold_balance DOUBLE PRECISION NOT NULL DEFAULT 0.0,
    purchase_history JSON NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE INDEX idx_blessing_rarity ON blessing(rarity);
CREATE INDEX idx_curse_rarity ON curse(rarity);
CREATE INDEX idx_shop_lore_era ON shop_lore(era);




