<?php
/** @var \Framework\Support\View $view */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Project $project */

$view->setLayout('vybavto');
?>

<h1 class="task-page-title">
    <?= $project->getId() === null ? 'Nový projekt' : 'Upraviť projekt' ?>
</h1>

<form class="task-form" method="post" action="<?= $link->url('project.save') ?>">
    <input type="hidden" name="id" value="<?= $project->getId() ?>">

    <label for="name">Názov projektu</label>
    <input type="text" id="name" name="name"
           value="<?= e($project->getName() ?? '') ?>"
           maxlength="150" required>

    <label for="description">Popis projektu</label>
    <textarea id="description" name="description"><?= e($project->getDescription() ?? '') ?></textarea>

    <label for="type">Typ projektu</label>
    <select id="type" name="type">
        <option value="personal" <?= $project->getType() === 'personal' ? 'selected' : '' ?>>
            Osobný
        </option>
        <option value="team" <?= $project->getType() === 'team' ? 'selected' : '' ?>>
            Tímový
        </option>
    </select>


    <button type="submit">
        <?= $project->getId() === null ? 'Vytvoriť projekt' : 'Uložiť zmeny' ?>
    </button>
</form>
