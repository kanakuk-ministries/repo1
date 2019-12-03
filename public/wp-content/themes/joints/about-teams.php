<?php /* Template Name: About >> Teams */ ?>
<?php
/**
 * The template for displaying an about page
 */
$about_pages = array('Our Story', 'Teams', 'Our Ministries', 'All Activities', 'Ceremonies', 'FAQs');
$kamp_types = get_kamp_types();
$kamps = get_kamps();
$data_description = get_fields();
$executive_staff = get_staff(null, 'Executive Team');
get_header(); ?>

	<div class="content">

		<div class="inner-content grid-x grid-margin-x">

		<main class="main small-12 medium-12 large-12 cell tabs-view about-page-main" role="main" id="about-teams">
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
							if ($block['blockName'] === 'acf/hero') {
								echo gutenberg_render_block($block);
							}
						}
					}
					?>

					<?php endwhile; endif; ?>

					<div class="grid-container">
						<div class="visible-image-grid-container executive-team">
							<div class="flex-container justify-space-between full-width align-center">
								<h1 class="dark-blue"><?php echo $data_description['team_title']; ?></h1>
								<a class="button" href="/contact-us">Contact Us</a>
							</div>
							<p class="dark-blue margin-bottom-30"><?php echo $data_description['team_description']; ?>
