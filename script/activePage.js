const activePage = window.location.pathname;
const navHeaderLinks = document.querySelectorAll('header nav a').forEach(link => {
    if (link.href.includes(`${activePage}`)) {
        link.closest('li').classList.add('active');
    }
})
