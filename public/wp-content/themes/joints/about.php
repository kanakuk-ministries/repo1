<?php /* Template Name: About */?>
<?php
/**
 * The template for displaying the about pages
 */
$about_pages = array('Our Story', 'Teams', 'Our Ministries', 'All Activities', 'Ceremonies', 'FAQs');
get_header();?>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 medium-12 large-12 cell tabs-view about-page-main" role="main">
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

        <?php get_sidebar();?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer();?>