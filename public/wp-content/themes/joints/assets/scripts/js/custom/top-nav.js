jQuery(document).ready(function() {
  // Add blue background to top nav on scroll
  var scrollStart = 0;
  var $nav = jQuery(".top-bar-sticky-container");

  jQuery(document).scroll(function() {
    scrollStart = jQuery(this).scrollTop();
    if (scrollStart > $nav.height()) {
      // $nav.toggleClass("scrolled");
      $nav.addClass("nav-background");
    } else if (scrollStart <= $nav.height()) {
      $nav.removeClass("nav-background");
    }
  });

  // Handle mobile icon show / hide in order for second click to close menu
  var openIcon = jQuery("#mobile-nav-open-icon");
  var closedIcon = jQuery("#mobile-nav-closed-icon");
  var mobileNavReveal = jQuery("#mobile-nav-modal");

  jQuery("#mobile-nav-open-icon").on("click", function(event) {
    if (mobileNavReveal[0].style.display === "block") {
      mobileNavReveal.foundation("close");
    }
  });

  jQuery("#mobile-nav-modal").on("open.zf.reveal", function() {
    closedIcon.toggleClass("hide");
    openIcon.toggleClass("hide");
  });

  jQuery("#mobile-nav-modal").on("closed.zf.reveal", function() {
    closedIcon.toggleClass("hide");
    openIcon.toggleClass("hide");
  });
});
