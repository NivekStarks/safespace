import * as THREE from "three"

class Site {
    constructor(){
        this.window = $(window);
        this.document = $(document);
        this.width = this.window.width();
        this.height = this.window.height();
    }
}

class Background{
    constructor() {
        if (!Modernizr.webgl){
            alert('votre navigateur ne supporte pas WebGL');
            return;
        }

        this.mouseX = 0;
        this.mouseY = 0;
        this.windowHalfX = site.width/2;
        this.windowHalfY = site.height/2;

        this.camera = new THREE.PerspectiveCamera(35, site.width/site.height,1, 2000);
        this.camera.position.z = 300;

        this.scene = new THREE.Scene();
        const manager = new THREE.Loading.Manager();
        manager.onProgress = (item, loaded, total) => {
            console.log(item, loaded, total);
        };
        
        const pGeom = new THREE.Geometry();
        const pMaterial = new THREE.ParticleBasicMaterial({
            color : 0xffffff,
            size : 1.5,
        });

        const loader = new THREE.ObjectLoader(manager);
        loader.load('')

    }
}