import './bootstrap';

/**
 * Prevent up and down keys scroll
 */
window.addEventListener(
    'keydown',
    (e) => ['ArrowUp', 'ArrowDown'].includes(e.key) && e.preventDefault(),
);
