<?php /* Template Name: My Kanakuk */?>
<?php
/**
 * The template for displaying My Kanakuk
 *
 */

get_header();

console_log('kan_get_family_info',kan_get_family_info());

console_log('kan_get_transportation_options', kan_get_transportation_options());

$transportation_options = kan_get_transportation_options();

?>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 medium-12 large-12 cell padding-top-header gray-bg" role="main">
					<div class="my-kan-container" id="my-kan-container" v-cloak>
						<div class="blue-bg">
							<div class="my-kan-header grid-container grid-x padding-top-70">
								<div class="my-kan-header my-kan-user-info medium-4 padding-right-20">
									<div class="avatar avatar-rectangle" style="background-image: url(https://kanakuk-dev.s3.amazonaws.com/uploads/Rebecca-Duncan.jpg)"></div>
									<h6 class="white secondary titlecase margin-top-10 margin-bottom-0">Mary Greene</h6>
									<p class="white small-text pointer">Edit Profile</p>
									<a href="/" class="tiny button">New Registration</a>
								</div>
							</div>
						</div>
						<div class="grid-container grid-x my-kan-content-container">
							<div class="medium-4 my-kan-left-container padding-right-20" id="my-kan-left-container" ref="myKanLeftContainer">
								<div class="my-kan-sidebar-container margin-top-30">
									<div class="card account-balance-card flex-column align-center padding-top-20 padding-bottom-20 margin-bottom-30" ref="accountBalanceCard">
										<p class="uppercase dark-gray small-text bold">Account Balance</p>
										<h4 class="bold dark-blue margin-bottom-0">$1,675.00</h4>
										<p class="margin-bottom-5">
											<span class="dark-blue bold">Due</span>
											<span class="red bold">Jul 27, 2018</span>
										</p>
										<a href="#" class="button tiny margin-bottom-5">Pay Now</a>
										<a class="primary small-text margin-bottom-0">View All</a>
									</div>

									<div class="my-kan-calendar-select-container margin-bottom-10 padding-right-20" ref="myKanCalendarSelectContainer">
										<div class="flex-container align-center justify-space-between">
											<p class="uppercase dark-gray small-text bold margin-bottom-0">Calendar</p>
											<div class="search-filter-option-container">
												<ul class="dropdown menu" data-dropdown-menu data-disable-hover="true" data-click-open="true" data-close-on-click="true" data-v-offset="5" data-position="bottom" data-alignment="center">
													<li class="full-width">
														<a class="flex-container justify-space-between search-filter-text dark-blue bold" href="#">{{ calendar_kamper }}</a>
														<ul class="menu">
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('All Kampers')">
																	<a href="#">All Kampers</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('Cindy')">
																	<a href="#">Cindy</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('Ashley')">
																	<a href="#">Ashley</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('Gemini')">
																	<a href="#">Gemini</a>
																</li>
														</ul>
													</li>
												</ul>
											</div>
											<div class="search-filter-option-container">
												<ul class="dropdown menu" data-dropdown-menu data-disable-hover="true" data-click-open="true" data-close-on-click="true" data-v-offset="5" data-position="bottom" data-alignment="center">
													<li class="full-width">
														<a class="flex-container justify-space-between search-filter-text dark-blue bold" href="#">{{ calendar_length }}</a>
														<ul class="menu">
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarLength('3 Days')">
																	<a href="#">3 Days</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('10 Days')">
																	<a href="#">10 Days</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('1 Month')">
																	<a href="#">1 Month</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('3 Months')">
																	<a href="#">3 Months</a>
																</li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="my-kan-calendar-container padding-right-10" id="my-kan-calendar-container">
										<div class="flex-container align-center justify-flex-start margin-bottom-10">
											<h6 class="dark-blue margin-bottom-0 margin-right-10 secondary bold">{{ moment(today).format('DD') }}</h6>
											<p class="medium-text bold dark-blue margin-bottom-0 margin-right-10">{{ moment(today).format('MMM YYYY') }}</p>
											<p class="medium-text bold green margin-bottom-0">Today</p>
										</div>
										<div class="card my-kan-task-card flex-container align-flex-start justify-space-between margin-bottom-10">
											<div>
												<p class="uppercase dark-gray small-text bold margin-bottom-10">Billing</p>
												<p class="dark-blue bold small-text margin-bottom-5">Balance Due - $500 Deposit</p>
												<p class="dark-blue small-text">Ashley - K2 Term 1</p>
											</div>
											<i class="icon icon-caret-large-right primary medium"></i>
										</div>
										<div class="card my-kan-task-card flex-container align-flex-start justify-space-between margin-bottom-10">
											<div>
												<p class="uppercase dark-gray small-text bold margin-bottom-10">Forms</p>
												<p class="dark-blue bold small-text margin-bottom-5">Health Form Due</p>
												<p class="dark-blue small-text">Cindy - K1 Term 2</p>
											</div>
											<i class="icon icon-caret-large-right primary medium"></i>
										</div>
										<div class="card my-kan-task-card flex-container align-flex-start justify-space-between margin-bottom-10">
											<div>
												<p class="uppercase dark-gray small-text bold margin-bottom-10">Forms</p>
												<p class="dark-blue bold small-text margin-bottom-5">Transportation Option Due</p>
												<p class="dark-blue small-text">Mary, John, Cindy - K-Kauai Family Kamp</p>
											</div>
											<i class="icon icon-caret-large-right primary medium"></i>
										</div>
									</div>

								</div>
							</div>


							<div class="medium-8 my-kan-right-container padding-left-30">
								<div class="my-kan-tabs-container" ref="tabContainer">
									<ul class="tabs secondary margin-left-25" id="my-kanakuk-tabs">
										<li class="tabs-title is-active">
											<a href="#child-1">
												Cindy
											</a>
										</li>
										<li class="tabs-title">
											<a href="#child-2">
												Ashley
											</a>
										</li>
										<li class="tabs-title">
											<a href="#child-13">
												Gemini
											</a>
										</li>
										<li class="tabs-title"><a href="/" class="primary">+ New Kamper</a></li>
									</ul>

									<div class="tabs-content" data-tabs-content="my-kanakuk-tabs">
										<div class="tabs-panel my-kan-tabs-content-container is-active" id="child-1">

											<div class="flex-container align-center full-width">
												<div class="card flat outline my-kan-info-card fixed-height flex-3 margin-right-20">
													<p class="uppercase dark-gray small-text bold">
														<span>Kamper Profile</span>
														<a href="#" class="primary margin-left-15 titlecase">Edit</a>
													</p>
													<div class="flex-container align-center full-width justify-flex-start">
														<div class="avatar medium" style="background-image: url(https://kanakuk-dev.s3.amazonaws.com/uploads/why-kanakuk-2.png)"></div>
														<div class="margin-left-20">
															<p class="bold dark-blue small-text margin-bottom-5">Cindy Greene</p>
															<p class="dark-blue small-text margin-bottom-5">Child, Age 9</p>
															<p class="dark-blue small-text margin-bottom-5">2 Registrations</p>
														</div>
													</div>
												</div>
												<div class="card flat outline my-kan-info-card fixed-height flex-5">
													<p class="uppercase dark-gray small-text bold">
														<span>Store Credit</span>
														<a href="#" class="primary margin-left-15 titlecase">View All</a>
													</p>
													<div class="flex-container flex-row align-center full-width justify-space-between">
														<div class="flex-container flex-column align-center justify-flex-start flex-2">
															<p class="tiny-text bold medium-gray margin-bottom-5">Current Balance</p>
															<h6 class="secondary bold dark-blue margin-bottom-15">$200.00</h6>
															<a href="#" class="primary margin-left-15 titlecase bold small-text">Add Credit</a>
														</div>
														<div class="flex-3">
															<div class="flex-container align-center justify-space-between full-width">
																<p class="small-text dark-blue">$50.00 Added</p>
																<p class="small-text dark-blue bold">{{ moment('7/1/2018').format("MMM DD, YYYY") }}</p>
															</div>
															<div class="flex-container align-center justify-space-between full-width">
																<p class="small-text dark-blue">$100.00 Added</p>
																<p class="small-text dark-blue bold">{{ moment('6/21/2018').format("MMM DD, YYYY") }}</p>
															</div>
															<div class="flex-container align-center justify-space-between full-width">
																<p class="small-text dark-blue">$25.00 Added</p>
																<p class="small-text dark-blue bold">{{ moment('6/20/2018').format("MMM DD, YYYY") }}</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="flex-container align-center full-width">
												<div class="card flat outline my-kan-info-card fixed-height flex-3 margin-right-20">
													<p class="uppercase dark-gray small-text bold">
														<span>Health Form</span>
														<a href="#" class="primary margin-left-15 titlecase">Edit</a>
													</p>
													<div class="flex-container flex-column align-center full-width">
														<p class="tiny-text bold medium-gray margin-bottom-5">Completion</p>
														<h6 class="secondary bold dark-blue margin-bottom-15">100%</h6>
														<p class="dark-blue bold small-text">
															<span>Updated on </span>
															<span class="green">{{ moment('7/3/2018').format("MMM DD, YYYY") }}</span>
														</p>
													</div>
												</div>
												<div class="card flat outline my-kan-info-card fixed-height flex-5">
													<p class="uppercase dark-gray small-text bold">
														<span>Emergency Contacts</span>
														<a href="#" class="primary margin-left-15 titlecase">Edit</a>
													</p>
													<div class="flex-container align-center full-width">
														<div class="flex-container flex-column align-center justify-flex-start flex-1">
															<p class="tiny-text bold medium-gray margin-bottom-5">Primary Contact</p>
															<h6 class="secondary bold dark-blue titlecase">Mary Greene</h6>
															<a class="dark-blue small-text" href="tel:404-221-1982">(404) 221-1982</a>
														</div>
														<div class="flex-container flex-column align-center justify-flex-start flex-1">
															<p class="tiny-text bold medium-gray margin-bottom-5">Secondary Contact</p>
															<h6 class="secondary bold dark-blue titlecase">John Greene</h6>
															<a class="dark-blue small-text" href="tel:404-109-0012">(404) 109-0012</a>
														</div>
													</div>
													
												</div>
											</div>
											<div class="card flat outline my-kan-info-card full-width padding-left-0 padding-right-0 padding-top-0 padding-bottom-0">
												<p class="uppercase dark-gray small-text bold my-kan-card-padding margin-bottom-0">
													<span>Registrations</span>
													<a href="#" class="primary margin-left-15 titlecase">View All</a>
												</p>
												<div class="my-kan-registration-heading grid-x align-center">
													<p class="white italic bold small-text medium-2">Pending</p>
													<p class="white small-text bold medium-2 kamp-title">
														<span>K-1</span>
														<i class="white icon icon-overnight medium"></i>
													</p>
													<p class="white small-text bold medium-4">{{ moment('7/6/2018').format("MMM DD") }} - {{ moment('7/11/2018').format("MMM DD, YYYY") }}</p>
													<div class="medium-4 text-right">
														<a href="#" class="button hollow white small">Continue Registration</a>
													</div>
												</div>

												<div class="grid-x full-width my-kan-card-padding">
													<div class="flex-container flex-column align-center justify-flex-start medium-4">
														<p class="dark-blue bold small-text">
															<span>Roommate Request</span>
															<a href="#" class="primary margin-left-10">Edit</a>
														</p>
														<p class="dark-blue small-text margin-bottom-5">1 Received</p>
														<p class="dark-blue small-text">2 Requested</p>
													</div>
													<div class="flex-container flex-column align-center justify-flex-start medium-4">
														<p class="dark-blue bold small-text">
															<span>Transportation</span>
															<a href="#" class="primary margin-left-10">Edit</a>
														</p>
														<?php foreach ($transportation_options as $key => $item): ?>
															<p class="dark-blue small-text margin-bottom-5 text-center">
																<span>
																	<?php echo $item['TransportationType']; ?>
																	<?php echo $item['TransportationDirection']; ?>
																	-
																	<?php echo $item['FromCity']; ?>
																</span>
																<br />
																<span class="<?php echo $item['Status'] == 'On Hold' ? 'red' : 'green'; ?> bold"><?php echo $item['Status']; ?></span>
																<a class="primary bold margin-left-10" data-open="transportation-<?php echo $key; ?>">View Details</a>
															</p>
														<?php endforeach; ?>
													</div>
													<div class="flex-container flex-column align-center justify-flex-start medium-4">
														<p class="dark-blue bold small-text">
															<span>Packing List</span>
															<a href="#" class="primary margin-left-10">View</a>
														</p>
														<p class="small-text margin-bottom-5 bold">
															<span class="medium-gray">Activity Schedule</span>
															<a href="#" class="primary margin-left-10 disabled">View</a>
														</p>
													</div>
												</div>


												<div class="my-kan-registration-heading grid-x">
													<p class="white italic bold small-text medium-2">Confirmed</p>
													<p class="white small-text bold medium-2 kamp-title">
														<span>K-Kauai</span>
														<i class="white icon icon-family medium"></i>
													</p>
													<p class="white small-text bold medium-4">{{ moment('8/4/2018').format("MMM DD") }} - {{ moment('8/9/2018').format("MMM DD, YYYY") }}</p>
													<div class="medium-4 text-right">
														<a href="#" class="button hollow white small">Continue Registration</a>
													</div>
												</div>
												<div class="grid-x full-width my-kan-card-padding">
													<div class="flex-container flex-column align-center justify-flex-start medium-4">
														<p class="dark-blue bold small-text">
															<span>Packing List</span>
															<a href="#" class="primary margin-left-10">View</a>
														</p>
														<p class="small-text margin-bottom-5 bold">
															<span class="medium-gray">Activity Schedule</span>
															<a href="#" class="primary margin-left-10 disabled">View</a>
														</p>
													</div>
												</div>
											</div>

										</div>
										
										<div class="tabs-panel my-kan-tabs-content-container" id="child-2">
											<p>CHILD 2 tab</p>
                    </div>
										<div class="tabs-panel my-kan-tabs-content-container" id="child-3">
											<p>CHILD 3 tab</p>
                    </div>
									</div>
								</div>
							</div>
						</div>
					
					</div>

            <?php if (have_posts()): while (have_posts()): the_post();?>

		            <?php
                        $post = get_post();

                        if (has_blocks($post->post_content)) {
                            $blocks = gutenberg_parse_blocks($post->post_content);

                            foreach ($blocks as $block) {
                                echo gutenberg_render_block($block);
                            }
                        }
                    ?>

				<?php endwhile;endif;?>


        </main> <!-- end #main -->

        <script type="text/javascript">
        </script>

        
        <?php get_sidebar();?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php foreach ($get_transportation_options as $key => $item): ?>
	<div class="reveal small transportation-details-modal" id="transportation-<?php echo $key; ?>" data-reveal>
		<h5 class="dark-blue">
			<?php echo $item['TransportationDescription']; ?>
		</h5>
		<p class="bold">
			<?php echo date( 'F j, Y', strtotime($item['TransportationDate'])); ?>
			<br />
			<span class="<?php echo $item['Status'] == 'On Hold' ? 'red' : 'green'; ?>">
				<?php echo $item['Status']; ?>
			</span>
		</p>
		<ul class="margin-bottom-15">
			<li class="margin-bottom-5">
				<span class="dark-blue bold margin-right-10">Name</span>
				<?php echo $item['FirstName']; ?>
				<?php echo $item['LastName']; ?>
			</li>
			<li class="margin-bottom-5">
				<span class="dark-blue bold margin-right-10">Place</span>
				<br />
				<?php echo $item['FromPlace']; ?> (<?php echo $item['TransportationLocationCode']; ?>)
				<br />
				<?php echo $item['FromAddress']; ?>
				<br />
				<?php echo $item['FromCity']; ?>,
				<?php echo $item['FromState']; ?>
				<?php echo $item['FromZip']; ?>
			</li>
			<li class="margin-bottom-5">
				<span class="dark-blue bold margin-right-10">Fee</span>
				<?php echo '$' . $item['Fee']; ?>
			</li>
			<li class="margin-bottom-5">
				<span class="dark-blue bold margin-right-10">Notes</span>
				<?php echo $item['LoadDetails']; ?>
			</li>
		</ul>
		<p class="tiny-text">
			Last modified
			<?php echo date( 'F j, Y', strtotime($item['LastModifiedDate'])); ?>
		</p>
		<button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endforeach; ?>

<?php get_footer();?>