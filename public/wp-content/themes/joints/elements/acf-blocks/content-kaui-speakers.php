<?php
/**
 * Block Name: Speakers Sections
 *
 * This is the template that displays the speaker in the header.
 */

// get the WP_Post Object ID
// $kamp_id = get_field('kamp');
$post_id = get_the_ID();
$kauai_menu = array(
    '2019 Speakers',
    '2020 Speakers',
    'Excursions'
);
// the fields
$fields = get_fields();
// write data to console for debugging purposes
console_log(__FILE__, $fields);
$imageUrl = $fields['image']['url'];
?>
<div
	class="hero-container <?php echo $fields['size']; ?> mb-0 speaker-section-height">
	<div class="hero-container inner">
		<div class="parallax-sliders">
			<div class="hero-media-container hero-<?php echo $fields['size']; ?> speaker-section-height" style="background-image: url(<?php echo $imageUrl; ?>)">
                 <?php //if(isSet($fields['video'])): ?>
                    <div
					class="embed-container <?php //echo strval($post_id); ?>">
                        <?php //echo do_shortcode($fields['video']); ?>
                        <?php #echo do_shortcode($fields['video_shortcode']); ?>
                    </div>
                <?php //endif; ?>
            </div>
		</div>
        <?php if($post_id=="844"):?>
        <div class="hero-tabs-container about-page margin-bottom-60">
			<ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">
                    <?php foreach ($kauai_menu as $key => $value): ?>
                    <li
					class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>"><a
					href="<?php echo str_replace(' ', '-', strtolower($value)); ?>"
					class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            <?php echo $value; ?>
                        </a></li>
                    <?php endforeach;?>
                </ul>
		</div>
		 <?php endif ?>
    </div>
	<div class="hero-content-container">
		<div class="grid-x grid-container hero-content-inner-container">
            <?php if (!empty($fields['title']) || !empty($fields['subtitle'])) : ?>
            <div
				class="hero-content-background <?php echo $fields['text_overlay_alignment']; ?> custom-hero-content">
				<h1
					class="display text-<?php echo $fields['text_overlay_alignment']; ?>">
                    <?php echo $fields['title']; ?>
                </h1>
               <?php echo element('search-dropdown'); ?>
            </div>
            <?php endif ?>
        </div>
	</div>
</div>

<script>
    var post_id = <?php echo json_encode($post_id); ?>;
    //console.log("postid"+post_id);
    var fields = <?php echo json_encode($fields); ?>;
    var image_url = fields.image.url;
    //var video_element = jQuery('.embed-container.' + post_id + ' video');
    //video_element.attr('poster', image_url);
</script>