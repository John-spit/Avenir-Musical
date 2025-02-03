document.addEventListener("DOMContentLoaded", () => {
  /******* CAROUSEL ********/
  const carousels = document.querySelectorAll(".carousel-wrapper");
  carousels.forEach((carousel) => {
    const track = carousel.querySelector(".carousel-track");
    const items = Array.from(track.children);
    const nextButton = carousel.querySelector(".carousel-arrow-right");
    const prevButton = carousel.querySelector(".carousel-arrow-left");
    const dotsNav = carousel.querySelector(".carousel-dots");
    const dots = Array.from(dotsNav.children);

    let currentIndex = 0;

    const updateCarousel = () => {
      // Déplacer le track
      track.style.transform = `translateX(-${currentIndex * 100}%)`;

      // Mettre à jour les bullets
      dots.forEach((dot) => dot.classList.remove("active"));
      dots[currentIndex].classList.add("active");
    };

    // Gestion des flèches
    nextButton.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % items.length;
      updateCarousel();
    });

    prevButton.addEventListener("click", () => {
      currentIndex = (currentIndex - 1 + items.length) % items.length;
      updateCarousel();
    });

    // Gestion des bullets
    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        currentIndex = index;
        updateCarousel();
      });
    });

    // Swipe avec le doigt
    let startX,
      isSwiping = false;

    // Événements pour la souris
    track.addEventListener("mousedown", (e) => {
      startX = e.pageX;
      isSwiping = true;
      e.preventDefault(); // Empêche le comportement par défaut
    });

    track.addEventListener("mousemove", (e) => {
      if (!isSwiping) return;
      const moveX = e.pageX - startX;
      e.preventDefault(); // Empêche le comportement par défaut
      if (moveX > 50) {
        prevButton.click();
        isSwiping = false;
      } else if (moveX < -50) {
        nextButton.click();
        isSwiping = false;
      }
    });

    // Événements pour le touch
    track.addEventListener("touchstart", (e) => {
      startX = e.touches[0].pageX;
      isSwiping = true;
      e.preventDefault(); // Empêche le comportement par défaut
    });

    track.addEventListener("touchmove", (e) => {
      if (!isSwiping) return;
      const moveX = e.touches[0].pageX - startX;
      e.preventDefault(); // Empêche le comportement par défaut
      if (moveX > 50) {
        prevButton.click();
        isSwiping = false;
      } else if (moveX < -50) {
        nextButton.click();
        isSwiping = false;
      }
    });

    track.addEventListener("touchend", () => {
      isSwiping = false;
    });

    // Initialisation
    dots[0].classList.add("active");
  });

  /******** MENU BURGER ********/

  const burger = document.getElementById("burgerMenu");
  const navContainer = document.querySelector(".nav-container");

  burger.addEventListener("click", function () {
    burger.classList.toggle("open");
    navContainer.classList.toggle("open");
  });

  // Fermer le menu en cliquant sur un lien
  document.querySelectorAll(".nav-menu1 a, .nav-menu2 a").forEach((link) => {
    link.addEventListener("click", () => {
      burger.classList.remove("open");
      navContainer.classList.remove("open");
    });
  });

  /******* SCROLL FLUIDE ********/
  // Sélectionner tous les liens d'ancre
  const anchorLinks = document.querySelectorAll('a[href*="#"]');

  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      if (href.includes("#") && href !== "#") {
        e.preventDefault();
        const targetElement = document.querySelector(href);
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      }
    });
  });
});
