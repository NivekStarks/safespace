<header class="bg-purple text-white dark:bg-gray-900">
    <div class="container mx-auto flex justify-between items-center py-4 px-6 relative">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <img src="assets/img/parenthese_logo.jpeg" alt="Logo" class="h-10">
        </div>
        
        <!-- Menu Hamburger -->
        <div class="md:hidden flex items-center">
            <button id="menuButton" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav id="navMenu" class="hidden md:flex md:space-x-8 items-center">
            <a href="index.php" class="text-lg hover:text-gray-400">Accueil</a>
            <a href="devenez_benevole.php" class="text-lg hover:text-gray-400">Espace bénévole</a>
            <a href="index.php#contact" class="text-lg hover:text-gray-400">Contact</a>
            <a href="include/connexion.php" class="bg-purple-400 hover:bg-white text-white hover:text-black font-bold py-2 px-4 rounded">
                Connexion
            </a>
        </nav>

        <div class="flex items-center justify-center">
            <button
                title="Toggle Theme"
                onclick="changeTheme()"
                class="w-12 h-6 rounded-full p-1 bg-gray-400 dark:bg-gray-600 relative transition-colors duration-500 ease-in focus:outline-none focus:ring-2 focus:ring-blue-700 dark:focus:ring-blue-600 focus:border-transparent"
            >
                <div
                    id="toggle"
                    class="rounded-full w-4 h-4 bg-blue-600 dark:bg-blue-500 relative ml-0 dark:ml-6 pointer-events-none transition-all duration-300 ease-out"
                ></div>
            </button>
        </div>
    </div>

    <!-- Menu Mobile -->
    <nav id="mobileMenu" class="md:hidden fixed top-0 right-0 w-full h-full bg-purple text-white py-4 px-6 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <button id="closeMenuButton" class="text-white absolute top-4 right-4 text-2xl">&times;</button>
        <div class="flex flex-col space-y-4 mt-12">
            <a href="index.php" class="text-lg hover:text-gray-400 py-1">Accueil</a>
            <a href="devenez_benevole.php" class="text-lg hover:text-gray-400 py-1">Espace bénévole</a>
            <a href="index.php#contact" class="text-lg hover:text-gray-400 py-1">Contact</a>
            <a href="include/connexion.php" class="bg-purple-400 hover:bg-white text-white hover:text-black font-bold py-2 px-4 rounded py-1">
                Connexion
            </a>
        </div>
    </nav>
</header>