const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".menu-header")
const crossHamburger = document.querySelector(".cross-hamburger")
const bloc = document.querySelector(".search-navigation-menu")
const logo_sky = document.querySelector(".logo-navigation")



menuHamburger.addEventListener('click',()=>{
	navLinks.classList.toggle('mobile-menu')
	window.setTimeout(function(){menuHamburger.style.display = "none";},400);
	window.setTimeout(function(){ crossHamburger.style.display = "block"; }, 400);
	window.setTimeout(function(){ bloc.style.display = "flex"; }, 400);
	window.setTimeout(function(){ logo_sky.style.display = "none"; }, 400);
})

crossHamburger.addEventListener('click',()=>{
	navLinks.classList.toggle('mobile-menu')
	menuHamburger.style.display = "block";
	crossHamburger.style.display = "none";
	bloc.style.display = "none"
	logo_sky.style.display = "block";
})