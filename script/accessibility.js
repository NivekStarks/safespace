// ENREGISTER LA TAILLE DE POLICE COOKIE

var slider = document.getElementById("slider");
var texts = document.getElementsByClassName("js-a-text");
var texts12 = document.getElementsByClassName("js-a-text-12")
var texts14 = document.getElementsByClassName("js-a-text-14")
var texts18 = document.getElementsByClassName("js-a-text-18")
var titresH1 = document.getElementsByClassName("js-a-titre-h1")
var titresH2 = document.getElementsByClassName("js-titre-h2")
var titresH3 = document.getElementsByClassName("js-a-titre-h3")
var textTimeL = document.getElementsByClassName("js-a-timeLine")
var menuHeader = document.getElementsByClassName("js-a-menu-header")

// AUGEMENTER LA TAILLE HEADER
slider.addEventListener("input", function() {
    var sliderValue = slider.value;
  
    for (var i = 0; i < texts.length; i++) {
        if (texts[i].closest('div').className === "u-ll-titre") {
            console.log(texts[i].closest('div').className);
            texts[i].style.fontSize = 32 + (sliderValue-14) + "px";
        }
        else{
            texts[i].style.fontSize = sliderValue + "px";
        }
    }
    for (var i=0; i<textTimeL.length;i++){
        textTimeL[i].style.fontSize = 16 + (sliderValue-14) + "px";
    }
    for (var i=0; i< texts12.length; i++){
        texts12[i].style.fontSize = 12 + (sliderValue-14) + "px";
    }
    for (var i=0; i< texts14.length; i++){
        texts14[i].style.fontSize = 14 + (sliderValue-14) + "px";
    }
    for (var i=0; i< texts18.length; i++){
        texts18[i].style.fontSize = 18 + (sliderValue-14) + "px";

        if (window.innerWidth <= 1100 && window.innerWidth >= 850){
            if (12 + (sliderValue-14) <= 21.4){
                texts18[i].style.fontSize = 18 + (sliderValue-14) + "px";
            }
            else{
                texts18[i].style.fontSize = 12 + (sliderValue-14) + "px";
            }
        }
        if (window.innerWidth <= 850 && window.innerWidth >= 650){
            if (12 + (sliderValue-14) <= 21.4){
                texts18[i].style.fontSize = 18 + (sliderValue-14) + "px";
            }
            else{
                texts18[i].style.fontSize = 10 + (sliderValue-14) + "px";
            }
        }
    }

    for (var i=0; i< titresH3.length; i++){
        titresH3[i].style.fontSize = 20 + (sliderValue-14) + "px";
    }

    for (var i=0; i< titresH1.length; i++){
        titresH1[i].style.fontSize = 32 + (sliderValue-14) + "px";
    }
    for (var i=0; i< menuHeader.length; i++){
        if (window.innerWidth >= 1000){
            if (12 + (sliderValue-14) <= 18){
                menuHeader[i].style.fontSize = 12 + (sliderValue-14) + "px";
            }
            else{
                menuHeader[i].style.fontSize = 18 + "px";
            }
        }

        // MOBILE FONT SIZE Agrandir
        if (window.innerWidth <= 999 && window.innerWidth >= 10){
            if (12 + (sliderValue-14) <= 21.4){
                menuHeader[i].style.fontSize = 15 + (sliderValue-14) + "px";
            }
            else{
                menuHeader[i].style.fontSize = 21.4 + "px";
            }
        }
    }

    for (var i=0; i< titresH2.length; i++){
        if (titresH2[i].closest('div').className === "u-annexe-titre") {
            console.log(titresH2[i].closest('div').className);
            titresH2[i].style.fontSize = 22 + (sliderValue-14) + "px";
        }
        if (window.innerWidth <= 500){
                titresH2[i].style.fontSize = 30 + "px";
        }
        
        else{
            titresH2[i].style.fontSize = 30 + (sliderValue-14) + "px";
        }
        
    }
});


// CLIQUE A+ OR A-

var augmentationA = document.getElementById("augmentation-a");

var slider = document.getElementById("slider");

augmentationA.addEventListener("click", function() {
    slider.value = parseInt(slider.value) + 3.2;

    var event = new Event('input', {
        bubbles: true,
        cancelable: true
    });
    slider.dispatchEvent(event);
});


var diminutionA = document.getElementById("diminution-a");

var slider = document.getElementById("slider");

diminutionA.addEventListener("click", function() {
    slider.value = parseInt(slider.value) - 3.2;

    var event = new Event('input', {
        bubbles: true,
        cancelable: true
    });
    slider.dispatchEvent(event);
});


// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Function to get a cookie value by name
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Example usage: Set the font size in a cookie when the slider value changes
slider.addEventListener("input", function() {
    var sliderValue = slider.value;
    setCookie("fontSize", sliderValue, 30); // Expires in 30 days
    // Rest of your font size adjustment code
});

