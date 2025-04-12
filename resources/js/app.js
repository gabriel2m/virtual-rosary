import './bootstrap';

/**
 * Prevent up and down keys scroll
 */
window.addEventListener('keydown', function (e) {
    if (!['ArrowUp', 'ArrowDown'].includes(e.key)) {
        return;
    }
    e.preventDefault();
});
