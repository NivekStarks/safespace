<?php include_once('../php/ScriptConnection.php'); ?>

<?php
session_start();

$sqlQuery = 'SELECT Image_Avatar from avatar';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$avatars = $prep->fetchAll();

$liste = array();

foreach ($avatars as $avatar){
	
	array_push($liste,$avatar['Image_Avatar']);

}
$jsAvatars = json_encode($liste);

?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../favicon.ico" sizes="any">
		<link rel="icon" href="../asset/favicon/logo-favicon.ico" type="image/svg+xml">
		<link rel="apple-touch-icon" href="../asset/favicon/logo-favicon.ico"><!-- 180×180 -->
		<link rel="manifest" href="/site.webmanifest">
		<title data-i18n="propose-de-nous_i18n">Skyincap - A propos de nous</title>
		<link href="../style/about-us.css" rel="stylesheet" type="text/css">
		<link href="../style/css-1920.css" rel="stylesheet" type="text/css">
		<link href="../style/reset.css" rel="stylesheet" type="text/css">
		<link href="../style/fonts.css" rel="stylesheet" type="text/css">
		<link href="../style/header-footer.css" rel="stylesheet" type="text/css">
		<link href="../style/main.css" rel="stylesheet" type="text/css">
        <script src="../script/main.js"></script>

	</head>
	<body>

	
		<!-- HEADER -->

		<?php include('header.php') ?>
		
		<!-- SECTION 1 PHOTO ACCUEIL -->


	<main>
		<div class="section1 about-us">
			<div class="container js-a-contrast-dark">
				<a href="#about-us"><img src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg" class="double-fleche" alt="Double flèche pour descendre"></a>
			</div>
		</div>

		
		<!-- SECTION 2 QUI SOMMES NOUS -->


		<div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 id="about-us" class="no-margin js-a-titre-h1" data-i18n="who_i18n"></h1>
					<div class="u-top-text-long">
						<p class="u-top-text-long-- js-a-text" data-i18n="2018_i18n"></p>
						<p class="u-top-text-long-- js-a-text" data-i18n="2018_i18n_1"></p>
						<p class="u-top-text-long-- js-a-text" data-i18n="2018_i18n_2"></p>

                    </div>
				</div>
            </div>
        </div>


        <!-- SECTION 4 HISTOIRE TIMELINE -->


		
        <div class="section4">
			
            <div class="u-container">
                <div class="u-top-titre-principal">
                    <h1 class="js-a-titre-h1" data-i18n="histoire_i18n">Notre histoire</h1>
                </div>
                <div class="s4-timeline">
					
                    <li style="--accent-color:#33b1ff" class="js-a-timeLine">
                        <div class="date"></div>
                        <div class="title">2018</div>
                        <div class="descr" data-i18n="histoire_2018_i18n">Création de Skyincap et ouverture de l’agence à Toulouse.</div>
                    </li>
                    <li style="--accent-color: #675DEB" class="js-a-timeLine">
                        <div class="date"></div>
                        <div class="title">2021</div>
                        <div class="descr" data-i18n="histoire_2021_i18n">Après 3 ans d'existence, référencement en contrat direct sur des activités MBSE, Data Science, Conception système.</div>
                    </li>
                    <li style="--accent-color:#8D3FC1" class="js-a-timeLine">
                        <div class="date"></div>
                        <div class="title">2022</div>
                        <div class="descr" data-i18n="histoire_2022_i18n">Ouverture de l'agence de Nice avec de nouveaux référencements en contrat direct pour des activités logiciel et IT</div>
                    </li>
					<li style="--accent-color:#D25462" class="js-a-timeLine">
                        <div class="date"></div>
                        <div class="title">2023 </div>
                        <div class="descr" data-i18n="histoire_2023_i18n">Après le succès de l'aéronautioque,  poursuite du développement de l'entreprise avec l'ouverture du secteur bancaire.</div>
                    </li>
                    <li style="--accent-color:#ff7eb6" class="js-a-timeLine">
                        <div class="date"></div>
                        <div class="title">2023</div>
                        <div class="descr" data-i18n="histoire_2023_i18n_1">Pour accompagner le développement de son projet handicap, Skyincap s'installe dans ses nouveaux locaux situés à Toulouse, Saint-Martin du Touch.</div>
                    </li>
					<li style="--accent-color:#F3A250" class="js-a-timeLine">
                        <div class="date"></div>
                        <div class="title">2030</div>
                        <div class="descr" data-i18n="histoire_2028_i18n">D'ici 2030, Skyincap a pour objectif d'atteindre un effectif de prés de 400 collaborateurs.</div>
                    </li>
					<li >
                    </li>
					
                </div>

				<div class="s4-2-timeline">
                </div> 
            </div>
        </div>

		
		<!-- SECTION 3 SECTEUR -->


        <div class="section3">
            <div class="u-container">
                <div class="u-top-titre-principal">
                    <h1 class="js-a-titre-h1" data-i18n="secteur_i18n">Nos secteurs d'activité</h1>
                </div>
                <div class="s3-struct">
                    <div class="s3-struct-row">

                        <!-- <div class="s3-item content" style="background: #B3B3B3;">
                            <a href="#modal-aviation" class="content-link hover-underline-animation-block u-rebond-fleche js-modal">
                                <h2 class="s3-item-titre js-titre-h2" data-i18n="aviation_i18n">Aviation</h2>
                                <div  class="s4-mid-actu-content-button">
                                    <div href="#modal-aviation" class="s4-mid-actu-content-button-- js-modal">
                                        <div class="s4-mid-actu-content-boutton-text">
                                            <span class="js-a-text-18" data-i18n="savoirClient_i18n">En savoir plus sur nos clients</span>
                                        </div>
                                        <div class="s4-mid-actu-content-boutton-fleche">
                                            <img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                        </div>
                                    </div>
                                </div> 
                            </a>
                        </div> -->
                        <div class="s3-item image aviation">
                            <a href="#modal-aviation" class="content-link hover-underline-animation u-rebond-fleche js-modal">
                                <h2 class="s3-item-titre js-titre-h2 js-a-contrast-dark" data-i18n="aviation_i18n">Aviation</h2>
                                <div  class="s4-mid-actu-content-button js-a-contrast-dark">
                                    <div class="s4-mid-actu-content-button-- js-modal">
                                        <div class="s4-mid-actu-content-boutton-text">
                                            <span class="js-a-text-18" data-i18n="savoirClient_i18n">En savoir plus sur nos clients</span>
                                        </div>
                                        <div class="s4-mid-actu-content-boutton-fleche">
                                            <img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <aside id="modal-aviation" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop">
                                <div class="modal-header">
                                    <bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
                                    
                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-h2" data-i18n="secteuraero_i18n">Secteur aéronautique</h2>
										<p class="js-a-text" data-i18n="secteuraeroText_i18n">
										Skyincap est une entreprise dynamique et innovante opérant dans le secteur de l'aéronautique en étroite collaboration avec Airbus.
										</p><br><br>

										<p class="js-a-text" data-i18n="secteuraeroText_i18n_2">
										Chez SkyInCap, nous sommes passionnés par l'aviation et engagés à repousser les limites du possible dans le domaine de l'aéronautique. Forts d'une expertise de pointe et d'une équipe talentueuse, nous nous sommes forgé une réputation solide en tant que partenaire de choix pour Airbus dans de nombreux projets d'envergure.
										</p><br><br>

										<p class="js-a-text" data-i18n="secteuraeroText_i18n_3">
										Chez SkyInCap, nous croyons que l'innovation et la coopération sont les clés du succès. C'est pourquoi nous encourageons un environnement de travail collaboratif où les idées peuvent s'épanouir, les talents peuvent s'épanouir, et où l'excellence est célébrée. SkyInCap est vouée à jouer un rôle essentiel dans la conception et la fabrication des avions de demain. Nous sommes fiers de contribuer à façonner un avenir plus prometteur pour l'aviation et de repousser les frontières du ciel.
										</p>

                                        <br />
                                        <p class="js-a-text" data-i18n="secteuraeroText_i18n_4"></p>


									</div>
                            </div>
                        </aside>
                        <div class="s3-item image bancaire">
                            <a href="#modal-bancaire" class="content-link hover-underline-animation u-rebond-fleche js-modal">
                                <h2 class="s3-item-titre js-titre-h2 js-a-contrast-dark" data-i18n="bancaire_i18n">Bancaire</h2>
                                <div  class="s4-mid-actu-content-button js-a-contrast-dark">
                                    <div class="s4-mid-actu-content-button-- js-modal">
                                        <div class="s4-mid-actu-content-boutton-text">
                                            <span class="js-a-text-18" data-i18n="savoirClient_i18n">En savoir plus sur nos clients</span>
                                        </div>
                                        <div class="s4-mid-actu-content-boutton-fleche">
                                            <img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                        </div>
                                    </div>
							    </div>
                            </a>   
                        </div>
                        <aside id="modal-bancaire" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop">
                                <div class="modal-header">
                                    <bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-h2" data-i18n="secteur_bancaire_i18n">Secteur bancaire</h2>
									<p class="js-a-text" data-i18n="secteur_bancaire_text_i18n"></p><br><br>
									<p class="js-a-text" data-i18n="secteur_bancaire_text_i18n_2"></p><br><br>
									<p class="js-a-text" data-i18n="secteur_bancaire_text_i18n_3"></p>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="s3-struct-row">
                        <div class="s3-item image industrie">
                            <a href="#modal-industrie" class="content-link hover-underline-animation u-rebond-fleche js-modal">
                                <h2 class="s3-item-titre js-titre-h2 js-a-contrast-dark" data-i18n="transport_i18n"></h2>
                                <div class="s4-mid-actu-content-button js-a-contrast-dark">
                                    <div class="s4-mid-actu-content-button-- js-modal">
                                        <div class="s4-mid-actu-content-boutton-text">
                                            <span class="js-a-text-18" data-i18n="savoirClient_i18n">En savoir plus sur nos clients</span>
                                        </div>
                                        <div class="s4-mid-actu-content-boutton-fleche">
                                            <img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        </div>
                        <aside id="modal-industrie" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop">
                                <div class="modal-header">
                                    <bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
                                    
                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-H2" data-i18n="secteur_transport_i18n">Secteur du transport</h2>
                                    <p class="js-a-text" data-i18n="secteur_transport_text_i18n">Dans le domaine du transport responsable, Skyincap se distingue par sa présence significative. L'engagement de notre entreprise envers des solutions de mobilité durables s'aligne parfaitement avec les besoins en constante évolution de la société moderne. En mettant l'accent sur la réduction des émissions de carbone, l'amélioration de l'efficacité et la promotion de pratiques respectueuses de l'environnement, Skyincap joue un rôle essentiel dans la promotion du transport responsable pour un avenir plus vert.</p>
                                </div>
                            </div>
                        </aside>
                        
                        <!-- <div class="s3-item content" style="background: #D9D9D9;">
                            <a href="#modal-bancaire" class="content-link hover-underline-animation-block u-rebond-fleche js-modal">
                                <h2 class="s3-item-titre js-titre-h2" data-i18n="bancaire_i18n">Bancaire</h2>
                                <div  class="s4-mid-actu-content-button">
                                    <div class="s4-mid-actu-content-button--">
                                        <div class="s4-mid-actu-content-boutton-text">
                                            <span class="js-a-text-18" data-i18n="savoirClient_i18n">En savoir plus sur nos clients</span>
                                        </div>
                                        <div class="s4-mid-actu-content-boutton-fleche">
                                            <img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="s3-item image OrganismesPublics">
                            <a href="#modal-OrganismesPublics" class="content-link hover-underline-animation u-rebond-fleche js-modal">
                                <h2 class="s3-item-titre js-titre-h2 js-a-contrast-dark" data-i18n="Organismes_publics_i18n">Organismes publics</h2>
                                <div class="s4-mid-actu-content-button js-a-contrast-dark">
                                    <div class="s4-mid-actu-content-button-- js-modal">
                                        <div class="s4-mid-actu-content-boutton-text">
                                            <span class="js-a-text-18" data-i18n="savoirClient_i18n">En savoir plus sur nos clients</span>
                                        </div>
                                        <div class="s4-mid-actu-content-boutton-fleche">
                                            <img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        </div>
                        <aside id="modal-OrganismesPublics" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop">
                                <div class="modal-header">
                                    <bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
                                    
                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-H2" data-i18n="secteur_Organismes_publics_i18n">Secteur de l'organisme public</h2>
                                    <p class="js-a-text" data-i18n="secteur_Organismes_publics_text_i18n">Dans le domaine du transport responsable, Skyincap se distingue par sa présence significative. L'engagement de notre entreprise envers des solutions de mobilité durables s'aligne parfaitement avec les besoins en constante évolution de la société moderne. En mettant l'accent sur la réduction des émissions de carbone, l'amélioration de l'efficacité et la promotion de pratiques respectueuses de l'environnement, Skyincap joue un rôle essentiel dans la promotion du transport responsable pour un avenir plus vert.</p>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="s3-struct-row">
						

                    </div>
                </div>
            </div>
        </div>

		
         <!-- <div class="section4-2">
            <div class="u-container">
                <div class="s4-barre-p">
                     <div class="s4-barre-p--">
						
					</div>
                </div>
            </div>
        </div> -->


        <!-- <div class="section5" id="dirigeants">
            <div class="u-container">
                <div class="u-top-titre-ptincipal">
                    <h1 class="js-a-titre-h1">Nos équipes</h1>
                </div>
            </div>
        </div>
		<div id="container3D" class="container3DD"></div>
        <script type="module">
			// Import the THREE.js library
