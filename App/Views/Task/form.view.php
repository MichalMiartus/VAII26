<?php
/** @var \Framework\Support\View $view */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Task $task */
$view->setLayout('vybavto');
?>

<h1><?= $task->getId() === null ? 'Nová úloha' : 'Upraviť úlohu' ?></h1>

<form method="post" action="<?= $link->url('task.save') ?>">
    <input type="hidden" name="id" value="<?= $task->getId() ?>">

    <label for="title">Názov úlohy</label>
    <input type="text" id="title" name="title"
           value="<?= e($task->getTitle()) ?>" required>

    <label for="description">Popis</label>
    <textarea id="description" name="description"><?= e($task->getDescription()) ?></textarea>

    <label for="status">Stav</label>
    <select id="status" name="status">
        <option value="todo" <?= $task->getStatus() === 'todo' ? 'selected' : '' ?>>To do</option>
        <option value="in_progress" <?= $task->getStatus() === 'in_progress' ? 'selected' : '' ?>>In progress</option>
        <option value="done" <?= $task->getStatus() === 'done' ? 'selected' : '' ?>>Done</option>
    </select>

    <label for="priority">Priorita</label>
    <select id="priority" name="priority">
        <option value="low" <?= $task->getPriority() === 'low' ? 'selected' : '' ?>>Nízka</option>
        <option value="medium" <?= $task->getPriority() === 'medium' ? 'selected' : '' ?>>Stredná</option>
        <option value="high" <?= $task->getPriority() === 'high' ? 'selected' : '' ?>>Vysoká</option>
    </select>

    <label for="due_date">Termín dokončenia</label>
    <input type="date" id="due_date" name="due_date"
           value="<?= e($task->getDueDate()) ?>">

    <button type="submit">
        <?= $task->getId() === null ? 'Pridať úlohu' : 'Uložiť zmeny' ?>
    </button>
</form>
