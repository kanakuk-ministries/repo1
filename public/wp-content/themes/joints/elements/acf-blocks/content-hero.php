<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the hero in the header.
 */

// get the WP_Post Object ID
// $kamp_id = get_field('kamp');
$post_id = get_the_ID();
$kauai_menu = array('2020 Speakers', 'Excursions');
$safety_page_menu = array('Child protection plan', 'Healthy Environment', 'Healthy Relationships');
// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
$imageUrl = $fields['image']['url'];
 $video = $fields['video'];
 $autoplay = " "."autoplay";
 $video = substr_replace($video, $autoplay, 6, 0);
?>

<div class="hero-container <?php echo $fields['size']; ?> mb-0">
    <div class="hero-container inner mb-0">
        <div class="parallax-sliderhh">
            <div class="hero-media-container hero-<?php echo $fields['size']; ?>" style="background-image: url(<?php echo $imageUrl; ?>)">
                <?php if(isSet($fields['video'])) : ?>
                    <div class="embed-container <?php echo strval($post_id); ?>">
                        
                        
                        <?php echo do_shortcode($fields['video']); ?>
                        <?php // echo do_shortcode($fields['video_shortcode']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if($post_id=="844") :?>
        <div class="hero-tabs-container about-page margin-bottom-60">
                <ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">
                    <?php foreach ($kauai_menu as $key => $value): ?>
                    <li class="tabs-title <?php if ($key === 0) {echo 'is-active';
                                          }?>">
                        <a href="<?php echo str_replace(' ', '-', strtolower($value)); ?>" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            <?php echo $value; ?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
        </div>
        <?php endif ?>
            <?php if($post_id=="2089"  || $post_id=="3000" ||$post_id=="3003"||$post_id=="3005"||$post_id=="3407") :?>
        <div class="hero-tabs-container about-page margin-bottom-60">
                <ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">
                    <?php //foreach ($safety_page_menu as $key => $value): ?>
                    <li class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>">
                        <a href="/about-safety/child-protection-plan/" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            Child protection plan
                        </a>
                      </li>
                    <li class="tabs-title <?php if ($key === 1) {echo 'is-active';}?>">
                        <a href="/about-safety/healthy-environment/" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            Healthy Environment
                        </a>
                    </li>
                    <li class="tabs-title <?php if ($key ===2) {echo 'is-active';}?>">
                        <a href="/about-safety/healthy-relationships/" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            Healthy Relationships
                        </a>
                    </li>
                    <?php //endforeach;?>
                </ul>
        </div>
            <?php endif ?>
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
    <div class="back-kanakuk">
    <a href="http://kanakuk.com/" class="btn">Back to old Kanakuk</a>
    </div>
    
</div>

<script>
    var post_id = <?php echo json_encode($post_id); ?>;
    //console.log("postid"+post_id);
    var fields = <?php echo json_encode($fields); ?>;
    var image_url = fields.image.url;
    var video_element = jQuery('.embed-container.' + post_id + ' video');
    video_element.attr('poster', image_url);
    video_element.attr('autoplay', '');
    video_element.attr('loop', '');

    jQuery(function($) {
        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $('ul a').each(function() {
         if (this.href === path) {
          $(this).addClass('speaker-color');
         }
        });
       });
    </script>
