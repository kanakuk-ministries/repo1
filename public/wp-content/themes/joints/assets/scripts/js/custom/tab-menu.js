jQuery(document).ready(function() {
  var pageURL = jQuery(location).attr("href");
  var tabTitles;
  if (pageURL.includes("-kamp")) {
    tabTitles = jQuery(".hero-tabs.kamp-types-tabs .tabs-title a");
    tabTitles.each(function(i, el) {
      var element = jQuery(el);

      var title = el.className.replace("-tab-link", "").toLowerCase();
      if (pageURL.includes(title)) {
        element.parent(".tabs-title").addClass("active");
      }
    });
  } else if (pageURL.includes("about-") || pageURL.includes("donate-")) {
    tabTitles = jQuery(".hero-tabs .tabs-title a");
    tabTitles.each(function(i, el) {
      var element = jQuery(el);

      var title = el.className.replace("-tab-link", "").toLowerCase();

      if (pageURL.includes(title)) {
        element.parent(".tabs-title").addClass("active");
      }
    });
  }
});
