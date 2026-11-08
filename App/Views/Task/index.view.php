<?php
/** @var \Framework\Support\View $view */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Task[] $tasks */

$view->setLayout('vybavto');

$statusLabels = [
        'todo' => 'To do',
        'in_progress' => 'In progress',
        'done' => 'Done'
];

$priorityLabels = [
        'low' => 'Nízka',
        'medium' => 'Stredná',
        'high' => 'Vysoká'
];
?>

<section class="tasks-page">
    <div class="tasks-header">
        <div>
            <h1>Moje úlohy</h1>
            <p>Prehľad všetkých úloh</p>
        </div>

        <a class="tasks-add-button"
           href="<?= $link->url('task.add') ?>">
            + Nová úloha
        </a>
    </div>

    <?php if (empty($tasks)): ?>
        <div class="tasks-empty">
            <p>Zatiaľ nemáš žiadne úlohy.</p>
        </div>
    <?php else: ?>
        <ul class="tasks-list">
            <?php foreach ($tasks as $task): ?>
                <li class="task-item">
                    <div class="task-item-header">
                        <h2><?= e($task->getTitle() ?? '') ?></h2>

                        <span class="task-priority task-priority--<?= e($task->getPriority()) ?>">
                            <?= e($priorityLabels[$task->getPriority()] ?? $task->getPriority()) ?>
                        </span>
                    </div>

                    <?php if ($task->getDescription()): ?>
                        <p class="task-description"><?= e($task->getDescription()) ?></p>
                    <?php endif; ?>

                    <div class="task-item-footer">
                        <div class="task-meta">
                            <span class="task-status task-status--<?= e($task->getStatus()) ?>">
                                <?= e($statusLabels[$task->getStatus()] ?? $task->getStatus()) ?>
                            </span>

                            <?php if ($task->getDueDate()): ?>
                                <span class="task-due-date">
                                    Termín: <?= e($task->getDueDate()) ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="task-actions">
                            <a class="task-edit-button"
                               href="<?= $link->url('task.edit', ['id' => $task->getId()]) ?>">
                                Upraviť
                            </a>

                            <form method="post"
                                  action="<?= $link->url('task.delete') ?>">
                                <input type="hidden" name="id"
                                       value="<?= $task->getId() ?>">
                                <button class="task-delete-button"
                                        type="submit">
                                    Odstrániť
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
