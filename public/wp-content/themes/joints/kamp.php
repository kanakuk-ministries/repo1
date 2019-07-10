    
<?php /* Template Name: Kamp */ ?>
<?php 
/**
 * The template for displaying a single kamp
 *
 * This is the template that is used by all kamps by default.
 */
get_header(); ?>

<?php
    global $post;
    $postId = $post->ID;
    $kamp_card               = get_field('kamp_card');
	$kamp_card->kamp_title   = get_field('kamp_title', $kamp_card->ID);
	$kamp_card->kamp   	     = get_field('kamp', $kamp_card->ID);
	setup_postdata($kamp_card);
	$kamp = get_kamp($kamp_card->kamp_title)[0];
	// pr($kamp);
	$kamp_type = get_kamp_type($kamp['kamp_type'])[0];
	// pr($kamp_type);
	wp_reset_postdata();
	$directors = get_field('directors');
	if ($directors) {
		foreach ($directors as $director) {
			$director->Image = get_field('member_image', $director->ID);
		}
	}
	// pr(get_field('directors'));
	$kamp_type_title_lowercase = strtolower($kamp_type['title']);
	if($postId==850 || $postId== 74){
	   $kamp_redirect_url =  "kamp-types-specialty-kamps/";
	}else{
	   $kamp_redirect_url = $kamp_type_title_lowercase."-kamp";
	}
    ?>



<div class="content" data-sticky-container>

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 large-12 medium-12 cell kamp-page" role="main">
            <div class="top-nav-header-combined-container sticky" data-sticky data-sticky-on="medium">
                <div class="kamp-header-container-background">
                    <div class="kamp-header-container" style="border-color: <?php echo $kamp_type['color'] ?>;">
                        <div class="kamp-header-inner-container grid-container">
                            <div class="kamp-header-left-container">
                                <a class="show-for-medium kamp-header-back-link margin-right-60 flex-container align-center kamp-<?php echo $kamp_type_title_lowercase ?>" href="<?php echo $kamp_redirect_url; ?>" class="kamp-header-back-link">
                                    <i class="icon large icon-caret-large-left kamp-<?php echo $kamp_type_title_lowercase ?>"></i>
                                    <span>Back to Kamps</span>
                                </a>
                                <h3 class="kamp-<?php echo $kamp_type_title_lowercase ?> margin-bottom-0 margin-top-15">
                                    <?php echo $kamp['kamp_title'] ?>
                                </h3>
                                <i class="icon kamp-icon icon-<?php echo $kamp_type_title_lowercase ?> kamp-<?php echo $kamp_type_title_lowercase ?>"></i>
                            </div>
                            <div class="kamp-header-right-container">
                                <div class="flex-container flex-column justify-flex-start margin-right-70 margin-top-10">
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
                                <?php if($kamp['max_age']=='') {?>
                                 <a id="kamp-selection" href="https://register.kanakuk.com/registration/EventSelection.aspx" class="show-for-medium button large margin-left-75 margin-bottom-0">Search Terms</a>
                                <?php }else{?>
                                 <a id="kamp-selection" href="/search-results/?tab=0&kamp_type=<?php echo $kamp['kamp_title'];?>&kamp_age=<?php echo $kamp['max_age']?>" class="show-for-medium button large margin-left-75 margin-bottom-0">Search Terms</a>
                              <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kamp-sub-header-container show-for-small-only text-center">
                    <a href="/" class="button margin-bottom-0">Search Terms</a>
                </div>
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

        </main> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>