<?php /* Template Name: About >> All Activities */ ?>
<?php 
/**
 * The template for displaying an about page
 */
$about_pages = array('Our Story', 'Teams', 'Our Ministries', 'All Activities', 'Ceremonies', 'FAQs');
$kamp_types = get_kamp_types();
$team_activites = get_fields();
$kamps = get_kamps();
get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x">
	
		<main class="main small-12 medium-12 large-12 cell tabs-view about-page-main" role="main">
            <div class="hero-tabs-container about-page margin-bottom-60">
                <ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">
                    <?php foreach ($about_pages as $key => $value): ?>
                    <li class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>">
                        <a href="about-<?php echo str_replace(' ', '-', strtolower($value)); ?>" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            <?php echo $value; ?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
						</div>
						
						
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    
					<?php 
					$post = get_post(); 

					if ( has_blocks( $post->post_content ) ) {
						$blocks = gutenberg_parse_blocks( $post->post_content );
					
						foreach ($blocks as $block) {
							echo gutenberg_render_block($block);
							
							
						}
					}
					?>
			    
					<?php endwhile; endif; ?>	
                
					<div class="grid-container">
						<div class="accordion-image-grid-container margin-top-50">
							<h1 class="dark-blue"><?php echo $team_activites['team_title']; ?></h1>
							<p class="dark-blue margin-bottom-30"><?php echo $team_activites['team_description']; ?></p>
							<ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
							<?php foreach ($kamp_types as $key => $value): ?>
								<li class="accordion-item <?php if ($key === 0) { echo 'is-active'; }; ?>" data-accordion-item>
									<!-- Accordion title -->
									<a href="#" class="accordion-title list-grid-accordion-title-container" style="background-color: <?php echo $value['color']; ?>">
										<div class="accordion-title-icon-container"><i class="icon large white"></i></div>
										<div class="accordion-title-text-container">
											<h4 class="white list-grid-accordion-title-header"><?php echo $value['title']; ?> Kamp</h4>
											<i class="icon white large icon-<?php echo $value['icon_name']; ?>"></i>
										</div>
									</a>

									<!-- Accordion content: use `is-active` state class to start in open position. -->
									<ul class="accordion-content" data-tab-content>
										<?php foreach ($kamps as $kamp_key => $kamp): ?>
											<?php if ($kamp['kamp_type']->post_title === $value['title']) : ?>
												<div class="list-grid-section-container">
													<div class="flex-container align-center list-grid-section-sub-header-container">
														<h4 class="margin-bottom-0 margin-top-15 kamp-<?php echo $value['icon_name']; ?>"><?php echo $kamp['kamp_title']; ?></h4>
														<div class="kamp-<?php echo $value['icon_name']; ?> list-grid-section-sub-header"></div>
													</div>
													<?php if (isset($kamp['activities']) && reset($kamp['activities'])): ?>
														<ul class="list-grid-container activity-grid">
															<?php
																$i = 0;
																foreach ((reset($kamp['activities'])) as $activity_key => $activity):
																	if ($i === 4)
																		$i = 0;
																	$i++;
															?>
																<?php
																	$activity_id = array($activity->ID);
																	$this_activity_array = get_activities($activity_id);
																	$this_activity = reset($this_activity_array);
																?>
																
				<div id="myModal<?php echo $activity_id;?>"
					class="modal fade popout-about-card">
					<div class="modal-dialog modal-lg aboutInfoModal">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
								<h4 class="modal-title card-section"><?php echo $this_activity['activity_name']; ?></h4>
							</div>
							<div class="modal-body customModalBody"><?php echo $this_activity['activity_description']; ?></div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
																<div class="list-grid-item block-<?php echo $i; ?>">
																	<img src="<?php echo $this_activity['activity_image']['url']; ?>">
																	<div class="list-grid-item-overlays">
																		<h6 class="secondary bold white text-center titlecase margin-bottom-20"><?php echo $this_activity['activity_name']; ?></h6>
																		<h6 class="secondary bold white text-center titlecase margin-bottom-20"><a class="link-btn" href="#myModal<?php echo $activity_id;?>"
					data-toggle="modal">Read More</a></h6>
																		<?php //if(true): ?>
<!-- 																			<button class="button expanded white hollow">Watch Video</button> -->
																		<?php //endif; ?>
																	</div>
																</div>
															<?php endforeach; ?>
														</ul>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										<?php endforeach;?>
									</ul>
								</li>
							<?php endforeach;?>
						</ul>
						</div>
						
					</div>
									
			    					
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>