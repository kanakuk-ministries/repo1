<?php
/**
 * Block Name: Card with text list
 *
 * This is the template displays text content within a white card style.
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="grid-container grid-x card flat donate-card my-0">
  <?php foreach ($fields['content_list'] as $key => $value): ?>
    <div class="cell small-12 margin-bottom-30">
        <h6 class="text-left secondary dark-blue bold">
            <?php echo $value['title']; ?>
        </h6>

        <div class="dark-blue text-left">
            <?php echo $value['body']; ?>
        </div>
    </div>
  <?php endforeach; ?>
</div>