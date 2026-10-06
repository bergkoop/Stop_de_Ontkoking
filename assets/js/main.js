// Mobile menu toggle
document.querySelectorAll('.hamburger').forEach(btn => {
    btn.addEventListener('click', () => btn.previousElementSibling.classList.toggle('open'));
});
