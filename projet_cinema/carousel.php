<div class="sec2">
            <div class="carousel">
                <img src="images/affiche-oppen-1 (1).jpg" alt="Image 1">
                <img src="images/0331414.jpg" alt="Image 2">
                <img src="images/s-l1200.jpg" alt="Image 3">
            </div>
        </div>
    

    <script>
        const carousel = document.querySelector('.carousel');
        const images = carousel.querySelectorAll('img');

        let currentIndex = 0;
        const numImages = images.length;

        function showImage(index) {
            if (index < 0 || index >= numImages) return;

            images.forEach((img, i) => {
                img.classList.toggle('active', i === index);
            });

            currentIndex = index;
        }

        function nextImage() {
            const nextIndex = (currentIndex + 1) % numImages;
            showImage(nextIndex);
        }

        setInterval(nextImage, 3000); // Change d'image toutes les 3 secondes

        // Afficher la première image (indice 0) au chargement de la page
        showImage(0);
    </script>
    

    

    <script>
        const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
        })
    </script>