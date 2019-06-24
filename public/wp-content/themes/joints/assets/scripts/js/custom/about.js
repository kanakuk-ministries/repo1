// Team Page bio toggle
jQuery(document).ready(function($) {
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $('.staff-grid-item').click(function() {
      $(this).toggleClass('invisible visible');
      });
  } else {
    $('.staff-grid-item').hover(function() {
      $(this).toggleClass('invisible visible');
    });
  }

  // prevent contact link opening on mobile first click
  $('.staff-grid-item a').click(function(e) {
    e.preventDefault();
    if ($(this).parents('.staff-grid-item').hasClass('invisible')) {
      e.preventDefault();
    } else {
      window.location = $(this).attr('href')
    }
  });

  // prevent video opening on first click on mobile
  $('.staff-grid-item button').click(function(e) {
    e.preventDefault();
    if ($(this).parents('.staff-grid-item').hasClass('invisible')) {
      $(this).parents('.staff-grid-item').toggleClass('invisible visible');
      return false;
    } else {
      return true;
    }
  });
});