</p>
							<ul class="list-grid-container">
								<?php
									$i = 0;
									foreach ($executive_staff as $executive => $this_executive):
									$memberId = $this_executive['member_image']['ID'];
									   if ($i === 4)
											$i = 0;
										$i++;
								?>
								<!-- Member description modal -->												
			
								
									<div class="staff-grid-item invisible list-grid-item block-<?php echo $i; ?>">
										<img src="<?php echo $this_executive['member_image']['url']; ?>">
										<div class="list-grid-item-overlay">
											<p class="list-grid-item-member-title uppercase white text-center"><?php echo $this_executive['member_titles']; ?></p>
											<h6 class="list-grid-item-member-name secondary bold white text-center titlecase"><?php echo $this_executive['member_name']; ?></h6>
											<a class="button expanded" href="mailto:<?php echo $this_executive['member_email']; ?>">Contact</a>
											<?php if(!empty($this_executive['member_quote'])): ?>
												<button class="button expanded white hollow"><a href="#myModal<?php echo $memberId;?>"
					data-toggle="modal" class="white">Staff Bio</a></button>
											<?php endif; ?>
									<?php if($this_executive['video']): 
											$videoUrl = $this_executive['video'];
											$checkUrl = getVideoUrl($videoUrl);
											$videoId = end(explode('/',$videoUrl));
											if ($checkUrl == 'vimeo') :
											 $videoPlayerUrl = 'https://player.vimeo.com/video/'. $videoId .'?autoplay=1';
									?>
                                                    <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    					<a href="#" class="wp-video-popup"><button class="button expanded white hollow video-modal-button" videourl="<?php echo $videoPlayerUrl; ?>">Watch Interview</button></a>
                                                    </div>
                                    			</div>
              								<?php endif;?>
              								<?php 
              								$videoUrl = $this_executive['video'];
											$checkUrl = getVideoUrl($videoUrl);
											if ($checkUrl == 'mp4') :
											 $videoPlayerUrl = 'https://player.vimeo.com/video/'. $videoId .'?autoplay=1';
									       ?>
                                                    <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    					<button class="button expanded white hollow"><a href="#videopopModal<?php echo $memberId;?>"
              											data-toggle="modal" class="white">Watch Interview</a></button>
                                                    </div>
                                    			</div>
              								<?php endif;?>
              								<?php 
              								$videoUrl = $this_executive['video'];
											$checkUrl = getVideoUrl($videoUrl);
											$videoId = explode('=',$videoId)[1];
											$videoPlayerUrl = 'https://www.youtube.com/embed/'. $videoId .'?autoplay=1';
											if ($checkUrl == 'youtube') :
											$videoPlayerUrl = 'https://www.youtube.com/embed/'. $videoId .'?autoplay=1';
									?>
                                                    <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    					<a href="#" class="wp-video-popup"><button class="button expanded white hollow video-modal-button" videourl="<?php echo $videoPlayerUrl; ?>">Watch Interview</button></a>
                                                    </div>
                                    			</div>
              								<?php endif;?>
              								<?php 
              								  $videoUrl = $this_executive['video'];
              								 $checkUrl = getVideoUrl($videoUrl);
                                              if ($checkUrl=='vidyard'):
                                              $videoUrl = $this_executive['video'];
                                              ?>
                                                  <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    				  <a href="#"><button style="width: 100%; margin: auto; display: block;" class="button expanded white hollow video-modal-button vidyard-player-embed" data-uuid='<?php echo $videoUrl; ?>' data-v="4"
                              data-type="lightbox" src=""/>Watch Interview</button></a>
                                                       </div>
                                    			   </div>
											<?php endif;?>
							<!--<button id="videoModalButton" class="button expanded white hollow video-modal-button" data-open="videoModal" data-key="<?php //echo clean($this_executive['member_name']); ?>">Watch Interview</button>-->
									<?php endif; ?>
										</div>
									
									
									
									</div>
								<?php endforeach; ?>
							</ul>
							<?php
									
						foreach ($executive_staff as $executive => $this_executive):
						$memberId = $this_executive['member_image']['ID'];
						$videoUrl = $this_executive['video'];
						?>
					<div id="myModal<?php echo $memberId;?>"
					class="modal fade popout-about-card">
					<div class="modal-dialog modal-lg aboutInfoModal">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
								<h4 class="modal-title"><?php echo $this_executive['member_name'];?></h4>
							</div>
							
							<div class="modal-body customModalBody">
							<h6>Member Quote</h6>
							<p><?php echo $this_executive['member_quote']; ?></p>
							
							<h6>Member Description</h6>
							<p><?php echo $this_executive['member_description']; ?></p>
							</div>							
							
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<div id="videopopModal<?php echo $memberId;?>"
					class="modal fade popout-about-card">
					<div class="modal-dialog modal-lg aboutInfoModal">
							<button class="close" type="button" data-dismiss="modal">
									<i class="fa fa-times" aria-hidden="true"></i>
						    </button>
						    <video controls autoplay>
                                          <source src="<?php echo $videoUrl;?>" type="video/mp4">
                                          Your browser does not support HTML5 video.
                            </video>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<?php endforeach;?>
						</div>
	
						<div class="accordion-image-grid-container directors-team margin-top-50">
							<h1 class="dark-blue"><?php echo $data_description['camp_tile']; ?></h1>
							<p class="dark-blue margin-bottom-30"><?php echo $data_description['camp_description']; ?></p>
							<ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
								<?php foreach ($kamp_types as $key => $value):?>
									<li class="accordion-item" data-accordion-item>
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
											<?php foreach ($kamps as $kamp_key => $kamp): 
											?>
												<?php if ($kamp['kamp_type']->post_title === $value['title']) : ?>
													<div class="list-grid-section-container">
														<div class="flex-container align-center list-grid-section-sub-header-container">
															<h4 class="margin-bottom-0 margin-top-15 kamp-<?php echo $value['icon_name']; ?>"><?php echo $kamp['kamp_title']; ?></h4>
															<div class="kamp-<?php echo $value['icon_name']; ?> list-grid-section-sub-header"></div>
														</div>
														<?php if (reset($kamp['directors'])): ?>
															<ul class="list-grid-container team-grid">
																<?php
																	$i = 0;
																	foreach ((reset($kamp['directors'])) as $director_key => $director):
																		if ($i === 4)
																			$i = 0;
																		$i++;
																		
																		
																?>
																
																	<?php
																		$director_id = array($director->ID);
																		$this_director_array = get_staff($director_id);
																		$this_director = reset($this_director_array);
																		$dirId = $this_director['member_image']['id'];
																		$videoUrl = $this_director['video'];
																	?>
																				<div id="mydirModal<?php echo $dirId;?>"
					class="modal fade popout-about-card">
					<div class="modal-dialog modal-lg aboutInfoModal">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" data-dismiss="modal">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
								<h4 class="modal-title"><?php echo $this_director['member_name'];?></h4>
							</div>
							<div class="modal-body customModalBody">
							<h6>Member Quote</h6>
							<p><?php echo $this_director['member_quote']; ?></p>
							<h6>Member Description</h6>
							<p><?php echo $this_director['member_description']; ?><p>
							</div>
							
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
					<div id="videopopModaldir<?php echo $dirId;?>"
					class="modal fade popout-about-card">
					<div class="modal-dialog modal-lg aboutInfoModal">
							<button class="close" type="button" data-dismiss="modal">
									<i class="fa fa-times" aria-hidden="true"></i>
						    </button>
						    <video controls autoplay>
                                          <source src="<?php echo $videoUrl;?>" type="video/mp4">
                                          Your browser does not support HTML5 video.
                            </video>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
																	<div class="staff-grid-item invisible list-grid-item block-<?php echo $i; ?>">
																		<img src="<?php echo $this_director['member_image']['url']; ?>">
																		<div class="list-grid-item-overlay">
																			<p class="list-grid-item-member-title uppercase white text-center"><?php echo $this_director['member_titles']; ?></p>
																			<h6 class="list-grid-item-member-name secondary bold white text-center titlecase"><?php echo $this_director['member_name']; ?></h6>
																			<a class="button expanded" href="mailto:<?php echo $this_director['member_email']; ?>">Contact</a>
																			<?php if($this_director['member_quote']):?>
                                                                            				<button class="button expanded white hollow"><a href="#mydirModal<?php echo $dirId;?>"
                                                                            				              	data-toggle="modal" class="white">Staff Bio</a></button>
																			<?php endif;?>
																			<?php if($this_director['video']): 
																			$videoUrl = $this_director['video'];
                                        											$checkUrl = getVideoUrl($videoUrl);
                                        											$videoId = end(explode('/',$videoUrl));
                                        											if ($checkUrl == 'vimeo') :
                                        											 $videoPlayerUrl = 'https://player.vimeo.com/video/'. $videoId .'?autoplay=1';
									                                           ?>
									                        
                                                    <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    					<a href="#" class="wp-video-popup"><button class="button expanded white hollow video-modal-button" videourl="<?php echo $videoPlayerUrl; ?>">Watch Interview</button></a>
                                                    </div>
                                    			</div>
              								<?php endif;?>
              								<?php endif;?>
              								<?php if($this_director['video']): 
																			$videoUrl = $this_director['video'];
                                        											$checkUrl = getVideoUrl($videoUrl);
                                        											if ($checkUrl == 'mp4') :
                                        		                               ?>
									            <button class="button expanded white hollow"><a href="#videopopModaldir<?php echo $dirId;?>"
              								data-toggle="modal" class="white">Watch Interview</a></button>
                                    			
              								<?php endif;?>
              								<?php endif;?>
              								<?php if($this_director['video']): 
																			$videoUrl = $this_director['video'];
                                        											$checkUrl = getVideoUrl($videoUrl);
                                        											$videoId = explode('=',$videoId)[1];
                                        											$videoPlayerUrl = 'https://www.youtube.com/embed/'. $videoId .'?autoplay=1';
                                        											if ($checkUrl == 'youtube') :
                                        											 $videoPlayerUrl = 'https://player.vimeo.com/video/'. $videoId .'?autoplay=1';
									                                           ?>
									                <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    					<a href="#" class="wp-video-popup"><button class="button expanded white hollow video-modal-button" videourl="<?php echo $videoPlayerUrl; ?>">Watch Interview</button></a>
                                                    </div>
                                    			</div>
              								<?php endif;?>
              								<?php endif;?>
              								<?php 
              								 $videoUrl = $this_director['video'];
              								 $checkUrl = getVideoUrl($videoUrl);
                                              if ($checkUrl=='vidyard'):
                                              $videoUrl = $this_director['video'];
                                              ?>
                                                  <div class="video-modal">
                                    				<div class="modal-embed-container video-center">
                                    				  <a href="#"><button style="width: 100%; margin: auto; display: block;" class="button expanded white hollow video-modal-button vidyard-player-embed" data-uuid='<?php echo $videoUrl; ?>' data-v="4"
                              data-type="lightbox" src=""/>Watch Interview</button></a>
                                                       </div>
                                    			   </div>
											<?php endif;?>
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

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					$post = get_post();

					if ( has_blocks( $post->post_content ) ) {
						$blocks = gutenberg_parse_blocks( $post->post_content );

						foreach ($blocks as $block) {
							if ($block['blockName'] !== 'acf/hero') {
								echo gutenberg_render_block($block);
							}
						}
					}
					?>

					<?php endwhile; endif; ?>

					</div>
					<div class="wp-video-popup-wrapper">
					<div class="wp-video-popup-close"></div>
					<iframe class="wp-video-popup-video" src="" data-wp-video-popup-url="'. $video_url .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>
					</div>
					
					<div class="reveal video-modal" id="videoModal" data-reveal data-reset-on-close="true">
						<button class="close-button" data-close aria-label="Close modal" type="button" id="video-modal-close-button">
							<span aria-hidden="true">Close</span>
						</button>
						<div class="margin-right-45 margin-left-45 margin-bottom-15 video-text flex-container justify-flex-start align-flex-start">
							<!-- <i class="icon icon-quote-copy large light-gray margin-right-10"></i> -->
							<!--<p class="small-sub-text" id="video-quote"></p>-->
						</div>
						<div class="custom-video-container modal-embed-container video-center">
								<video controls id="custom-video" class="basic-video custom-video" poster=''>
										<source id="video-source" src='https://kanakuk-dev.s3.amazonaws.com/uploads/Kanakuk-Overnight-Reel-for-Broadcast-1.mp4' type="video/mp4">
										<p>Your browser doesn't support HTML5 video. Here is</p>
										<a id='video-anchor' href='https://kanakuk-dev.s3.amazonaws.com/uploads/Kanakuk-Overnight-Reel-for-Broadcast-1.mp4'>link to the video</a> instead.</p>
								</video>
								<div id="custom-video-controls" class="controls custom-video-controls" data-state="hidden">
										<button id="playpause" type="button" data-state="play"></button>
								</div>
						</div>						
					</div>


			</main> <!-- end #main -->


			<script>
					var executive_staff = <?php echo json_encode($executive_staff); ?>;
					// A $( document ).ready() block.
					
				
			</script>

		    <?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>