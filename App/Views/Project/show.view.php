<?php
/** @var \Framework\Support\View $view */

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Project $project */
/** @var \App\Models\Task[] $tasks */

$view->setLayout('vybavto');

$columns = [
        'todo' => 'TO DO',
        'in_progress' => 'IN PROGRESS',
        'done' => 'DONE'
];

$priorities = [
        'low' => 'Nízka priorita',
        'medium' => 'Stredná priorita',
        'high' => 'Vysoká priorita'
];
?>

<div class="project-detail">

    <!-- Hlavička projektu -->
    <div class="project-header">
        <div class="project-info">
            <h2><?= e($project->getName() ?? '') ?></h2>

            <p>
                <?= $project->getType() === 'team'
                        ? 'Tímový projekt'
                        : 'Osobný projekt' ?>
            </p>

            <?php
            if ($project->getDescription()): ?>
                <p><?= e($project->getDescription()) ?></p>
            <?php
            endif; ?>
        </div>

        <div class="project-actions">
            <a class="projects-edit-button"
               href="<?= $link->url('project.edit', [
                       'id' => $project->getId()
               ]) ?>">
                Upraviť projekt
            </a>

            <a class="tasks-add-button"
               href="<?= $link->url('task.add', [
                       'project_id' => $project->getId()
               ]) ?>">
                + Nová úloha
            </a>
        </div>
    </div>

    <!-- Vyhľadávanie a filtre -->
    <div class="project-filters project-filters--live">
        <input
                type="search"
                id="kanban-search"
                placeholder="Vyhľadať úlohu"
                aria-label="Vyhľadať úlohu"
        >

        <select id="kanban-status" aria-label="Filtrovať podľa stavu">
            <option value="">Všetky stavy</option>
            <option value="todo">TO DO</option>
            <option value="in_progress">IN PROGRESS</option>
            <option value="done">DONE</option>
        </select>

        <select id="kanban-priority" aria-label="Filtrovať podľa priority">
            <option value="">Všetky priority</option>
            <option value="high">Vysoká</option>
            <option value="medium">Stredná</option>
            <option value="low">Nízka</option>
        </select>
    </div>


    <div class="content-placeholder">

        <div class="kanban-board" id="project-kanban">

            <?php
            foreach ($columns as $status => $label): ?>

                <?php
                $columnTasks = array_filter(
                        $tasks,
                        fn($task) => $task->getStatus() === $status
                );
                ?>

                <section class="kanban-column">

                    <h3>
                        <?= e($label) ?>

                        <span class="column-count">
                            <?= count($columnTasks) ?>
                        </span>
                    </h3>

                    <div class="task-list">

                        <?php
                        foreach ($columnTasks as $task): ?>


                            <article class="task-card">

                                <div class="kanban-task-heading">
                                    <h4 class="kanban-task-title">
                                        <?= e($task->getTitle() ?? '') ?>
                                    </h4>

                                    <a class="kanban-edit-link"
                                       href="<?= $link->url('task.edit', [
                                               'id' => $task->getId()
                                       ]) ?>"
                                       aria-label="Upraviť úlohu <?= e($task->getTitle() ?? '') ?>"
                                       title="Upraviť úlohu">

                                        <img src="<?= $link->asset('assets/icons/pencil.svg') ?>"
                                             alt="" width="16" height="16">
                                    </a>
                                </div>

                                <?php
                                if ($task->getDescription()): ?>
                                    <p class="kanban-task-description"><?= e(trim($task->getDescription())) ?></p>
                                <?php
                                endif; ?>

                                <div class="kanban-task-bottom">

        <span class="task-priority priority-<?= e($task->getPriority()) ?>">
            <?= e($priorities[$task->getPriority()] ?? 'Neznáma priorita') ?>
        </span>

                                    <?php
                                    if ($task->getDueDate()): ?>
                                        <time class="kanban-task-due"
                                              datetime="<?= e($task->getDueDate()) ?>">

                                            <img src="<?= $link->asset('assets/icons/calendar-days.svg') ?>"
                                                 alt="" width="15" height="15">

                                            <?= e(date('j. n. Y', strtotime($task->getDueDate()))) ?>
                                        </time>
                                    <?php
                                    endif; ?>

                                </div>

                            </article>


                        <?php
                        endforeach; ?>

                        <?php
                        if (empty($columnTasks)): ?>
                            <p class="kanban-empty">Žiadne úlohy</p>
                        <?php
                        endif; ?>

                    </div>

                </section>

            <?php
            endforeach; ?>

        </div>

    </div>

</div>