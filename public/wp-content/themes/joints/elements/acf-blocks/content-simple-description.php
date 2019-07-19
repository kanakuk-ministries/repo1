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
 <div class="grid-container grid-x">
        <div class="blue-overlay-content-container cell medium-offset-1 medium-10 small-12">
            <h1 class="display white text-center">
                <?php echo $fields['team_title']; ?>
            </h1>

            <p class="large-sub-text bold white text-center">
                <?php echo $fields['title_description']; ?>
            </p>
        </div>
</div>