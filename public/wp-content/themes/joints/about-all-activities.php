<?php /* Template Name: About >> All Activities */ ?>
<?php 
/**
 * The template for displaying an about page
 */
$about_pages = array('Our Story', 'Teams', 'Our Ministries', 'All Activities', 'Ceremonies', 'FAQs');
$kamp_types = get_kamp_types();
// $select_array[] = array(
//     'title' => 'Select',
//     'color' => '#003ca6',
//     'icon_name' => 'select',
//     'url' =>'',
//     'special_requirement_text' => '' 
// );
// $kamp_types = array_merge($select_array,$kamp_types);
$team_activites = get_fields();
$kamps = get_kamps();
get_header(); 
?>
<div class="content">
    <div class="inner-content grid-x grid-margin-x">
		<main class="main small-12 medium-12 large-12 cell tabs-view about-page-main" role="main">
            <div class="custom_hero">
            
            <div class="hero-tabs-container about-page margin-bottom-60">
                <ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">                
                    <?php foreach ($about_pages as $key => $value): 
                    ?>
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
                </div>
                <div class="grid-container activity-dropdown">
						<div class="accordion-image-grid-container margin-top-50">
							<h1 class="dark-blue"><?php echo $team_activites['team_title']; ?></h1>
							<p class="dark-blue margin-bottom-30"><?php echo $team_activites['team_description']; ?></p>
							<ul class="accordion list-grid-accordion-container" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true">
								<li class="accordion-item" data-accordion-item>
									<!-- Accordion title -->
									<a class="accordion-title list-grid-accordion-title-container" style="background-color:#00BAC9;">
									  <div class="accordion-title-text-container">
											<h4 class="white list-grid-accordion-title-header">Kamp Type:
											<select id="selectedKampType" class="form-control">
											<?php 
											foreach ($kamp_types as $key => $value): 
											?>
											<option value="<?php echo $value['title']; ?>"><?php echo $value['title']; ?> Kamp
											<?php endforeach;?>
											</select>
											</h4>
										</div>
									</a>
								</li>
							</ul>
							<?php foreach ($kamp_types as $key => $value): $flag = 0; ?>
									<!-- Accordion content: use `is-active` state class to start in open position. -->
									<ul class="accordion-content all_kamps_data kamp_<?php echo $value['title']; ?>" data-tab-content style="display:<?php if ($key == 0){ echo 'block'; }else{ echo 'none'; }; ?>">
										<?php foreach ($kamps as $kamp_key => $kamp):
										if ($kamp['kamp_type']->post_title === $value['title'] && !$flag) :
										$flag = 1;
										$display='block';
											if($kamp['kamp_title'] == 'Scuba Kamp'){
											    $display='none';
											}
											$allActivties = array();
											if($value['title']=='Overnight'){
											    foreach($kamps as $kamp){
											        if($kamp['kamp_type']->post_title=='Overnight' && isset($kamp['activities']) && reset($kamp['activities'])){
											            $allActivties = array_merge($allActivties,reset($kamp['activities']));
											            
											        }
										 	    }
											    usort($allActivties, function($a, $b) {
									 		        $search = ['K-Seven ','K-Kountry ','K-2 ','K-West ','K-1 '];
											        $replace = ['','','','',''];
											        $f = str_replace($search,$replace,$a->post_title);
											        $l = str_replace($search,$replace,$b->post_title);
											        return $f[0]>$l[0];
											    });
											}else{
											    $allActivties = (reset($kamp['activities']));
											}
											?>
												<div class="list-grid-section-container" style="display:<?=$display?>">
													<?php if($value['title']!='Overnight'){ ?>
													<div class="flex-container align-center list-grid-section-sub-header-container">
														<h4 class="margin-bottom-0 margin-top-15 kamp-<?php echo $value['icon_name']; ?>"><?php echo $kamp['kamp_title']; ?></h4>
														<div class="kamp-<?php echo $value['icon_name']; ?> list-grid-section-sub-header"></div>
													</div>
													<?php } if (isset($kamp['activities']) && reset($kamp['activities'])): 
													?>
														<ul class="list-grid-container activity-grid">
															<?php
															
																$i = 0;
																foreach ($allActivties as $activity_key => $activity):
																	if ($i === 4)
																		$i = 0;
																	$i++;
															?>
																<?php
																	$activity_id = array($activity->ID);
																	$this_activity_array = get_activities($activity_id);
																	$this_activity = reset($this_activity_array);
																?>
				<!-- activity description modal -->												
						<?php
								$modeltype = 'activitydescription';
								$id =  $activity_id[0];
								$name = $this_activity['activity_name'];
								$des = $this_activity['activity_description'];
								popupmodel($modeltype,$id,$name,$des);
   								?>
					
				<!-- /. end activity modal -->
				<!-- image modal -->
								<?php
								$modeltype = 'imageModal';
								$id =  $activity_id[0];
								$name = $this_activity['activity_name'];
								 $url = $this_activity['activity_image']['url'];
								 popupmodelImage($modeltype,$id,$name,$url);
   								?>
				<!-- /.end image modal -->
					
				<!-- /.end video modal -->
								
																<div class="list-grid-item block-<?php echo $i; ?>">
																<a href="#imageModal<?php echo $activity_id[0];?>"
					data-toggle="modal"><img src="<?php echo $this_activity['activity_image']['url']; ?>"></a>
																	<div class="list-grid-item-overlays">
																		<h6 class="secondary bold white text-center titlecase margin-bottom-20 white hollow"><?php echo $this_activity['activity_name']; ?></h6>
																	
																		<?php if($this_activity['activity_description']):?>
																		
																		<a href="#activitydescription<?php echo $activity_id[0];?>"
					data-toggle="modal" class="white"><button class="button expanded white hollow">Activity Description</button></a>
					
					<?php endif;?>
					   <?php
	         $videoUrl = $this_activity['video_popup_url'];
			//echo "<pre>step2"; print_r($videoUrl); 
            if ($videoUrl) :
                $checkUrl = getVideoUrl($videoUrl);
                $videoId = end(explode('/',$videoUrl));
                if ($checkUrl == 'vimeo') :
               $videoPlayerUrl = 'https://player.vimeo.com/video/'. $videoId .'?autoplay=1';
                    ?>
                <div class="video-modal">
				<div class="modal-embed-container video-center">
					<a href="#" class="wp-video-popup"><button class="button expanded white hollow" videourl="<?php echo $videoPlayerUrl; ?>">Watch Video</button></a>
                </div>
			</div>
              <?php endif;?>
             <?php if($checkUrl=='youtube'): 
             $videoId = explode('=',$videoId)[1];
             $videoPlayerUrl = 'https://www.youtube.com/embed/'. $videoId .'?autoplay=1';
             ?>
                   <div class="video-modal">
        				<div class="modal-embed-container video-center">
        				<?php if($videoUrl):?>
        				<a href="#" class="wp-video-popup"><button class="button expanded white hollow" videourl="<?php echo $videoPlayerUrl; ?>">Watch Video</button></a>
                           <?php endif;?>
                           </div>
        			</div>
              <?php endif;?> 
              <?php endif;?>
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
							<?php endforeach;?>
						</div>
					</div>
					<div class="wp-video-popup-wrapper">
					<div class="wp-video-popup-close"></div>
					<iframe class="wp-video-popup-video" src="" data-wp-video-popup-url="'. $video_url .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>
					</div>
			</main> <!-- end #main -->
			<script type="text/javascript">
				$('#selectedKampType').change(function(e){
					var kampType = $(this).val();
					var kampClassToActive = 'kamp_'+kampType;
					$('.all_kamps_data').hide();
					$('.'+kampClassToActive).show();
				});
			</script>
		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
