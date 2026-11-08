CREATE TABLE IF NOT EXISTS tasks
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'todo',
    priority VARCHAR(20) NOT NULL DEFAULT 'medium',
    due_date DATE NULL
);

INSERT INTO tasks (title, description, status, priority, due_date)
VALUES
    (
        'Navrhnúť databázový model',
        'Pripraviť databázovú štruktúru pre aplikáciu VybavTo.',
        'done',
        'high',
        '2026-11-05'
    ),
    (
        'Implementovať správu úloh',
        'Dokončiť vytváranie, zobrazovanie, úpravu a mazanie úloh.',
        'in_progress',
        'medium',
        '2026-11-15'
    ),
    (
        'Pripraviť dokumentáciu',
        'Skontrolovať README a pripraviť projekt na odovzdanie.',
        'todo',
        'low',
        NULL
    );
