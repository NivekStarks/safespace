<header class="bg-purple text-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <!-- Logo -->
      <div class="flex-shrink-0">
        <img src="assets/img/parenthese_logo.jpeg" alt="Logo" class="h-10">
      </div>
      <!-- Navigation -->
      <nav class="hidden md:flex space-x-8">
        <a href="index.php" class="text-lg hover:text-gray-400">Accueil</a>
        <a href="devenez_benevole.php" class="text-lg hover:text-gray-400">Espace bénévole</a>
        <a href="index.php#contact" class="text-lg hover:text-gray-400">Contact</a>
      </nav>

      <div class="mt-5 flex items-center justify-center">
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
      <!-- Button -->
      <div>
        <a href="include/connexion.php" class="bg-purple-400 hover:bg-white text-white hover:text-black font-bold py-2 px-4 rounded">
          Connexion
        </a>
      </div>
    </div>
  </header>