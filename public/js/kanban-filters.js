const priorityFilter = document.getElementById('kanban-priority');

const cards = document.querySelectorAll('.task-card');

const columns = document.querySelectorAll('.kanban-column');


priorityFilter.addEventListener('change', () => {
    const selectedPriority = priorityFilter.value;

    cards.forEach(card => {
        const taskPriority = card.dataset.priority;

        card.hidden = selectedPriority !== taskPriority && selectedPriority !== '';
    });

    columns.forEach(column => {
        const allCards = column.querySelectorAll('.task-card');
        const visibleCards = column.querySelectorAll('.task-card:not([hidden])');

        const num = column.querySelector('.column-count');
        num.textContent = visibleCards.length.toString();

        const emptyMessage = column.querySelector('.kanban-filter-empty');
        emptyMessage.hidden = allCards.length === 0 || visibleCards.length !== 0;
    });
});