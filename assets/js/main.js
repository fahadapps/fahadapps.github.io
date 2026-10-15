/** Shared, accessible navigation and disclosure controls. */
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('mobileToggle');
    const menu = document.getElementById('navMenu');
    const setMenu = (open) => {
        if (!toggle || !menu) return;
        menu.classList.toggle('active', open);
        toggle.classList.toggle('open', open);
        toggle.setAttribute('aria-expanded', String(open));
    };
    if (toggle && menu) {
        toggle.setAttribute('aria-controls', 'navMenu');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.addEventListener('click', () => setMenu(!menu.classList.contains('active')));
        menu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
        document.addEventListener('keydown', event => {
            if (event.key === 'Escape' && menu.classList.contains('active')) { setMenu(false); toggle.focus(); }
        });
        document.addEventListener('click', event => {
            if (!menu.contains(event.target) && !toggle.contains(event.target)) setMenu(false);
        });
        window.matchMedia('(min-width: 901px)').addEventListener('change', event => { if (event.matches) setMenu(false); });
    }
    const rows = [...document.querySelectorAll('.faq-row')];
    function setAnswer(row, open) {
        row.classList.toggle('active', open);
        row.querySelector('.faq-question-btn').setAttribute('aria-expanded', String(open));
        row.querySelector('.faq-content').hidden = !open;
    }
    rows.forEach((row, i) => {
        const button = row.querySelector('.faq-question-btn');
        const answer = row.querySelector('.faq-content');
        if (!button || !answer) return;
        button.type = 'button';
        answer.id = answer.id || `faq-answer-${i}`;
        button.setAttribute('aria-controls', answer.id);
        setAnswer(row, false);
        button.addEventListener('click', () => {
            const open = !row.classList.contains('active');
            rows.forEach(other => setAnswer(other, false));
            setAnswer(row, open);
        });
    });
    document.querySelectorAll('a[target="_blank"]').forEach(link => { link.rel = 'noopener noreferrer'; });
});
