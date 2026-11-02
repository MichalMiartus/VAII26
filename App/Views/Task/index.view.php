<?php
/** @var \Framework\Support\View $view */
/** @var \App\Models\Task[] $tasks */
/** @var \Framework\Support\LinkGenerator $link */

$view->setLayout('vybavto');
?>

<h1>Moje úlohy</h1>
<a href="<?= $link->url('task.add') ?>">+ Nová úloha</a>
<?php if (empty($tasks)): ?>
    <p>Zatiaľ nemáš žiadne úlohy.</p>
<?php else: ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= e($task->getTitle() ?? '') ?>
                (<?= e($task->getStatus()) ?>)
                <a href="<?= $link->url('task.edit', ['id' => $task->getId()]) ?>">
                    Upraviť
                </a>
                <form method="post" action="<?= $link->url('task.delete') ?>">
                    <input type="hidden" name="id" value="<?= $task->getId() ?>">
                    <button type="submit">Odstrániť</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
