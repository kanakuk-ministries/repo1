<?php
/**
 * Block Name: Speakers Group
 *
 * This is the template that displays a sub hero text block below the hero.
 */

// the fields
$fields = get_fields();
$imageUrl = $fields['speaker_image']['url'];
// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="sub-hero-container">
	<div class="hero-sub-section text-center">
		<div class="grid-container">
			<div
				class="white margin-bottom-0 hero-sub-section-requirement-text speaker-image-section">
              <?php if($imageUrl):?>
               	<div
				class="speakerImgWrapper">
               <img src="<?php echo $imageUrl; ?>" alt="speaker-image">
               </div>
               <?php endif;?>
            </div>
			<div class="white hero-sub-section-text">
             <?php if($fields['term_title']):?>
                <?php echo $fields['term_title']; ?>
            </div>
            <?php endif;?>
            <div class="white hero-sub-section-text">
             <?php if($fields['speaker_title']):?>
                <?php echo $fields['speaker_title']; ?>
            </div>
            <?php endif;?>
            <p
				class="white margin-bottom-0 hero-sub-section-requirement-text">
            <?php if($fields['speaker_body']):?>
                <?php echo $fields['speaker_body']; ?>
            </p>
            <?php endif;?>
            <div
				class="white margin-bottom-0 hero-sub-section-requirement-text mt-20">
            <?php if($fields['enroll_url']):?>
                <a href="<?php echo $fields['enroll_url']; ?>"
					class="enroll-url enroll-btn"><strong>ENROLL FOR THIS TERM</strong></a>
			</div>
           <?php endif;?>
        </div>
	</div>
	<div class="background-blue-container-triangle"></div>
</div>