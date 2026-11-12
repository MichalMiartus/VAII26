<?php
/** @var \Framework\Support\View $view */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Project[] $projects */

$view->setLayout('vybavto');
?>

<div class="projects-page">

    <div class="projects-page-header">
        <div>
            <h1>Moje projekty</h1>
            <p>Spravuj svoje projekty a ich úlohy na jednom mieste.</p>
        </div>

        <a class="projects-add-button"
           href="<?= $link->url('project.add') ?>">
            + Nový projekt
        </a>
    </div>

    <?php if (empty($projects)): ?>

        <div class="projects-empty">
            <h2>Zatiaľ nemáš žiadne projekty</h2>
            <p>Vytvor svoj prvý projekt a začni organizovať úlohy.</p>
        </div>

    <?php else: ?>

        <div class="projects-grid">

            <?php foreach ($projects as $project): ?>
                <?php $projectTasks = $project->getTasks(); ?>

                <article class="project-card"
                         id="project-<?= $project->getId() ?>">

                    <div class="project-card-header">
                        <h2 class="projects-card-title">
                            <?= e($project->getName() ?? '') ?>
                        </h2>

                        <span class="projects-type">
                            <?= $project->getType() === 'team'
                                    ? 'Tímový'
                                    : 'Osobný' ?>
                        </span>
                    </div>

                    <?php if ($project->getDescription()): ?>
                        <p class="projects-description">
                            <?= e($project->getDescription()) ?>
                        </p>
                    <?php endif; ?>

                    <div class="projects-tasks">
                        <h3>
                            Úlohy
                            <span class="projects-count">
                                <?= count($projectTasks) ?>
                            </span>
                        </h3>

                        <?php if (empty($projectTasks)): ?>
                            <p class="projects-no-tasks">
                                Projekt zatiaľ nemá žiadne úlohy.
                            </p>
                        <?php else: ?>
                            <ul class="projects-task-list">
                                <?php foreach ($projectTasks as $task): ?>
                                    <li>
                                        <span class="projects-task-dot"></span>
                                        <?= e($task->getTitle() ?? '') ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="projects-actions">
                        <a class="projects-edit-button"
                           href="<?= $link->url('project.edit', [
                                   'id' => $project->getId()
                           ]) ?>">
                            Upraviť
                        </a>

                        <form method="post"
                              action="<?= $link->url('project.delete') ?>"
                              data-project-name="<?= e($project->getName() ?? '') ?>"
                              data-task-count="<?= count($projectTasks) ?>"
                              onsubmit="return confirm(`Naozaj chceš odstrániť projekt „${this.dataset.projectName}“ a všetky jeho úlohy (${this.dataset.taskCount})? Túto akciu nemožno vrátiť späť.`);">

                            <input type="hidden"
                                   name="id"
                                   value="<?= $project->getId() ?>">

                            <button class="projects-delete-button"
                                    type="submit">
                                Odstrániť
                            </button>
                        </form>
                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>

