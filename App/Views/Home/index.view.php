<?php
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */
$view->setLayout('vybavto');
?>
<h2>Dashboard</h2>

<section class="dashboard-stats" aria-label="Moje štatistiky">
    <article class="stat-card">
        <h3>Moje aktívne úlohy</h3>
        <div class="stat-card-bottom">
            <p class="stat-value">2</p>
            <img src="<?= $link->asset('assets/icons/list-todo.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>

    <article class="stat-card">
        <h3>Moje rozpracované úlohy</h3>
        <div class="stat-card-bottom">
            <p class="stat-value">1</p>
            <img src="<?= $link->asset('assets/icons/clock-3.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>

    <article class="stat-card">
        <h3>Moje dokončené úlohy</h3>
        <div class="stat-card-bottom">
            <p class="stat-value">1</p>
            <img src="<?= $link->asset('assets/icons/check-check.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>

    <article class="stat-card">
        <h3>Dokončené projekty</h3>
        <div class="stat-card-bottom">
            <p class="stat-value">0</p>
            <img src="<?= $link->asset('assets/icons/folder-check.svg') ?>" alt="" class="stat-icon">
        </div>
    </article>
</section>

<section class="dashboard-projects">
    <h3>Moje projekty</h3>

    <div class="projects-grid">
        <article class="project-card">
            <div class="project-card-header">
                <div class="project-card-info">
                    <h4>VAII semestrálka</h4>
                    <p>Tímový projekt</p>
                </div>
                <span class="project-status">Aktívny</span>
            </div>
            <div class="project-progress">
                <div class="project-progress-header">
                    <label for="vaii-progres">3 z 10 úloh dokončených</label>
                    <span>30%</span>
                </div>
                <progress id="vaii-progres" value="3" max="10">30%</progress>
            </div>
            <a href="<?= $link->url('home.project') ?>" class="project-card-link">
                Otvoriť projekt
            </a>
        </article>
    </div>
</section>