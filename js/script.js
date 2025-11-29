document.addEventListener("DOMContentLoaded", function () {
  /* ==========================================================
     🧭 1. CAROUSEL UTAMA
  ========================================================== */
  const carousel = document.querySelector(".carousel");
  const btnLeft = document.querySelector(".carousel-btn.left");
  const btnRight = document.querySelector(".carousel-btn.right");

  if (carousel && btnLeft && btnRight) {
    const productItems = carousel.querySelectorAll(".product-item");
    if (productItems.length > 0) {
      const itemWidth = productItems[0].offsetWidth + 20; // termasuk margin/gap
      const visibleItems = 1;
      let currentIndex = 0;

      function moveCarousel() {
        currentIndex++;
        if (currentIndex > productItems.length - visibleItems) currentIndex = 0;
        carousel.scrollTo({
          left: currentIndex * itemWidth,
          behavior: "smooth",
        });
      }

      // Auto slide tiap 3 detik
      let autoSlide = setInterval(moveCarousel, 3000);

      function restartInterval() {
        clearInterval(autoSlide);
        autoSlide = setInterval(moveCarousel, 3000);
      }

      // Tombol navigasi kiri & kanan
      btnLeft.addEventListener("click", () => {
        currentIndex =
          currentIndex === 0
            ? productItems.length - visibleItems
            : currentIndex - 1;

        carousel.scrollTo({
          left: currentIndex * itemWidth,
          behavior: "smooth",
        });

        restartInterval();
      });

      btnRight.addEventListener("click", () => {
        moveCarousel();
        restartInterval();
      });
    }
  }

  /* ==========================================================
     🚚 2. CAROUSEL APLIKASI
  ========================================================== */
  const appCarousel = document.querySelector(
    ".applications-carousel .carousel"
  );
  const appBtnLeft = document.querySelector(
    ".applications-carousel .carousel-btn.left"
  );
  const appBtnRight = document.querySelector(
    ".applications-carousel .carousel-btn.right"
  );

  if (appCarousel && appBtnLeft && appBtnRight) {
    const appItems = appCarousel.querySelectorAll(".product-item");
    if (appItems.length > 0) {
      const itemWidth = appItems[0].offsetWidth + 20;
      const visibleItems = 1;
      let appIndex = 0;

      function moveAppCarousel() {
        appIndex++;
        if (appIndex > appItems.length - visibleItems) appIndex = 0;
        appCarousel.scrollTo({
          left: appIndex * itemWidth,
          behavior: "smooth",
        });
      }

      let autoAppSlide = setInterval(moveAppCarousel, 3000);

      function restartAppInterval() {
        clearInterval(autoAppSlide);
        autoAppSlide = setInterval(moveAppCarousel, 3000);
      }

      appBtnLeft.addEventListener("click", () => {
        appIndex =
          appIndex === 0 ? appItems.length - visibleItems : appIndex - 1;

        appCarousel.scrollTo({
          left: appIndex * itemWidth,
          behavior: "smooth",
        });

        restartAppInterval();
      });

      appBtnRight.addEventListener("click", () => {
        moveAppCarousel();
        restartAppInterval();
      });
    }
  }

  /* ==========================================================
     🍔 3. HAMBURGER MENU RESPONSIVE
  ========================================================== */
  const hamburger = document.querySelector(".hamburger-menu");
  const navLinks = document.querySelector(".nav.links");

  if (hamburger && navLinks) {
    hamburger.addEventListener("click", (e) => {
      e.stopPropagation();
      navLinks.classList.toggle("active");
    });

    document.addEventListener("click", (e) => {
      if (!navLinks.contains(e.target) && !hamburger.contains(e.target)) {
        navLinks.classList.remove("active");
      }
    });
  }

  /* ==========================================================
     🖼️ 4. SLIDE BANNER OTOMATIS
  ========================================================== */
  const slides = document.querySelectorAll(".slide");
  if (slides.length > 0) {
    let currentSlide = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    showSlide(currentSlide);
    setInterval(nextSlide, 4000);
  }

  /* ==========================================================
     🌟 5. EFEK FADE-IN SAAT SCROLL
  ========================================================== */
  const faders = document.querySelectorAll(".fade-element");

  if (faders.length > 0) {
    const appearOnScroll = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          entry.target.classList.toggle("visible", entry.isIntersecting);
        });
      },
      { threshold: 0.1, rootMargin: "0px 0px -50px 0px" }
    );

    faders.forEach((fader) => appearOnScroll.observe(fader));
  }

  /* ==========================================================
     💡 6. AKTIFKAN FEATURE BOX
  ========================================================== */
  const boxes = document.querySelectorAll(".feature-box");
  if (boxes.length > 0) {
    boxes.forEach((box) => {
      box.addEventListener("click", () => {
        boxes.forEach((b) => b.classList.remove("active"));
        box.classList.add("active");
      });
    });
  }

  /* ==========================================================
   💰 7. FORM SIMULASI KREDIT (AJAX hanya untuk halaman ini)
========================================================== */
  const form = document.getElementById("simulasiForm");

  if (form && window.location.pathname.includes("simulasi_kredit")) {
    form.addEventListener("submit", async function (e) {
      e.preventDefault();

      const formData = new FormData(form);

      try {
        const res = await fetch("/simulasi_kredit", {
          method: "POST",
          body: formData,
        });

        const data = await res.text();
        alert(data);
        form.reset();
      } catch (err) {
        console.error("Gagal mengirim data:", err);
        alert("❌ Terjadi kesalahan saat mengirim data.");
      }
    });
  }
});
