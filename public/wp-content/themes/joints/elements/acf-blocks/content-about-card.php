<?php
/**
 * Block Name: Kamp Card
 *
 * This is the template that displays camp information inline.
 */

// the fields
$fields = get_fields();
$id = $fields['about_card_image']['id'];
$id = uniqid($id);
// write data to console for debugging purposes
console_log(__FILE__, $fields);
?>

<div class="grid-container about-card-container">
	<div class="card card-with-background-image">
		<div class="card-section">
			<div class="about-card-top">
				<h3 class="dark-blue">
                    <?php echo $fields['title']; ?>
                </h3>
                <?php if(count_words($fields['description']) < 35 ):?>
                    <p class="dark-blue about-card-description">
    					
    				   <?php echo $fields['description']; ?>
    				</p> 
                <?php else:?>
				<p class="dark-blue about-card-description">
				   <?php echo content($fields['description'], 35); ?>
				</p>
				<a class="link-btn" href="#myModal<?php echo $id;?>"
					data-toggle="modal">Read More</a>
				<div id="myModal<?php echo $id;?>"
					class="modal fade popout-about-card">
					<div class="modal-dialog modal-lg aboutInfoModal">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
								<h4 class="modal-title card-section"><?php echo $fields['title']; ?></h4>
							</div>
							<div class="modal-body customModalBody"><?php echo $fields['description']; ?></div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<?php endif;?>
			</div>
		</div>
		<div class="media-container <?php echo clean($fields['title']); ?>" style="background-image: url(<?php echo $fields['about_card_image']['url']; ?>)">
               <?php
            $videoUrl = $fields['video_popup_url'];
            if ($videoUrl) :
            $checkUrl = getVideoUrl($videoUrl);
                $videoId = end(explode('/',$videoUrl));
                if ($checkUrl == 'vimeo') :
                $videoPlayerUrl = 'https://player.vimeo.com/video/'. $videoId .'?autoplay=1';
                    ?>
                   <div class="video-modal">
				<div class="modal-embed-container video-center">
					<?php if($fields['video_icon_image']):?>	
					<a href="#" class="wp-video-popup"><img src="<?php echo $fields['video_icon_image']['url']; ?>" videourl="<?php echo $videoPlayerUrl; ?>"/>
					</a>
					<?php else:?>
					<a href="#" class="wp-video-popup"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/video-icon.png" videourl="<?php echo $videoPlayerUrl; ?>"/>
					</a>
					<?php endif; ?>
                  <?php echo do_shortcode('[wp-video-popup vimeo="1" video="'.$videoUrl.'"]'); ?>
                   </div>
			</div>
              <?php endif;?>
             <?php if($checkUrl=='youtube'): 
             $videoId = explode('=',$videoId)[1];
             $videoPlayerUrl = 'https://www.youtube.com/embed/'. $videoId .'?autoplay=1';
             ?>
                   <div class="video-modal">
        				<div class="modal-embed-container video-center">
        				<?php if($fields['video_icon_image']):?>
        				<a href="#" class="wp-video-popup"><img src="<?php echo $fields['video_icon_image']['url']; ?>" videourl="<?php echo $videoPlayerUrl; ?>"/>
					    </a>
                          <?php else:?>
                          <a href="#" class="wp-video-popup"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-512.png" videourl="<?php echo $videoPlayerUrl; ?>"/></a>
                          <?php endif;?>
                          <?php echo do_shortcode('[wp-video-popup video="'.$videoUrl.'"]'); ?>
                           </div>
        			</div>
              <?php endif;?> 
              <?php endif;?>
            <?php
            if (isSet($fields['video'])) :
                ?>
                <div class="video-modal">
				<div class="modal-embed-container video-center">
				        <?php echo do_shortcode($fields['video']); ?>
                    </div>
			</div>
            <?php endif; ?>
        </div>
	</div>
</div>

<script>
    var fields = <?php echo json_encode($fields); ?>;
    var image_url = fields.about_card_image.url;
    var title = fields.title.toLowerCase().replace(/[^A-Z0-9]/ig, "");
    var video_element = jQuery('.media-container.' + title + ' video');
    video_element.attr('poster', image_url);
</script>