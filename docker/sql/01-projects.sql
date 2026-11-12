CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT NULL,
    type VARCHAR(20) NOT NULL DEFAULT 'personal',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO projects (name, description, type) VALUES
    ('VAII', 'Vývoj webových aplikácií', 'personal'),
    ('MaS', 'Modelovanie a simulácia', 'personal'),
    ('POS', 'Princípy operačných systémov', 'personal');
