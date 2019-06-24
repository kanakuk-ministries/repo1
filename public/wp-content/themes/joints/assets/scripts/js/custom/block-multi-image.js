jQuery(document).ready(function() {
  jQuery(".multi-image-block-section-container").hover(function(event) {
    var targetElement = jQuery(this);
    var otherElements = jQuery(".multi-image-block-section-container").not(
      targetElement
    );
    otherElements.removeClass("expanded");
    targetElement.toggleClass("expanded");
  });
});
