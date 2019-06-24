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

<div class="grid-container intro-with-cta-container">
    <div class="flex-container justify-space-between full-width align-center">
      <h1 class="dark-blue"><?php echo $fields['title']; ?></h1>
      <?php if($fields['cta_text']): ?>
        <a class="button" href="<?php echo $fields['cta_link']; ?>">
          <?php echo $fields['cta_text']; ?>
        </a>
      <?php endif; ?>
    </div>
    <p class="dark-blue margin-bottom-30"><?php echo $fields['text']; ?></p>
</div>