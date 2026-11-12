<?php
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */
/** @var int $activeTasks */
/** @var int $inProgressTasks */
/** @var int $completedTasks */
/** @var \App\Models\Project[] $projects */
/** @var int $completedProjects */

$view->setLayout('vybavto');
?>
<h2>Dashboard</h2>

<section class="dashboard-stats" aria-label="Moje štatistiky">
    <article class="stat-card">
        <h3>Moje aktívne úlohy</h3>
        <div class="stat-card-bottom">
            <p class="stat-value"><?= $activeTasks ?></p>
            <img src="<?= $link->asset('assets/icons/list-todo.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>

    <article class="stat-card">
        <h3>Moje rozpracované úlohy</h3>
        <div class="stat-card-bottom">
            <p class="stat-value"><?= $inProgressTasks ?></p>
            <img src="<?= $link->asset('assets/icons/clock-3.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>

    <article class="stat-card">
        <h3>Moje dokončené úlohy</h3>
        <div class="stat-card-bottom">
            <p class="stat-value"><?= $completedTasks ?></p>
            <img src="<?= $link->asset('assets/icons/check-check.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>

    <article class="stat-card">
        <h3>Dokončené projekty</h3>
        <div class="stat-card-bottom">
            <p class="stat-value"><?= $completedProjects ?></p>
            <img src="<?= $link->asset('assets/icons/folder-check.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>
</section>


<section class="dashboard-projects">
    <h3>Moje projekty</h3>

    <?php if (empty($projects)): ?>
        <p>Zatiaľ nemáš žiadne projekty.</p>
    <?php else: ?>

        <div class="projects-grid">

            <?php foreach ($projects as $project): ?>
                <?php
                $tasks = $project->getTasks();
                $total = count($tasks);

                $completed = count(array_filter(
                        $tasks,
                        fn($task) => $task->getStatus() === 'done'
                ));

                $progress = $total > 0
                        ? round($completed / $total * 100)
                        : 0;
                ?>

                <article class="project-card">

                    <div class="project-card-header">
                        <div class="project-card-info">
                            <h4>
                                <?= e($project->getName() ?? '') ?>
                            </h4>

                            <p>
                                <?= $project->getType() === 'team'
                                        ? 'Tímový projekt'
                                        : 'Osobný projekt' ?>
                            </p>
                        </div>

                        <span class="project-status">
                            <?= $total === 0
                                    ? 'Bez úloh'
                                    : ($completed === $total
                                            ? 'Dokončený'
                                            : 'Aktívny') ?>
                        </span>
                    </div>

                    <div class="project-progress">
                        <div class="project-progress-header">
                            <span>
                                <?= $completed ?> z <?= $total ?>
                                úloh dokončených
                            </span>

                            <span><?= $progress ?> %</span>
                        </div>

                        <progress
                                value="<?= $completed ?>"
                                max="<?= max(1, $total) ?>"
                                aria-label="Dokončenie projektu <?= e($project->getName() ?? '') ?>">
                            <?= $progress ?> %
                        </progress>
                    </div>

                    <a href="<?= $link->url('project.show', [
                            'id' => $project->getId()
                    ]) ?>" class="project-card-link">
                        Otvoriť projekt
                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>
</section>
