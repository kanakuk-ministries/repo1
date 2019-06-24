<?php /* Template Name: Kamp Types */?>
<?php
/**
 * The template for displaying a kamp category page
 */
$kamp_types = get_kamp_types();
get_header();?>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 medium-12 large-12 cell tabs-view" role="main">
            <div class="hero-tabs-container">
                <ul class="tabs hero-tabs kamp-types-tabs" id="kamp-types-tabs">
                    <?php foreach ($kamp_types as $key => $value): ?>
                    <li class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>">
                        <a href="<?php echo $value['url']; ?>" class="<?php echo $value['icon_name']; ?>-tab-link">
                            <?php echo $value['title']; ?> Kamp
                            <i class="tabs-title-icon icon icon-<?php echo $value['icon_name']; ?>"></i>
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