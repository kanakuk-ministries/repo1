<?php
/**
 * Block Name: Contact Us Section
 *
 * This is the template that displays camp information inline.
 */

// the fields
$fields = get_fields();
$kamps = get_kamps();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="contact-us-block text-center">
  <h1 class="dark-blue display"><?php echo $fields['title']; ?></h1>
  <div>
    <p class="dark-blue margin-bottom-0 bold"><?php echo $fields['main_phone_number']; ?></p>
    <p class="dark-blue margin-bottom-0 bold"><?php echo $fields['days_available']; ?></p>
    <p class="dark-blue margin-bottom-0 bold"><?php echo $fields['hours_available']; ?></p>
    <p class="medium-text dark-blue margin-bottom-40"><?php echo $fields['contact_information_note']; ?></p>
    <p class="medium-text dark-blue bold margin-bottom-30"><?php echo $fields['individual_kamp_office_notice']; ?></p>
    <ul class="margin-left-0">
      <?php foreach ($kamps as $key => $value): ?>
        <?php if (isset($value['contact_number'])): ?>
          <li class="dark-blue">
            <span><?php echo $value['kamp_title']; ?> </span> 
            <span><?php echo $value['contact_number']; ?></span>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</div>