 document.addEventListener('DOMContentLoaded', () => {
        const menuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenuButton = document.getElementById('closeMenuButton');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
        });

        closeMenuButton.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });
    });

