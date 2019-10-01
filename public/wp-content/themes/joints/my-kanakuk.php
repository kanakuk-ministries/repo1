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
$family_infomartion = kan_get_family_info();
//echo "<pre>family"; print_r($family_infomartion);
$registration_count = kan_get_registration_count();
$child_first = $family_infomartion['Results'][0];
?>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 medium-12 large-12 cell padding-top-header gray-bg" role="main">
					<div class="my-kan-container" id="my-kan-container" v-cloak>
						<div class="blue-bg">
							<div class="my-kan-header grid-container grid-x padding-top-70">
								<div class="my-kan-header my-kan-user-info medium-4">
									<div class="avatar avatar-rectangle with-border" id="userImage" style="background-image: url(<?php echo $child_first['ChildPhotoURL']; ?>)"></div>
									<h6 class="white secondary titlecase margin-top-10 margin-bottom-0" id="userName"><?php echo $child_first['ChildFirstName'].' '.$child_first['ChildLastName']; ?></h6>
									<a href="https://staging-events.kanakuk.com/link/?a=profile" class="white small-text pointer edit_profile">Edit Profile</a>
									<a href="https://staging-events.kanakuk.com/link/?a=new_reg" class="tiny button">New Registration</a>
								</div>
							</div>
						</div>
						<div class="grid-container grid-x my-kan-content-container">
							<div class="medium-4 my-kan-left-container" id="my-kan-left-container" ref="myKanLeftContainer">
								<div class="my-kan-sidebar-container margin-top-30">
									<div class="card account-balance-card flex-column align-center padding-top-20 padding-bottom-20 margin-bottom-30" ref="accountBalanceCard">
										<p class="uppercase dark-gray small-text bold">Account Balance</p>
										<h4 class="bold dark-blue margin-bottom-0">$<?php echo $child_first['FamilyAccountBalance']; ?></h4>
										<p class="margin-bottom-5">
											<span class="dark-blue bold">Due</span>
											<span class="red bold">Jul 27, 2018</span>
										</p>
										<a href="https://staging-events.kanakuk.com/link/?a=paynow&id=<?php echo $child_first['FamilyEntityID']; ?>" class="button tiny margin-bottom-5">Pay Now</a>
										<a class="primary small-text margin-bottom-0">View All</a>
									</div>

									<div class="my-kan-calendar-select-container margin-bottom-10" ref="myKanCalendarSelectContainer">
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
																							<?php 
										$i=1;
										foreach($family_infomartion['Results'] as $child_information):
										
										$child_enitiy = $child_information['ChildEntityID'];
										$registration_info = kan_get_registration_info($child_enitiy);
										     
										?>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarKamper('<?php echo $child_information['ChildFirstName'];?>')">
																	<a href="#"><?php echo $child_information['ChildFirstName'];?></a>
																</li>
																<?php endforeach;?>
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
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarLength('10 Days')">
																	<a href="#">10 Days</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarLength('1 Month')">
																	<a href="#">1 Month</a>
																</li>
																<li class="kamp-type-dropdown-option-item" v-on:click="selectCalendarLength('3 Months')">
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
										
										<?php 
										$i=1;
										foreach($family_infomartion['Results'] as $child_information):
										$class = $i == 1 ?'is-active' : '';	
										?>
										<li class="tabs-title <?=$class?>" data-image="<?php echo $child_information['ChildPhotoURL']; ?>" data-name="<?php echo $child_information['ChildFirstName'].' '.$child_information['ChildLastName'];?>">
											<a href="#child-<?php echo $i;?>"  data-link='0'>
												<?php echo $child_information['ChildFirstName']; ?>
											</a>
										</li>
										<?php
										$i++; 
										endforeach;
										?>
										<?php $family_reg = $family_infomartion['Results'][0]['HasFamilyKampReg']; 
										if($family_reg=='Yes'):
										
										?>
										<li class="tabs-title"   data-link='0'>
											<a href="https://staging-events.kanakuk.com/Manage/Family/">
												Family
											</a>
										</li>
										<?php endif;?>
										<li class="tabs-title"><a href="https://staging-events.kanakuk.com/Manage/Family/" class="primary" data-link='1'>+ New Kamper</a></li>
									</ul>
									<div class="tabs-content" data-tabs-content="my-kanakuk-tabs">
									<?php 
										$i=1;
										foreach($family_infomartion['Results'] as $child_information):
										
										$registration_info = kan_get_registration_info($child_information['ChildEntityID']);
										
										$class = $i == 1 ?'is-active' : '';		
										$reg_information = $registration_info['Results'][0];
										?>
										<div class="tabs-panel my-kan-tabs-content-container <?=$class?>" id="child-<?php echo $i;?>">

											
											<div class="card flat outline my-kan-info-card full-width padding-left-0 padding-right-0 padding-top-0 padding-bottom-0">
												<p class="uppercase dark-gray small-text bold my-kan-card-padding margin-bottom-0">
													<span>Registrations</span>
													<a class="primary bold margin-left-10 small-text" data-open="registration-<?php echo $i; ?>">View Details</a>
												</p>
												<div class="my-kan-registration-heading grid-x align-center">
													<p class="white italic bold small-text medium-2">Pending</p>
													<p class="white small-text bold medium-2 kamp-title">
														<span><?php echo $reg_information['Location'];?></span>
														<i class="white icon icon-overnight medium"></i>
													</p>
													<p class="white small-text bold medium-4">{{ moment('<?php echo $reg_information['BeginDate'];?>').format("MMM DD") }} - {{ moment('<?php echo $reg_information['EndDate'];?>').format("MMM DD, YYYY") }}</p>
													<div class="medium-4 text-right">
														<a href="https://staging-events.kanakuk.com/link/?a=continue_reg" class="button hollow white small">Continue Registration</a>
													</div>
												</div>

												<div class="grid-x full-width my-kan-card-padding">
												
												
												<table class="table">
													<tbody>
    													<tr>
    														<td>
    														<p class="dark-blue bold small-text">
    															<span>Roommate Request</span>															
    														</p>
    														</td>
    														<td>
    															<?php if (empty($reg_information['Roommates'])):?>
        															<p class="dark-blue bold small-text margin-bottom-5">No Roomates Available</p>
        														<?php else:?>
        															<p class="dark-blue bold small-text margin-bottom-5">1 Received</p>
        															<p class="dark-blue bold small-text">2 Requested</p>
        														<?php endif;?>
    														</td>
    														<td>
    															<?php if (!empty($reg_information['Roommates'])):?>
    																<a href="#" class="primary bold small-text">Edit</a>
    															<?php endif; ?>
    														</td>
    														<td>
    															<?php if (!empty($reg_information['Roommates'])):?>
    																<a href="#" class="primary bold small-text">View Details</a>
																<?php endif; ?>
    														</td>
    													</tr>
    													<tr>
    														<td>
        														<p class="dark-blue bold small-text">
        															<span>Packing List</span>															
        														</p>
    														</td>
    														<td></td>
    														<td></td>
    														<td>
																<a class="primary bold margin-left-10 small-text" data-open="packinglist-<?php echo $i;?>">View Details</a>
    														</td>
    													</tr>
    													<tr>
    														<td>
        														<p class="dark-blue bold small-text">
        															<span>Parties</span>															
        														</p>
    														</td>
    														<td></td>
    														<td></td>
    														<td>
																<a href="http://kanakukparties.com/" class="primary bold margin-left-10 small-text">View Details</a>
    														</td>
    													</tr>
    													<tr>
    														<td>
        														<p class="dark-blue bold small-text">
        															<span>Store Credit</span>															
        														</p>
    														</td>
    														<td>
    															<p class="dark-blue bold small-text margin-bottom-5"><?php echo $reg_information['StoreCardBalance'];?></p>
    															<p class="dark-blue bold small-text margin-bottom-5">(Current Balance)</p>
    														</td>
    														<td>
    															<a class="primary bold margin-left-10 small-text" href="https://staging-events.kanakuk.com/link/?a=reg&id=<?php echo $reg_information['RegistrationID'];?>&s=store_card">Add Credit</a>
    														</td>
    														<td>
																<a class="primary bold margin-left-10 small-text" href="https://staging-events.kanakuk.com/link/?a=dashboard">View Details</a>
    														</td>
    													</tr>
    													<tr>
    														<td>
        														<p class="dark-blue bold small-text">
        															<span>Health Form</span>															
        														</p>
    														</td>
    														<td>
    															<?php if($reg_information['HealthFormComplete'] == 'No'): ?>
    															<p class="dark-blue bold small-text margin-bottom-5">Not Submitted</p>
    															<?php else: ?>
    															<p class="dark-blue bold small-text margin-bottom-5">Completed</p>
    															<p class="dark-blue bold small-text margin-bottom-5">({{ moment('7/3/2018').format("MMM DD, YYYY") }})</p>
    															<?php endif; ?>
    														</td>
    														<td>
    															<?php if($reg_information['HealthFormComplete'] == 'No'): ?>
    															<a class="primary bold margin-left-10 small-text" href="https://staging-events.kanakuk.com/link/?a=reg&id=<?php echo $reg_information['RegistrationID'];?>&s=medical">Submit</a>
    															<?php else: ?>
    															<a class="primary bold margin-left-10 small-text">Edit</a>
    															<?php endif; ?>
    														</td>
    														<td></td>
    													</tr>
    													<tr>
    														<td>
        														<p class="dark-blue bold small-text">
        															<span>Emergency Contacts</span>															
        														</p>
    														</td>
    														<td>
    															<p class="dark-blue bold small-text margin-bottom-5">
    															<?php echo $child_information['ParentName'];?>
    															<?php if(empty($reg_information['EmergencyContacts'])):?>
            														<p class="dark-blue small-text">No Contact Available</p>
            													<?php else:?>
        															<a class="dark-blue small-text" href="tel:<?php echo $reg_information['EmergencyContacts'];?>"><?php echo $reg_information['EmergencyContacts'];?></a>
        														<?php endif;?>
    															</p>
    														</td>
    														<td>
    															<a class="primary bold margin-left-10 small-text" href="https://staging-events.kanakuk.com/link/?a=dashboard">Edit</a>
    														</td>
    														<td></td>
    													</tr>
    													<?php 
														$transportation_options = kan_get_transportation_options($reg_information['RegistrationID']);
														foreach ($transportation_options['Results'] as $key => $item): 
														?>
    													<tr>
    														<td>
        														<p class="dark-blue bold small-text">
        															<span>Transportation</span>															
        														</p>
    														</td>
    														<td>
        														<p class="dark-blue bold small-text">
    																<span>
        															<?php echo $item['TransportationType']; ?>
    																<?php echo $item['TransportationDirection']; ?>
    																-
    																<?php echo $item['FromCity']; ?>
    																</span>
																</p>
    														</td>
    														<td>
																<a href="#" class="primary bold small-text">Edit</a>
    														</td>
    														<td>
																<a class="primary bold margin-left-10 small-text" data-open="transportation-<?php echo $key; ?>">View Details</a>
    														</td>
    													</tr>
    													<?php endforeach; ?>
													</tbody>
													
												</table>
												<div class="reveal small transportation-details-modal" id="registration-<?php echo $i; ?>" data-reveal>
                                                		<h5 class="dark-blue">
                                                			Registration Details
                                                		</h5>
                                                		<ul class="margin-bottom-15">
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Name</span>
                                                				<?php echo $reg_information['FirstName']; ?>
                                                				<?php echo $reg_information['LastName']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">AGE</span>
                                                				<?php echo $reg_information['Age']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Gender</span>
                                                				<?php echo $reg_information['Gender']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Location</span>
                                                				<?php echo $reg_information['Location']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Registation Balance</span>
                                                				
                                                				<?php echo $reg_information['RegistationBalance']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Health Form Status</span>
                                                				
                                                				<?php echo $reg_information['HealthFormComplete']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Emergency Contacts</span>
                                                				
                                                				<?php echo $reg_information['EmergencyContacts']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Legal Terms Complete Status</span>
                                                				
                                                				<?php echo $reg_information['LegalTermsComplete']; ?>
                                                			</li>
                                                			<li class="margin-bottom-5">
                                                				<span class="dark-blue bold margin-right-10">Store Card Balance</span>
                                                				
                                                				<?php echo $reg_information['StoreCardBalance']; ?>
                                                			</li>
                                                		</ul>
                                                		<button class="close-button" data-close aria-label="Close modal" type="button">
                                                			<span aria-hidden="true">&times;</span>
                                                		</button>
                                                	</div>
												
												
												
												<?php 
												$transportation_options = kan_get_transportation_options($reg_information['RegistrationID']);
												foreach ($transportation_options['Results'] as $key => $item): 
												?>
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
													</div>
													<div class="reveal small transportation-details-modal" id="packinglist-<?php echo $i;?>" data-reveal>
														<img src='<?php echo $reg_information['PackingListURL'];?>' class="img-responsive">
														<button class="close-button" data-close aria-label="Close modal" type="button">
                                                			<span aria-hidden="true">&times;</span>
                                                		</button>
													</div>
												</div>

											</div>
										<?php $i++; endforeach;?>

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
        $(document).on('click','#my-kanakuk-tabs li a',function(e){
        	if($(this).data('link')==0){
        		   e.preventDefault();
               	var idToMakeActive = $(this).attr('href');
               	$('#my-kanakuk-tabs li').removeClass('is-active');
               	$('.tabs-content div').removeClass('is-active');
               	var image = $(this).parent('li').data('image');
               	var name = $(this).parent('li').data('name');
               	$('#userName').html(name);
               	$('#userImage').css('background-image','url('+image+')');
               	$(this).parent('li').addClass('is-active');
               	$(idToMakeActive).addClass('is-active');
            	
            	}
            
         
        	})
        </script>
        <?php get_sidebar();?>
    </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer();?>