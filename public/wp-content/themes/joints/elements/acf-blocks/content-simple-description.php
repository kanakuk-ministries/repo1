<?php
/**
 * Block Name: Simple Description
 *
 * This is the template that displays a header and some text.
 */

// get the WP_Post Object ID
// $kamp_id = get_field('kamp');

// the fields
$fields = get_fields();
$post_id = get_the_ID();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>
<div class="sub-hero-container mb-0">
    <div class="hero-sub-section text-center padding-top-20 padding-bottom-20">
        <div class="excursions grid-container">
            <h2 class="white hero-sub-section-text">
              <?php echo $fields['team_title']; ?>
            </h2>            
            <p class="white"><?php echo $fields['title_description']; ?></p>
        </div>
    </div>
</div>
