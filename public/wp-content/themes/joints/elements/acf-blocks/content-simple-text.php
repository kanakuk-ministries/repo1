<?php
/**
 * Block Name: Simple TExt
 *
 * This is the template that displays a header and some text.
 */

 // get the WP_Post Object ID
// $kamp_id = get_field('kamp');

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="simple-text-block-container background-image-container container-padding-large"
    <?php if ($fields['animation']) { ?>
        data-parallax="scroll" data-image-src="<?php echo $fields['background']['url']; ?>"
    <?php } else{ ?>
        style="background-image: url(<?php echo $fields['background']['url']; ?>)"
    <?php } ?>
    >
    <div class="grid-container grid-x">
        <div class="blue-overlay-content-container cell medium-offset-1 medium-10 small-12">
            <h1 class="display white text-center">
                <?php echo $fields['title']; ?>
            </h1>

            <p class="large-sub-text bold white text-center">
                <?php echo $fields['body']; ?>
            </p>
        </div>
    </div>
</div>