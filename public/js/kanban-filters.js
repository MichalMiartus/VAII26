const priorityFilter = document.getElementById('kanban-priority');

const cards = document.querySelectorAll('.task-card');

const columns = document.querySelectorAll('.kanban-column');

const titleFilter = document.getElementById('kanban-search');

const dueDateFilter = document.getElementById('kanban-due-date');

function formatDate(date) {
    return date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' +
        String(date.getDate()).padStart(2, '0');
}

function updateColumns() {
    columns.forEach(column => {
        const allCards = column.querySelectorAll('.task-card');
        const visibleCards = column.querySelectorAll('.task-card:not([hidden])');

        const num = column.querySelector('.column-count');
        num.textContent = visibleCards.length.toString();

        const emptyMessage = column.querySelector('.kanban-filter-empty');
        emptyMessage.hidden = allCards.length === 0 || visibleCards.length !== 0;
    });
}

function applyFilters() {
    const selectedPriority = priorityFilter.value;
    const chosenTitle = titleFilter.value.trim();
    const selectedDueDate = dueDateFilter.value;

    const today = new Date();
    const todayDate = formatDate(today);

    const nextWeek = new Date(today);
    nextWeek.setDate(nextWeek.getDate() + 7);
    const nextWeekDate = formatDate(nextWeek);

    cards.forEach(card => {
        const taskTitle = card.querySelector('.kanban-task-title').textContent;
        const taskPriority = card.dataset.priority;
        const taskDueDate = card.dataset.dueDate;
        const taskStatus = card.dataset.status;

        const priorityMismatch = selectedPriority !== taskPriority && selectedPriority !== '';
        const titleMismatch = !taskTitle.toLowerCase().includes(chosenTitle.toLowerCase());
        const dueDateMismatch = (selectedDueDate === 'no-date' && taskDueDate !== '') ||
            (selectedDueDate === 'today' && taskDueDate !== todayDate) ||
            (selectedDueDate === 'overdue' && (taskStatus === 'done' || taskDueDate >= todayDate || taskDueDate === '')) ||
            (selectedDueDate === 'next-7-days' && (taskDueDate < todayDate || taskDueDate > nextWeekDate));

        card.hidden = priorityMismatch || titleMismatch || dueDateMismatch;
    });

    updateColumns();
}

priorityFilter.addEventListener('change', applyFilters);
titleFilter.addEventListener('input', applyFilters);
dueDateFilter.addEventListener('change', applyFilters);