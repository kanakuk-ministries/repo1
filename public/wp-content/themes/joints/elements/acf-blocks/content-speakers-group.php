<?php
/**
* Block Name: Speakers Group
*
* This is the template that displays a sub hero text block below the Speaker Group.
*/

// the fields
$fields = get_fields();
//echo "<pre>"; print_r($fields);
$getPostId = get_the_ID();
$value = get_post_meta($getPostId);
$enable_value= $value['enable_change_background'][0];
$imageUrl = $fields['speaker_image']['url'];
// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>
<?php if($enable_value=='Yes'){?>

   <div class="grid-container about-card-container">
   <div class="card card-with-background-image">      
         <div class="card-section">
            <h3 class="dark-blue">
             <?php if($fields['term_title']):?>
                <?php echo $fields['term_title']; ?>
            </h3>
            <?php endif;?>
            <h4 class="dark-blue about-card-description">
             <?php if($fields['speaker_title']):?>
                <?php echo $fields['speaker_title']; ?>
            </h4>
            <?php endif;?>
            <p class="dark-blue about-card-description">
            <?php if($fields['speaker_body']):?>
                <?php echo $fields['speaker_body']; ?>
            </p>
            <?php endif;?>
            <div class="white margin-bottom-0 hero-sub-section-requirement-text mt-20">
               <?php if($fields['enroll_url']):?>
                  <a href="<?php echo $fields['enroll_url']; ?>" class="enroll-url enroll-btn"><strong>ENROLL FOR THIS TERM</strong></a>
             <?php endif;?>
            </div>
         </div>   
         <div class="media-container onetruegod hero-sub-section-requirement-text speaker-image-section">
           <?php if($imageUrl):?>
               <div class="speakerImgWrapper">
                  <img src="<?php echo $imageUrl; ?>" alt="speaker-image">
               </div>
               <?php endif;?>
            </div>
       </div> 
</div>

<?php }else {?>
   
<div class="sub-hero-containersss">
       <div class="hero-sub-section text-center" style="background:<?php echo $fields['color_code']?>">
              <div class="grid-container">
                     <div class="white margin-bottom-0 hero-sub-section-requirement-text speaker-image-section">
              <?php if($imageUrl):?>
                    <div class="speakerImgWrapper">
               <img src="<?php echo $imageUrl; ?>" alt="speaker-image">
               </div>
               <?php endif;?>
            </div>
               <h3 class="white">
             <?php if($fields['term_title']):?>
                <?php echo $fields['term_title']; ?>
            </h3>
            <?php endif;?>
            <h4 class="white hero-sub-section-text">
             <?php if($fields['speaker_title']):?>
                <?php echo $fields['speaker_title']; ?>
            </h4>
            <?php endif;?>
            <p class="white about-card-description">
            <?php if($fields['speaker_body']):?>
                <?php echo $fields['speaker_body']; ?>
            </p>
            <?php endif;?>
            <div class="white margin-bottom-0 hero-sub-section-requirement-text mt-20">
            <?php if($fields['enroll_url']):?>
                <a href="<?php echo $fields['enroll_url']; ?>"
                                  class="enroll-url enroll-btn"><strong>ENROLL FOR THIS TERM</strong></a>
                     </div>
           <?php endif;?>
        </div>
       </div>
</div>
<?php }?>