<?php
/** @var \Framework\Support\LinkGenerator $link */

/** @var string $contentHTML */
$currentController = strtolower($_GET['c'] ?? 'home');
$currentAction = strtolower($_GET['a'] ?? 'index');
$sidebarProjects = \App\Models\Project::getAll();

$pageStyles = match (true) {
    $currentController === 'home'
    && $currentAction === 'index'
    => ['pages/dashboard.css'],

    $currentController === 'home'
    && $currentAction === 'project'
    => ['pages/kanban.css'],

    $currentController === 'task'
    && $currentAction === 'index'
    => ['pages/tasks.css'],

    $currentController === 'task'
    && in_array($currentAction, ['add', 'edit'], true)
    => ['components/forms.css'],

    $currentController === 'project'
    && $currentAction === 'index'
    => ['pages/projects.css'],

    $currentController === 'project'
    && $currentAction === 'show'
    => ['pages/kanban.css'],

    $currentController === 'project'
    && in_array($currentAction, ['add', 'edit'], true)
    => ['components/forms.css'],

    default => [],
};

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="<?= $link->asset('css/style.css') ?>">
    <?php
    foreach ($pageStyles as $stylesheet): ?>
        <link rel="stylesheet"
              href="<?= $link->asset('css/' . $stylesheet) ?>">
    <?php
    endforeach; ?>

    <script src="<?= $link->asset('js/script.js') ?>" defer></script>
    <title><?= \App\Configuration::APP_NAME ?></title>
</head>
<body>
<div class="app-container">
    <aside id="mobile-sidebar">
        <h1>VybavTo</h1>
        <nav>
            <ul>
                <li>
                    <a href="<?= $link->url('home.index') ?>"
                       class="<?= $currentAction === 'index' && $currentController === 'home' ? 'active' : '' ?>"
                            <?= $currentAction === 'index' && $currentController === 'home' ? 'aria-current="page"' : '' ?>>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?= $link->url('task.index') ?>"
                       class="<?= $currentController === 'task' ? 'active' : '' ?>"
                            <?= $currentController === 'task' && $currentAction === 'index' ? 'aria-current="page"' : '' ?>>
                        Moje úlohy
                    </a>
                </li>
                <li>
                    <a href="<?= $link->url('project.index') ?>"
                       class="<?= $currentController === 'project' ? 'active' : '' ?>"
                            <?= $currentController === 'project' && $currentAction === 'index' ? 'aria-current="page"' : '' ?>>
                        Projekty
                    </a>
                </li>
            </ul>
        </nav>
        <section>
            <a href="<?= $link->url('project.add') ?>">
                + Nový projekt
            </a>
            <h2>Moje projekty</h2>
            <ul>
                <?php
                foreach ($sidebarProjects as $sidebarProject): ?>
                    <li>
                        <a href="<?= $link->url('project.show', [
                                'id' => $sidebarProject->getId()
                        ]) ?>">
                            <?= e($sidebarProject->getName() ?? '') ?>
                        </a>
                    </li>
                <?php
                endforeach; ?>
            </ul>
        </section>
    </aside>

    <header>
        <button class="mobile-menu-toggle" type="button" aria-expanded="false" aria-label="Otvoriť navigáciu"
                aria-controls="mobile-sidebar">
            ☰
        </button>
        <button type="button" class="user-menu-toggle">
            <span class="avatar"></span>
            <span class="user-name">Michal Miartuš</span>
            <span class="user-menu-arrow">▼</span>
        </button>
    </header>

    <main>
        <div class="dashboard-content">
            <?= $contentHTML ?>
        </div>
    </main>
</div>
</body>
</html>