// Example usage: Retrieve the font size from the cookie on page load
window.onload = function() {
    var fontSizeFromCookie = getCookie("fontSize");
    if (fontSizeFromCookie) {
        slider.value = fontSizeFromCookie;
        // Trigger the input event to update font sizes
        var event = new Event('input', {
            bubbles: true,
            cancelable: true
        });
        slider.dispatchEvent(event);
    }
};








// ENREGISTER HEADER DARK ET LIGHT

var contrastDark = document.getElementsByClassName('js-a-contrast-dark');
var contrastDark2 = document.getElementsByClassName('js-a-contrast-dark2');
var contrastHeader = document.getElementsByClassName('js-a-contrast-header');
var contrastLight = document.getElementsByClassName('js-a-contrast-light');
var contrasteIcon = document.getElementById('a-contraste');

var contrastState = localStorage.getItem('contrastState') === 'true';

function updateUI() {
    console.log("contraste appuyé");
    console.log(contrastDark);
    console.log(contrastLight);

    var iconPath;

    if (contrastState) {
        iconPath = "asset/icons/svg/white/contrast_rtl_off_FILL0_wght400_GRAD0_opsz48.svg";
    } else {
        iconPath = "asset/icons/svg/white/contrast_FILL0_wght400_GRAD0_opsz48.svg";
    }

    if (window.location.pathname.endsWith("index.php")) {
        contrasteIcon.src = iconPath;
    } else {
        contrasteIcon.src = "../" + iconPath;
    }

    for (var i = 0; i < contrastDark.length; i++) {
        contrastDark[i].style.backgroundColor = contrastState ? '#0C101D' : '';
    }

    for (var i = 0; i < contrastDark2.length; i++) {
        contrastDark2[i].style.backgroundColor = contrastState ? '#0C101D' : '#4861ad';
    }

    for (var i = 0; i < contrastLight.length; i++) {
        contrastLight[i].style.backgroundColor = contrastState ? 'white' : 'transparent';
    }

    for (var i = 0; i < contrastHeader.length; i++) {
        contrastHeader[i].style.backdropFilter = contrastState ? 'none' : 'blur(10px)';
        contrastHeader[i].style.webkitBackdropFilter = contrastState ? 'none' : 'blur(20px)';
        contrastHeader[i].style.background = contrastState ? 'rgba(12, 16, 29, 1)' : 'rgba(12, 16, 29, 0.4)';
    }

    // Sélectionner tous les éléments avec la classe .s4-item
    var s4Items = document.querySelectorAll('.s4-item');

    // Parcourir tous les éléments et appliquer les modifications nécessaires
    s4Items.forEach(function(item) {
        item.style.backgroundColor = contrastState ? 'rgba(12, 16, 29, 1)' : 'transparent'; // Si mode sombre activé, couleur de fond noire, sinon transparent

        // Modifier la propriété background-image
        if (contrastState) {
            item.style.backgroundImage = 'none'; // Si mode sombre activé, image de fond supprimée
        } else {
            item.style.backgroundImage = ''; // Sinon, image de fond rétablie
        }
    });
}

updateUI();

contrasteIcon.addEventListener("click", function (event) {
    event.preventDefault();
    contrastState = !contrastState;
    localStorage.setItem('contrastState', contrastState);
    updateUI();
});

// Fonction pour démarrer un compteur
function startCounter(targetNumber, duration, counterElementId, includePercentage = true) {
    let currentNumber = 0;
    const increment = targetNumber / (duration / 1000); // Calculer l'incrément par milliseconde
    const counterElement = document.getElementById(counterElementId);

    const intervalId = setInterval(function() {
      currentNumber += increment;
      // Vérifier si l'ID est 'test' pour ajouter '+ ' avant le nombre
      const displayValue = counterElementId === 'test' ? '+ ' + Math.round(currentNumber) : Math.round(currentNumber);
      counterElement.textContent = displayValue + (includePercentage ? '%' : '');

      if (currentNumber >= targetNumber) {
        clearInterval(intervalId);
        // Vérifier si l'ID est 'test' pour ajouter '+ ' avant le nombre
        const finalValue = counterElementId === 'test' ? '+ ' + targetNumber : targetNumber;
        counterElement.textContent = finalValue + (includePercentage ? '%' : '');
      }
    }, 1); // Mettre à jour toutes les millisecondes
}

// Données des compteurs
const countersData = [
    { target: 50, duration: 150000, elementId: 'test' },
  { target: 90, duration: 150000, elementId: 'NiveauBAC3' },
  { target: 55, duration: 150000, elementId: 'SalaireHandicap' },
  { target: 4, duration: 150000, elementId: 'domaine_expertise', includePercentage: false },
  { target: 2, duration: 150000, elementId: 'agencesFrance', includePercentage: false }
];

// Fonction pour observer la section et démarrer les compteurs quand elle est visible
const sectionObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      countersData.forEach(counter => {
        startCounter(counter.target, counter.duration, counter.elementId, counter.includePercentage);
      });
      sectionObserver.unobserve(entry.target); // Arrêter l'observation une fois que la section est visible
    }
  });
});

// Observer la section
const section = document.querySelector('.u-chiffres-struct');
sectionObserver.observe(section);