<?php
/**
 * Block Name: 4-Image
 *
 * This is the template that displays 4 images in a block.
 */

// get the WP_Post Object ID
$kamp_id = get_field('kamp');
// the fields
$fields = get_fields();
$kamp = get_fields($kamp_id);
$kamp_directors = reset($kamp['directors']);
$directorsIds = array_map(function ($director) {
    return $director->ID;
}, $kamp_directors);
    //filter the k-kauai directors
    if($kamp_id==280){
        $directorsIds = [420,432,433,442];
    }
    $contact_staff = get_staff($directorsIds);
    // write data to console for debugging purposes
    console_log(__FILE__, $fields);
    
    ?>

<div class="multi-image-block-container container-padding-small">
  <div class="grid-x grid-container">
    <div class="medium-offset-1 medium-10 small-12">
      <h1 class="display dark-blue margin-bottom-60 text-center"><?php echo $fields['title'] ?></h1>
      <div class="flex-container kamp-contact-container">
        <div class="kamp-contact-directors-grid-container justify-center align-flex-start">
          <?php foreach ($contact_staff as $key => $value): ?>
            <div class="contact-director-info">
              <div class="avatar-medium">
                <img class="avatar-image" src="<?php echo $value['member_image']['url'] ?>" />
              </div>
              <p class="contact-director-info-name"><?php echo $value['member_name'] ?></p>
              <p class="contact-director-info-title"><?php echo $value['member_titles'] ?></p>
            </div>
          <?php endforeach;?>
          <div class="contact-director-learn-more-link">
            <a class="underline bold" href="<?php echo get_permalink(get_page_by_title('About - Teams')->ID); ?>">Learn More</a>
          </div>
        </div>
        <div class="flex-container flex-column kamp-contact-contact-info-container align-flex-star">
          <div class="kamp-contact-contact-info-top">
            <p class="bold uppercase kamp-contact-contact-info-text">Location</h6>
            <p class="kamp-contact-contact-info-text margin-bottom-0"><?php echo $fields['address_line_1'] ?></p>
            <p class="kamp-contact-contact-info-text margin-bottom-0"><?php echo $fields['address_line_2'] ?></p>
          </div>
          <div class="margin-top-70">
            <p class="bold uppercase kamp-contact-contact-info-text">Contact</h6>
            <?php if (!empty($fields['contact_phone_number'])): ?>
              <p class="kamp-contact-contact-info-text margin-bottom-0">
                <?php echo $fields['contact_phone_number'] ?>
              </p>
            <?php endif;?>
            <?php if (!empty($fields['contact_open_days'])): ?>
              <p class="kamp-contact-contact-info-text margin-bottom-0">
                <?php echo reset($fields['contact_open_days']) . " - " . end($fields['contact_open_days']) ?>
              </p>
            <?php endif;?>
            <?php if (!empty($fields['contact_open_hours'])): ?>
              <?php foreach ($fields['contact_open_hours'] as $key => $value): ?>
                <p class="kamp-contact-contact-info-text margin-bottom-0">
                  <?php echo $value['start_time'] . " - " . $value['end_time'] ?>
                </p>
              <?php endforeach;?>
            <?php endif;?>
            <?php if (!empty($fields['contact_email_address'])): ?>
              <a href="mailto:<?php echo $fields['contact_email_address'];?>" class="button large margin-top-20">Send a Message</a>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>