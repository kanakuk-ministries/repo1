<?php /* Template Name: Contact Us */?>
<?php
/**
 * The template for displaying the about pages
 */
get_header();?>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 medium-12 large-12 cell contact-us-page" role="main">

          <div class="flex-container grid-container contact-us-blocks-container">
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
          </div>

        </main> <!-- end #main -->

        <?php get_sidebar();?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer();?>