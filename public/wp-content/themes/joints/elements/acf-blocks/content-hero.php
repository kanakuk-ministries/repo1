<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the hero in the header.
 */

 // get the WP_Post Object ID
// $kamp_id = get_field('kamp');
$post_id = get_the_ID();

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
$imageUrl = $fields['image']['url'];
?>

<div class="hero-container <?php echo $fields['size']; ?>">
    <div class="hero-container inner">
        <div class="parallax-slider">
            <div class="hero-media-container hero-<?php echo $fields['size']; ?>" style="background-image: url(<?php echo $imageUrl; ?>)">
                <?php if(isSet($fields['video'])): ?>
                    <div class="embed-container <?php echo strval($post_id); ?>">
                        <?php echo do_shortcode($fields['video']); ?>
                        <?php #echo do_shortcode($fields['video_shortcode']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="hero-content-container">
        <div class="grid-x grid-container hero-content-inner-container">
            <?php if (!empty($fields['title']) || !empty($fields['subtitle'])) : ?>
            <div class="hero-content-background <?php echo $fields['text_overlay_alignment']; ?>">
                <h1 class="display text-<?php echo $fields['text_overlay_alignment']; ?>">
                    <?php echo $fields['title']; ?>
                </h1>
                <p class="bold sub-text">
                    <?php echo $fields['subtitle']; ?>
                </p>
                <?php echo element('search-dropdown'); ?>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>

<script>
    var post_id = <?php echo json_encode($post_id); ?>;
    var fields = <?php echo json_encode($fields); ?>;
    var image_url = fields.image.url;
    var video_element = jQuery('.embed-container.' + post_id + ' video');
    video_element.attr('poster', image_url);
</script>