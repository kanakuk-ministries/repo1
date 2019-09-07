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
                    <?php foreach ($kamp_types as $key => $value){ 
                        switch(true){
                            case $value['title']=="Overnight": $value['url'] = "/overnight-kamp/"; break;
                            case $value['title']=="Day": $value['url'] = "/day-kamp/"; break;
                            case $value['title']=="Family": $value['url'] = "/family-kamp/"; break;
                            case $value['title']=="Specialty": $value['url'] = "/kamp-types-specialty-kamps/"; break;
                            default : break;
                        }
                        ?>
                    <li class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>">
                        <a href="<?php echo $value['url']; ?>" data-tabname="<?php echo $value['url']; ?>" class="<?php echo $value['icon_name']; ?>-tab-link">
                            <?php echo $value['title']; ?> Kamp
                            <i class="tabs-title-icon icon icon-<?php echo $value['icon_name']; ?>"></i>
                        </a>
                    </li>
                    <?php } ?>
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
<script type="text/javascript">
jQuery(function($) {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul a').each(function() {
     if (this.href === '<?php echo get_site_url();?>/family-kamp/#') {
         window.scrollBy(15, 500);
     }
    });
   });
</script>