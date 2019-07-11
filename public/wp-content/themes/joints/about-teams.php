<?php /* Template Name: About >> Teams */ ?>
<?php
/**
 * The template for displaying an about page
 */
$about_pages = array('Our Story', 'Teams', 'Our Ministries', 'All Activities', 'Ceremonies', 'FAQs');
$kamp_types = get_kamp_types();
$kamps = get_kamps();
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
								<h1 class="dark-blue">Executive Team</h1>
								<a class="button" href="/contact-us">Contact Us</a>
							</div>
							<p class="dark-blue margin-bottom-30">Kanakuk’s Executive Team serve alongside each other to carry out our mission of “Equipping Next
Generation Leaders” through our seven summer camp experiences, local outreach ministries, and
international relief ministries. Kamp Director Copy: Our Kamp leadership teams are responsible for the 26,000+ Kampers we welcome to our Kamps each
summer and the daily management of over 2,000 collegiate staff members who carry out daily
operations at our Kamps..</p>
							<ul class="list-grid-container">
								<?php
									$i = 0;
									foreach ($executive_staff as $executive => $this_executive):
										if ($i === 4)
											$i = 0;
										$i++;
								?>
									<div class="staff-grid-item invisible list-grid-item block-<?php echo $i; ?>">
										<img src="<?php echo $this_executive['member_image']['url']; ?>">
										<div class="list-grid-item-overlay">
											<p class="list-grid-item-member-title uppercase white text-center"><?php echo $this_executive['member_titles']; ?></p>
											<h6 class="list-grid-item-member-name secondary bold white text-center titlecase"><?php echo $this_executive['member_name']; ?></h6>
											<a class="button expanded" href="mailto:<?php echo $this_executive['member_email']; ?>">Contact</a>
											<?php if(isSet($this_executive['video'])): ?>
												<button id="videoModalButton" class="button expanded white hollow video-modal-button" data-open="videoModal" data-key="<?php echo clean($this_executive['member_name']); ?>">Watch Interview</button>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
							</ul>
						</div>

						<div class="accordion-image-grid-container directors-team margin-top-50">
							<h1 class="dark-blue">Camp Directors</h1>
							<p class="dark-blue margin-bottom-30">One of the surprising things about Kanakuk is the large number of full-time staff, more than 100, and the more than 1800 incredible summer staff! These numbers represent hundreds of years of Christian summer camp experience and dedication. You can get to know our Executive Team and Camp Directors or contact them below.</p>
							<ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
								<?php foreach ($kamp_types as $key => $value):?>
									<li class="accordion-item is-active" data-accordion-item>
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
																	?>
																	<div class="staff-grid-item invisible list-grid-item block-<?php echo $i; ?>">
																		<img src="<?php echo $this_director['member_image']['url']; ?>">
																		<div class="list-grid-item-overlay">
																			<p class="list-grid-item-member-title uppercase white text-center"><?php echo $this_director['member_titles']; ?></p>
																			<h6 class="list-grid-item-member-name secondary bold white text-center titlecase"><?php echo $this_director['member_name']; ?></h6>
																			<a class="button expanded" href="mailto:<?php echo $this_director['member_email']; ?>">Contact</a>
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

					<div class="reveal video-modal" id="videoModal" data-reveal data-reset-on-close="true">
						<button class="close-button" data-close aria-label="Close modal" type="button" id="video-modal-close-button">
							<span aria-hidden="true">Close</span>
						</button>
						<div class="custom-video-container modal-embed-container video-center">
								<video controls id="custom-video" class="basic-video custom-video" poster=''>
										<source id="video-source" src='https://kanakuk-dev.s3.amazonaws.com/uploads/Kanakuk-Overnight-Reel-for-Broadcast-1.mp4' type="video/mp4">
										<p>Your browser doesn't support HTML5 video. Here is
										a <a id='video-anchor' href='https://kanakuk-dev.s3.amazonaws.com/uploads/Kanakuk-Overnight-Reel-for-Broadcast-1.mp4'>link to the video</a> instead.</p>
								</video>
								<div id="custom-video-controls" class="controls custom-video-controls" data-state="hidden">
										<button id="playpause" type="button" data-state="play"></button>
								</div>
						</div>

						<div class="margin-right-45 margin-left-45 margin-top-45 flex-container justify-flex-start align-flex-start">
							<i class="icon icon-quote-copy large light-gray margin-right-10"></i>
							<p class="large-sub-text italic" id="video-quote"></p>
						</div>
					</div>


			</main> <!-- end #main -->


			<script>
					var executive_staff = <?php echo json_encode($executive_staff); ?>;
			</script>

		    <?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>