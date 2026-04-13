CREATE DATABASE IF NOT EXISTS nex
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE nex;

CREATE TABLE IF NOT EXISTS goal (
    id_g INT AUTO_INCREMENT PRIMARY KEY,
    title_goa VARCHAR(255) NOT NULL,
    description_goa TEXT,
    date_debut_goa DATE,
    date_final_goa DATE,
    status_goa VARCHAR(50),
    progress_goa DOUBLE,
    category_goa VARCHAR(120),
    priority_goa VARCHAR(50),
    notes_goa TEXT,
    color_goa VARCHAR(20)
);
