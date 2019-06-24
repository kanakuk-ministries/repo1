<?php
  $args = array (
      'image_url'       => array( 'image_url' ),
      'body'            => array( 'body' ),
      'title'           => array( 'text' ),
      'link'            => array( 'url' )
  );
?>

<div class="cell small-12 medium-6 four-image-block-section-container">
    <img src="<?php echo $args['image_url']; ?>" />
    <div class="four-image-block-image-overlay-container">
        <p class="large-sub-text white bold">
            <?php echo $fields['body']; ?>
        </p>
    </div>
    <div class="title-overlay flex-container justify-space-between align-center">
        <h1 class="white title-overlay-title">
            <?php echo $fields['title']; ?>
        </h1>
        <i class="icon icon-overnight white kamp-icon"></i>
        <a class="white learn-more-link" href="<?php echo $fields['link']; ?>">Learn More <i class="white icon icon-caret-large-right"></i></a>
    </div>
</div>