<?php
/**
 * Block Name: Summer STaff
 *
 */

// the fields
$fields = get_fields();

// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="margin-bottom-70 margin-top-70">
  <h1 class="dark-blue"><?php echo $fields['title']; ?></h1>
  <div class="summer-staff-introduction-container">
    <p class="dark-blue margin-bottom-0"><?php echo $fields['description']; ?></p>
    <a class="button summer-staff-cta" href="#"><?php echo $fields['button_text']; ?></a>
  </div>
  <div class="summer-staff-information-grid-container">
    <div class="text-center summer-staff-information-container">
      <h6 class="dark-blue secondary uppercase summer-staff-information-section-title"><?php echo $fields['information_section_1_title']; ?></h6>
      <p class="dark-blue"><?php echo $fields['information_section_1_text']; ?></p>
    </div>
    <div class="text-center summer-staff-information-container">
      <h6 class="dark-blue secondary uppercase summer-staff-information-section-title"><?php echo $fields['information_section_2_title']; ?></h6>
      <p class="dark-blue"><?php echo $fields['information_section_2_text']; ?></p>
    </div>
    <div class="text-center summer-staff-information-container">
      <h6 class="dark-blue secondary uppercase summer-staff-information-section-title"><?php echo $fields['information_section_3_title']; ?></h6>
      <p class="dark-blue"><?php echo $fields['information_section_3_text']; ?></p>
    </div>
  </div>
</div>