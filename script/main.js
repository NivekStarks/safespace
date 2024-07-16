document.addEventListener('DOMContentLoaded', function () {
  // Obtenir le nom de la page actuelle
  const currentPage = window.location.pathname.split('/').pop();

  // Charger les fichiers JSON de localisation en fonction de la page
  function loadTranslationFile(language, path) {
    return fetch(`${path}/${language}.json`)
      .then(response => response.json());
  }

  // Fonction pour mettre à jour les éléments HTML avec le texte localisé
  function updateLocalization(language, path) {
    loadTranslationFile(language, path).then(translations => {
      document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        element.textContent = translations[key] || key;
      });

      // Si la page est la page de contact, mettre à jour dynamiquement le contenu du formulaire
      if (window.location.pathname.includes('contact.php')) {
        updateContactFormContent(translations);
      }

      // Mettre à jour la valeur du bouton "Appliquer filtres"
      updateApplyFiltersButton(language, translations);
    });
  }

  // Nouvelle fonction pour mettre à jour dynamiquement le contenu du formulaire
  function updateContactFormContent(translations) {
    const form = document.querySelector('.u-top-text-long form');
    if (form) {
      // Mettez à jour le contenu du formulaire en fonction de la langue
      updateFormFieldPlaceholder(form, 'contact_nom_i18n', translations, 'Nom :');
      updateFormFieldPlaceholder(form, 'contact_prenom_i18n', translations, 'Prénom :');
      updateFormFieldPlaceholder(form, 'contact_email_i18n', translations, 'Email :');
      updateFormFieldPlaceholder(form, 'contact_nomentreprise_i18n', translations, 'Nom de l\'entreprise :');
      updateFormFieldPlaceholder(form, 'contact_objet_i18n', translations, 'Objet :');
      updateFormFieldPlaceholder(form, 'contact_message_i18n', translations, 'Message :');
      updateFormFieldValue(form, 'contact_bouton_i18n', translations, 'Envoyer le message');
    }
  }

  // Fonction générique pour mettre à jour la valeur d'un champ de formulaire
  function updateFormFieldPlaceholder(form, fieldKey, translations, defaultValue) {
    const placeholder = translations[fieldKey] || defaultValue;
    const inputField = form.querySelector(`[data-i18n="${fieldKey}"]`);
    if (inputField) {
      inputField.placeholder = placeholder;
    }
  }

  // Fonction générique pour mettre à jour la valeur d'un champ de formulaire
  function updateFormFieldValue(form, fieldKey, translations, defaultValue) {
    const value = translations[fieldKey] || defaultValue;
    const inputField = form.querySelector(`[data-i18n="${fieldKey}"]`);
    if (inputField) {
      inputField.value = value;
    }
  }

  // Fonction pour définir le cookie de langue
  function setLanguageCookie(language) {
    document.cookie = `lang=${language}; path=/`;
  }

  // Fonction pour récupérer la langue à partir du cookie
  function getLanguageFromCookie() {
    const cookies = document.cookie.split(';');
    for (const cookie of cookies) {
      const [name, value] = cookie.trim().split('=');
      if (name === 'lang') {
        return value;
      }
    }
    return null;
  }

  // Initialisation de la langue à partir du cookie
  let currentLanguage = getLanguageFromCookie() || 'fr';

  // Mettre à jour la langue du document
  document.documentElement.lang = currentLanguage;

  // Mettre à jour la langue via le bouton de bascule
  document.getElementById('change-language-button').addEventListener('click', function () {
    currentLanguage = currentLanguage === 'en' ? 'fr' : 'en';

    // Mettre à jour le cookie avec la nouvelle langue
    setLanguageCookie(currentLanguage);

    // Mettre à jour la langue du document
    document.documentElement.lang = currentLanguage;

    // Mettre à jour la traduction en fonction de la page
    updateLocalization(currentLanguage, (currentPage === 'index.php') ? './locales' : '../locales');
  });

  // Initialisation de la localisation en fonction de la page
  updateLocalization(currentLanguage, (currentPage === 'index.php') ? './locales' : '../locales');

  // Appel initial pour mettre à jour la valeur du bouton "Appliquer filtres"
  updateApplyFiltersButton(currentLanguage);

  // Nouvelle fonction pour mettre à jour la valeur du bouton "Appliquer filtres"
  function updateApplyFiltersButton(language) {
    loadTranslationFile(language, (currentPage === 'index.php') ? './locales' : '../locales').then(translations => {
      const applyFiltersButton = document.getElementById('appliquerFiltres');
      if (applyFiltersButton) {
        const translationKey = applyFiltersButton.getAttribute('data-i18n-key');
        const translation = translations[translationKey] || 'Appliquer filtres';
        applyFiltersButton.value = translation;
      }
    });
  }
});
