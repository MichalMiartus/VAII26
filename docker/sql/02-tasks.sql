CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'todo',
    priority VARCHAR(20) NOT NULL DEFAULT 'medium',
    due_date DATE NULL,
    project_id INT NOT NULL,
    CONSTRAINT fk_tasks_project
    FOREIGN KEY (project_id)
    REFERENCES projects(id)
    ON DELETE CASCADE
);

INSERT INTO tasks
(title, description, status, priority, due_date, project_id)
VALUES
    (
        'Navrhnúť databázový model',
        'Pripraviť databázovú štruktúru pre aplikáciu VybavTo.',
        'done',
        'high',
        '2026-11-05',
        (SELECT id FROM projects WHERE name = 'VAII' LIMIT 1)
    ),
    (
        'Implementovať správu úloh',
        'Dokončiť vytváranie, zobrazovanie, úpravu a mazanie úloh.',
        'in_progress',
        'medium',
        '2026-11-15',
        (SELECT id FROM projects WHERE name = 'VAII' LIMIT 1)
    ),
    (
        'Pripraviť dokumentáciu',
        'Skontrolovať README a pripraviť projekt na odovzdanie.',
        'todo',
        'low',
        NULL,
        (SELECT id FROM projects WHERE name = 'VAII' LIMIT 1)
    );
