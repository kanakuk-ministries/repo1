<?php /* Template Name: Speaker */?>
<?php
/**
 * The template for displaying the transportation pages
 */
$kauai_menu = array('2019 Speakers', '2020 Speakers', 'Excursions');
get_header(); ?>

	<div class="content">

		<div class="inner-content grid-x grid-margin-x">

		<main class="main small-12 medium-12 large-12 cell tabs-view about-page-main" role="main" id="about-teams">
		<div class="top-nav-header-combined-container sticky" data-sticky data-sticky-on="medium">
        <div class="kamp-header-container-background speaker-section">
        </div>
        <div class="kamp-header-left-container back-section-div">
                                <a class="show-for-medium kamp-header-back-link margin-right-60 flex-container align-center kamp-<?php echo $kamp_type_title_lowercase ?>" href="/k-kauai" class="kamp-header-back-link">
                                    <i class="icon large icon-caret-large-left kamp"></i>
                                    <span>Back to Kamp</span>
                                </a>
        </div>
        </div>
	
		<div class="hero-tabs-container about-page margin-bottom-60">
                <ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">
                  <li class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>">
                        <a href="/k-kauai/2019-speakers/" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            2019 Speakers
                        </a>
                    </li>
                    <li class="tabs-title <?php if ($key === 1) {echo 'is-active';}?>">
                        <a href="/k-kauai/2020-speakers/" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            2020 Speakers
                        </a>
                    </li>
                    <li class="tabs-title <?php if ($key === 3) {echo 'is-active';}?>">
                        <a href="/k-kauai/excursions/" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            Excursions
                        </a>
                    </li>
                   
                </ul>
						</div>


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					$post = get_post();

					if ( has_blocks( $post->post_content ) ) {
						$blocks = gutenberg_parse_blocks( $post->post_content );

						foreach ($blocks as $block) {
						    echo gutenberg_render_block($block);
						    //echo "<pre>"; print_r($block);
						    //echo "<pre>"; print_r($block['attrs']['data']);
						}
					}
					?>
		<?php endwhile; endif; ?>
		
<?php get_footer(); ?>
<script type="text/javascript">
jQuery(function($) {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul a').each(function() {
     if (this.href === path) {
      $(this).addClass('speaker-color');
     }
    });
   });
</script>