<?php
function popupmodel($popuptype,$popupid, $popupheading, $popupdescription){
?>
<div id="<?php echo $popuptype;?><?php echo $popupid;?>"
    class="modal fade popout-about-card">
    <div class="modal-dialog modal-lg aboutInfoModal">
    <div class="modal-content">
    <div class="modal-header">
    <button class="close" type="button" data-dismiss="modal">
    <i class="fa fa-times" aria-hidden="true"></i>
    </button>
    <h4 class="modal-title card-section"><?php echo $popupheading; ?></h4>
							</div>
							<div class="modal-body customModalBody"><?php echo $popupdescription; ?></div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
<?php 
}

function popupmodelImage($popuptype,$popupid, $popupheading, $popupdescription){
?>
 
 <div id="<?php echo $popuptype;?><?php echo $popupid;?>"
  class="modal fade popout-about-card">
 <div class="modal-dialog modal-lg aboutInfoModal">
  <div class="modal-content">
  <div class="modal-header">
   <button class="close" type="button" data-dismiss="modal">
   <i class="fa fa-times" aria-hidden="true"></i>
    </button>
   <h4 class="modal-title"><?php echo $popupheading; ?></h4>
							</div>
							<div class="modal-bodys customModalBodys"><img src="<?php echo $popupdescription; ?>" width=100% height=100%></div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
<?php 
}
?>
<?php get_footer(); ?>