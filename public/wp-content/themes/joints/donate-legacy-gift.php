<?php /* Template Name: Donate >> Gift via Mail */ ?>
<?php 
/**
 * The template for displaying a donation page
 */
$donate_pages = array('Online Donation', 'Non-Cash Gift', 'Legacy Gift', 'Gift via Mail');
get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x">
	
		<main class="main small-12 medium-12 large-12 cell tabs-view donate-page-main" role="main">
            <div class="hero-tabs-container donate-page margin-bottom-60">
                <ul class="tabs hero-tabs donate-page-tabs" id="donate-page-tabs">
                    <?php foreach ($donate_pages as $key => $value): ?>
                    <li class="tabs-title">
                        <a href="donate-<?php echo str_replace(' ', '-', strtolower($value)); ?>" class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            <?php echo $value; ?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>

            <?php if (have_posts()): while (have_posts()): the_post();?>
            <?php
        $post = get_post();

        if (has_blocks($post->post_content)) {
            $blocks = gutenberg_parse_blocks($post->post_content);

            foreach ($blocks as $key => $block) {
                echo gutenberg_render_block($block);
            }
        }
        ?>
            <?php endwhile;endif;?>

        </main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>