import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
// To allow for the camera to move around the scene
import { OrbitControls } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js";
import { OBJLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/OBJLoader.js';
// To allow for importing the .gltf file
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";

// Create a Three.JS Scene
const scene = new THREE.Scene();

// Set the desired height of the container
const containerHeight = 350;

//
var windowHalfX = window.innerWidth / 2;
var windowHalfY = window.innerHeight / 2;

// Create a new camera with positions and angles
const camera = new THREE.PerspectiveCamera(45, window.innerWidth / containerHeight, 1, 2000);

// Keep the 3D object on a global variable so we can access it later
let object;

// OrbitControls allow the camera to move around the scene
let controls;

// Set which object to render
let objToRender = 'homme';

// Instantiate a loader for the .gltf file
const loader = new GLTFLoader();

var avatar = <?php //echo $jsAvatars; ?>;
console.log(avatar);

let k =0
while ((k*(k+1))/2 < avatar.length){
  k++;
}
console.log(k);

let compteur = 0;

for (let i = 0; i<k; i++) {
  for (let j = 0; j<i+1; j++){
    if (compteur===avatar.length+1){break;}
    // Load the file
    loader.load(
      `asset/avatar/${avatar[compteur]}`,
      function (glb) {
        object = glb.scene;

        // Center the 3D object in the middle of the container
        const box = new THREE.Box3().setFromObject(object);
        const center = box.getCenter(new THREE.Vector3());
        object.position.sub(center);
        object.position.x = -i/2 + j;
        object.position.z = -i/2;

        scene.add(object);
      },
      function (xhr) {
        // While it is loading, log the progress
        console.log((xhr.loaded / xhr.total * 100) + '% loaded');
      },
      function (error) {
        // If there is an error, log it
        console.error(error);
      }
    );
    compteur++;
    console.log('compteur' + compteur);
  }
} 


// Instantiate a new renderer and set its size
const renderer = new THREE.WebGLRenderer({ alpha: true }); // Alpha: true allows for the transparent background
renderer.setSize(window.innerWidth, containerHeight);
renderer.setPixelRatio(window.devicePixelRatio);

// Add the renderer to the DOM
document.getElementById("container3D").appendChild(renderer.domElement);



// Set how far the camera will be from the 3D model
camera.position.z = 3;
camera.position.y = 1.5;
camera.rotation.x = -.3;

// Add lights to the scene, so we can actually see the 3D model
const topLight = new THREE.DirectionalLight(0xffffff, 1.5); // (color, intensity)
topLight.position.set(5, 5, 5); // top-left-ish
topLight.castShadow = true;
scene.add(topLight);

const ambientLight = new THREE.AmbientLight(0x333333, 1);
scene.add(ambientLight);

function render() {
  renderer.render(scene, camera);
}
function annimation() {
 /* ticker = TweenMax.ticker;
  ticker.addEventListener("tick",annimation);*/

  render();
}

// Render the scene
function animate() {
  requestAnimationFrame(animate);
  // Here we could add some code to update the scene, adding some automatic movement

  // Make the eye move
  if (object && objToRender === "eye") {
    // I've played with the constants here until it looked good
    object.rotation.y = -3 + mouseX / window.innerWidth * 3;
    object.rotation.x = -1.2 + mouseY * 2.5 / window.innerHeight;
  }
  /*if (object && objToRender === "airbus_a380") {
    // I've played with the constants here until it looked good
    object.rotation.y = 2.2 + mouseX / window.innerWidth * 1.3;
    object.rotation.x = -0.3 + mouseY * 1.1 / window.innerHeight;
  }*/

  render()
  annimation ();
}



// Add a listener to the window, so we can resize the window and the camera
window.addEventListener("resize", function () {
  // Calculate the aspect ratio based on the new container height
  const aspectRatio = window.innerWidth / containerHeight;

  // Update camera aspect ratio and projection matrix
  camera.aspect = aspectRatio;
  camera.updateProjectionMatrix();

  // Update renderer size
  renderer.setSize(window.innerWidth, containerHeight);
  renderer.setPixelRatio(window.devicePixelRatio);
});

// Start the 3D rendering
animate();

		</script>
	</main> -->


	<!-- SECTION 5 AGENCE historique -->



	<div class="section5" id="dirigeants">
            <div class="u-container">
                <div class="u-top-titre-ptincipal">
                    <h1 class="js-a-titre-h1" data-i18n="Nos_agences_i18n">Nos agences</h1>
                </div>
				<div class="s5-agence-item">
					<div class="s5-agence-photo toulouse">
					</div>
					<h2 class="js-titre-h2" style="margin: 20px 0;color:black;">Toulouse</h2>
					<p class="js-a-text" data-i18n="toulouse_i18n">Agence historique, Skyincap est implanté au cœur de cette cité aéronautique renommée, notre agence incarne l'excellence et l'expertise. Forts de nos racines dans cette région emblématique, nous mettons en œuvre des solutions ingénieuses qui reflètent le dynamisme et l'héritage d'une ville dédiée à l'avant-garde technologique.</p>
					
				</div>
				<div class="s5-agence-item">
					<div class="s5-agence-photo nice"></div>
					<h2 class="js-titre-h2" style="margin: 20px 0;color:black;">Nice</h2>
					<p class="js-a-text" data-i18n="nice_i18n">Découvrez notre agence de Nice, stratégiquement située en face de l'aéroport. Nous sommes fiers d'offrir des solutions technologiques innovantes au cœur de cette destination dynamique. Notre emplacement privilégié nous permet de connecter l'ingénierie à l'accessibilité, faisant de nous le choix idéal pour des collaborations fructueuses et des projets d'envergure.</p>
				</div>
            </div>
        </div>
    <?php include('../php/banner.php') ?>
	</main>
	<div class="u-creative-code"></div>
    
	<?php include('footer.php') ?>

	</body>
	<script src="../script/app.js"></script>
	<script src="../script/activePage.js"></script>
	<script src="../script/accessibility.js"></script>
    <script src="../script/header.js"></script>



</html>





