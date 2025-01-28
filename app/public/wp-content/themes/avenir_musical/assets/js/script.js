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

  const burgerMenu = document.getElementById("burgerMenu");
  const navMenu = document.getElementById("navMenu");

  burgerMenu.addEventListener("click", () => {
    navMenu.classList.toggle("active");
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

  /******** LIGHTBOX ********/

  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-img");
  const lightboxVideo = document.getElementById("lightbox-video");
  const close = document.querySelector(".close");
  const prev = document.getElementById("prev");
  const next = document.getElementById("next");

  // Vérifier si les éléments nécessaires existent
  const items = document.querySelectorAll(".photos-galery, .video-galery");
  if (items.length === 0 || !lightbox || !close || !prev || !next) {
    return; // Arrête l'exécution si les éléments n'existent pas
  }

  let currentIndex = 0;

  // Show the lightbox
  const openLightbox = (index) => {
    currentIndex = index;
    const item = items[currentIndex];
    if (item.tagName === "IMG") {
      lightboxImg.src = item.src;
      lightboxImg.style.display = "block";
      lightboxVideo.style.display = "none";
    } else if (item.tagName === "VIDEO") {
      lightboxVideo.src = item.src;
      lightboxVideo.style.display = "block";
      lightboxImg.style.display = "none";
    }
    lightbox.style.display = "flex";
  };

  // Close the lightbox
  const closeLightbox = () => {
    lightbox.style.display = "none";
    lightboxImg.src = "";
    lightboxVideo.src = "";
  };

  // Navigate to previous
  const showPrev = () => {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    openLightbox(currentIndex);
  };

  // Navigate to next
  const showNext = () => {
    currentIndex = (currentIndex + 1) % items.length;
    openLightbox(currentIndex);
  };

  // Attach event listeners
  items.forEach((item, index) => {
    item.addEventListener("click", () => openLightbox(index));
  });

  close.addEventListener("click", closeLightbox);
  prev.addEventListener("click", showPrev);
  next.addEventListener("click", showNext);

  // Close on overlay click
  lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    if (lightbox.style.display === "flex") {
      if (e.key === "ArrowLeft") showPrev();
      if (e.key === "ArrowRight") showNext();
      if (e.key === "Escape") closeLightbox();
    }
  });
});
