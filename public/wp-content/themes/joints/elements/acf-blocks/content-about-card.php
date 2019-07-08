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

<div class="grid-container about-card-container">
	<div class="card card-with-background-image">
		<div class="card-section">
			<div class="about-card-top">
				<h3 class="dark-blue">
                    <?php echo $fields['title']; ?>
                </h3>
				<p class="dark-blue about-card-description">
                    <?php echo $fields['description']; ?>
                 <?php if($fields['read_more_description']):?>   
                 &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;
                </p>
				<a class="link-btn" href="#myModal1" data-toggle="modal">Read More</a>
                <?php endif;?>
   <div id="myModal1" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg aboutInfoModal">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
								<h4 class="modal-title"><?php echo $fields['title']; ?></h4>
							</div>
							<div class="modal-body customModalBody"><?php echo $fields['read_more_description']; ?></div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
			</div>
		</div>
		<div class="media-container <?php echo clean($fields['title']); ?>" style="background-image: url(<?php echo $fields['about_card_image']['url']; ?>)">
            <?php if(isSet($fields['video'])):           
            ?>
                <div class="video-modal">
				<div class="modal-embed-container video-center">
				<?php if ($fields['video_popup_url']):?>
				<a href="#" class="wp-video-popup">Play Video</a>
                        <?php echo do_shortcode('[wp-video-popup vimeo="1" video="https://vimeo.com/136696258"]'); ?>
                        <?php endif;?>
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