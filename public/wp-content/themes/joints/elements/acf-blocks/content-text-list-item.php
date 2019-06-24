<?php
/**
 * Block Name: Text List Item
 *
 * This is the template that displays a header and some text, for use with other, same blocks.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="simple-text-block-container container-padding-large">
    <div class="grid-container grid-x">
        <div class="cell dark-blue small-12">
            <h3 class="text-left">
                <?php echo $fields['title']; ?>
            </h1>

            <p class="bold dark-blue text-left">
                <?php echo $fields['body']; ?>
            </p>
        </div>
    </div>
</div>