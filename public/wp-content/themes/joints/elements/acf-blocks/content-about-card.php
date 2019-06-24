<?php
/**
 * Block Name: Kamp Card
 *
 * This is the template that displays camp information inline.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="grid-container about-card-container">
    <div class="card card-with-background-image">
        <div class="card-section">
            <div class="about-card-top">
                <h3 class="dark-blue">
                    <?php echo $fields['title']; ?>
                </h3>
                <p class="dark-blue about-card-description">
                    <?php echo $fields['description']; ?>
                </p>
            </div>
        </div>
        <div class="media-container <?php echo clean($fields['title']); ?>" style="background-image: url(<?php echo $fields['about_card_image']['url']; ?>)">
            <?php if(isSet($fields['video'])): ?>
                <div class="video-modal">
                    <div class="modal-embed-container video-center">
                        <?php echo do_shortcode($fields['video']); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    var fields = <?php echo json_encode($fields); ?>;
    var image_url = fields.about_card_image.url;
    var title = fields.title.toLowerCase().replace(/[^A-Z0-9]/ig, "");
    var video_element = jQuery('.media-container.' + title + ' video');
    video_element.attr('poster', image_url);
</script>