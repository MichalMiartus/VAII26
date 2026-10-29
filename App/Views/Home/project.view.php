<?php
/** @var \Framework\Support\View $view */
$view->setLayout('vybavto');
?>

<div class="project-header">
    <div class="project-info">
        <h2>VAII semestrálka</h2>
        <p>Tímový projekt</p>
    </div>
    <div class="project-actions">
        <button type="button">Členovia (3)</button>
        <button type="button" class="primary-action">+ Nová úloha</button>
    </div>
</div>

<div class="project-filters">
    <input type="search" name="search" placeholder="Vyhľadať úlohu" aria-label="Vyhľadať úlohu">
    <select name="status" aria-label="Filtrovať podľa stavu">
        <option value="">Všetky stavy</option>
        <option value="todo">TO DO</option>
        <option value="in_progress">IN PROGRESS</option>
        <option value="done">DONE</option>
    </select>
    <select name="priority" aria-label="Filtrovať podľa priority">
        <option value="">Všetky priority</option>
        <option value="high">Vysoká</option>
        <option value="medium">Stredná</option>
        <option value="low">Nízka</option>
    </select>
    <select name="assignee" aria-label="Filtrovať podľa priradeného používateľa">
        <option value="">Všetci členovia</option>
        <option value="michal">Michal</option>
        <option value="peter">Peter</option>
        <option value="lucia">Lucia</option>
    </select>
</div>

<div class="content-placeholder">
    <div class="kanban-board">
        <section class="kanban-column">
            <h3>TO DO <span class="column-count">4</span></h3>
            <div class="task-list">
                <article class="task-card">
                    <h4>Implementovať databázu</h4>
                    <p class="task-priority priority-high">Vysoká priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-11-22">22. 11. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Michal Miartuš</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>Registrácia používateľov</h4>
                    <p class="task-priority priority-medium">Stredná priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-11-30">30. 11. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Peter Kováč</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>API pre správu úloh</h4>
                    <p class="task-priority priority-high">Vysoká priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-12-04">4. 12. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Peter Kováč</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>Správa členov projektu</h4>
                    <p class="task-priority priority-medium">Stredná priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-12-09">9. 12. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Lucia Nováková</p>
                    </div>
                </article>
            </div>
        </section>
        <section class="kanban-column">
            <h3>IN PROGRESS <span class="column-count">3</span></h3>
            <div class="task-list">
                <article class="task-card">
                    <h4>HTML a CSS implementácia</h4>
                    <p class="task-priority priority-medium">Stredná priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-10-28">28. 10. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Michal Miartuš</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>Implementácia prihlasovacej stránky</h4>
                    <p class="task-priority priority-high">Vysoká priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-11-05">5. 11. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Peter Kováč</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>Dokumentácia projektu</h4>
                    <p class="task-priority priority-low">Nízka priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-11-08">8. 11. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Lucia Nováková</p>
                    </div>
                </article>
            </div>
        </section>
        <section class="kanban-column">
            <h3>DONE <span class="column-count">3</span></h3>
            <div class="task-list">
                <article class="task-card">
                    <h4>Vytvorenie WireFramov</h4>
                    <p class="task-priority priority-low">Nízka priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-10-15">15. 10. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Lucia Nováková</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>Vytvorenie Git repozitára</h4>
                    <p class="task-priority priority-low">Nízka priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-10-10">10. 10. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Peter Kováč</p>
                    </div>
                </article>
                <article class="task-card">
                    <h4>Analýza požiadaviek</h4>
                    <p class="task-priority priority-medium">Stredná priorita</p>
                    <div class="task-footer">
                        <p class="task-meta">
                            Termín: <time datetime="2026-10-18">18. 10. 2026</time>
                        </p>
                        <p class="task-meta">Priradený: Michal Miartuš</p>
                    </div>
                </article>
            </div>
        </section>
    </div>
</div>