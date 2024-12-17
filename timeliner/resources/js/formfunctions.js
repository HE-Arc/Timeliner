function toggleElementById(id) {
    const element = document.getElementById(id);
    element.classList.toggle('hidden');
}

function confirmDelete() {
    return confirm('Are you sure you want to delete this? This action cannot be undone.');
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.toggle-button').forEach((button) => {
        button.addEventListener('click', (event) => {
            toggleElementById(event.target.dataset.target);
        });
    });
});
