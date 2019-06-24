<?php /* Template Name: Donate >> Donate */ ?>
<?php 
/**
 * The template for displaying a donation page
 */
$donate_pages = array('Online Donation', 'Non-Cash Gift', 'Legacy Gift', 'Gift via Mail');
get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x">
	
		<main class="main small-12 medium-12 large-12 cell donate-page-main" role="main">

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