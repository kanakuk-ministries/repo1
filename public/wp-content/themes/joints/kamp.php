<?php /* Template Name: Kamp */ ?>
<?php 
/**
 * The template for displaying a single kamp
 *
 * This is the template that is used by all kamps by default.
 */
get_header(); ?>

<?php
    $kamp_card               = get_field('kamp_card');
	$kamp_card->kamp_title   = get_field('kamp_title', $kamp_card->ID);
	$kamp_card->kamp   	     = get_field('kamp', $kamp_card->ID);
	setup_postdata($kamp_card);
	$kamp = get_kamp($kamp_card->kamp_title)[0];
	$kamp_type = get_kamp_type($kamp['kamp_type'])[0];
	wp_reset_postdata();
	$directors = get_field('directors');
	if ($directors) {
		foreach ($directors as $director) {
			$director->Image = get_field('member_image', $director->ID);
		}
	}
	$kamp_type_title_lowercase = strtolower($kamp_type['title']);
    ?>
<header class="second-header">
<div class="top-nav-header-combined-container sticky" data-sticky data-sticky-on="medium">
                <div class="kamp-header-container-background">
                    <div class="kamp-header-container" style="border-color: <?php echo $kamp_type['color'] ?>;">
                        <div class="kamp-header-inner-container grid-container">
                            <div class="kamp-header-left-container">
                                <a class="show-for-medium kamp-header-back-link margin-right-60 flex-container align-center kamp-<?php echo $kamp_type_title_lowercase ?>" href="<?php echo $kamp_type_title_lowercase ?>" class="kamp-header-back-link">
                                    <i class="icon large icon-caret-large-left kamp-<?php echo $kamp_type_title_lowercase ?>"></i>
                                    <span>Back to Kamps</span>
                                </a>
                                <h3 class="kamp-<?php echo $kamp_type_title_lowercase ?> margin-bottom-0 margin-top-15">
                                    <?php echo $kamp['kamp_title'] ?>
                                </h3>
                                <i class="icon kamp-icon icon-<?php echo $kamp_type_title_lowercase ?> kamp-<?php echo $kamp_type_title_lowercase ?>"></i>
                            </div>
                            <div class="kamp-header-right-container">
                                <div class="flex-container flex-column justify-flex-start margin-right-50 margin-top-10">
                                    <p class="uppercase card-label-text dark-gray">Age</p>
                                    <h5 class="kamp-<?php echo $kamp_type_title_lowercase ?> margin-bottom-0">
                                        <?php echo $kamp['min_age'] . ' - ' . $kamp['max_age']; ?>
                                    </h5>
                                </div>
                                <div class="flex-container flex-column margin-top-10">
                                    <p class="uppercase card-label-text dark-gray">Term Length</p>
                                    <h5 class="kamp-<?php echo $kamp_type_title_lowercase ?> margin-bottom-0">
                                        <?php echo ($kamp['term_lengths'][0]); ?>
                                        <?php if ((count($kamp['term_lengths']) > 1)) : ?>
                                        <span> & </span>
                                        <?php echo end($kamp['term_lengths']); ?>
                                        <?php endif ?>
                                        <span>Week</span>
                                    </h5>
                                </div>
                                <div>
                                <?php if($kamp['max_age']=='') {?>
                                 <a id="kamp-selection" href="https://register.kanakuk.com/registration/EventSelection.aspx" class="show-for-medium button large margin-left-75 margin-bottom-0">Search Terms</a>
                                <?php }else{?>
                                    <span class="select_age flex-container flex-column">
                                        <select id="select-age" class="form-control" name="KampAge">
                                             <option value="">Select Age</option>
                                             <?php
                                          $age_array = range($kamp['min_age'], $kamp['max_age']);
                                              foreach( $age_array as $age_item){
                                             ?>    
                                            <option value="<?php echo $age_item; ?>"><?php echo $age_item; ?></option>
                                            <?php }?>
                                        </select>
                                    </span>
                                    <span class="select_gender flex-container flex-column">
                                         <select id="select-gender" class="form-control">
                                             <option value="">Select Gender</option>
                                             <option value="male">Male</option>
                                             <option value="female">Female</option>
                                        </select>
                                    </span> 
                                    </div>                               
                                <a id="kamp-selection" href="#" class="show-for-medium button large margin-left-75 margin-bottom-0" onclick="createUrl()">Search Terms</a>
                              <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kamp-sub-header-container show-for-small-only text-center">
                    <a href="/" class="button margin-bottom-0">Search Terms</a>
                </div>
            </div>
</header>
<div class="content" data-sticky-container>

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 large-12 medium-12 cell kamp-page" role="main">
            
			<script>
				function createUrl(){
					var gender = $('#select-gender').val();
					var age = $('#select-age').val();
					var kamp = '<?php echo $kamp['kamp_title']; ?>';
					window.location.href = '/search-results/?tab=0'+'&kamp_type='+kamp+'&kamp_age='+age+'&kamp_gender='+gender;
				}
			</script>
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
        </main> <!-- end #main -->
        <?php get_sidebar(); ?>
    </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>


<script>
    jQuery(window).scroll(function(){
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 100) jQuery('.second-header').addClass('fixed');
    else jQuery('.second-header').removeClass('fixed');
    });
</script>