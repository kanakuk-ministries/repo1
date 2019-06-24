jQuery(document).ready(function($) {
  // Home Page
  ScrollReveal().reveal(
    ".multi-image-block-section-container.block-1",
    { delay: 0 }
  );
  ScrollReveal().reveal(
    ".multi-image-block-section-container.block-2",
    { delay: 500 }
  );
  ScrollReveal().reveal(
    ".multi-image-block-section-container.block-3",
    { delay: 500 }
  );
  ScrollReveal().reveal(
    ".multi-image-block-section-container.block-4",
    { delay: 1000 }
  );
  ScrollReveal().reveal(
    ".multi-image-block-section-container.block-5",
    { delay: 1000 }
  );

  // About Pages Grid
  desktopGrid = function() {
    ScrollReveal().reveal(".list-grid-item.block-1", { scale: 0.85 });
    ScrollReveal().reveal(".list-grid-item.block-2", { scale: 0.85, delay: 300 });
    ScrollReveal().reveal(".list-grid-item.block-3", { scale: 0.85, delay: 500 });
    ScrollReveal().reveal(".list-grid-item.block-4", { scale: 0.85, delay: 700 });
  };

  mobileGrid = function() {
    ScrollReveal().reveal(".list-grid-item.block-1", { scale: 0.85 });
    ScrollReveal().reveal(".list-grid-item.block-2", { scale: 0.85, delay: 300 });
    ScrollReveal().reveal(".list-grid-item.block-3", { scale: 0.85 });
    ScrollReveal().reveal(".list-grid-item.block-4", { scale: 0.85, delay: 300 });
  };

  if ($(window).width() > 640) {
    desktopGrid();
  } else {
    mobileGrid();
  }

  $(window).on("resize", function() {
    if($(this).width() > 640) {
      desktopGrid();
    } else {
      mobileGrid();
    }
  });

  // About Us
  ScrollReveal().reveal(".about-card-container .card", { delay: 300 });

  // Kamp Types
  ScrollReveal().reveal(".kamp-card-container .card", { delay: 300 });

});