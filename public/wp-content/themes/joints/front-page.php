<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header();
?>

<script type="text/javascript">
    var kanakuk_user = null;

    <?php 
    /**
     * This data is defined here and then used by the vuejs app 
     */

    if (kan_is_logged_in()) {
        $kan_user = $_SESSION['circuitree']['auth'];
        unset($kan_user['api_token']);
        $kan_user['kampers'] = [];
        foreach ($_SESSION['circuitree']['family'] as $member) {
           $kan_user['kampers'][] = [
                'first_name' => $member['child_first_name'],
                'last_name'  => $member['child_last_name'],
                'child_photo_url' => $member['child_photo_url'],
                'id'         => $member['child_entity_id'],
                'age'        => $member['age'],
                'gender'     => $member['gender']
            ];
        }
        echo "kanakuk_user = " . json_encode($kan_user)  . ";";
    }
    ?>
        // user: {
        //   first_name: 'Test',
        //   last_name: 'User',
        //   kampers: [
        //    {
        //       first_name: 'Ashley',
        //       last_name: 'User',
        //       id: 0,
        //       age: 9,
        //       gender: 'female'
        //    },
        //    {
        //       first_name: 'Gemini',
        //       last_name: 'User',
        //       id: 1,
        //       age: 6,
        //       gender: 'female'
        //    },
        //    {
        //       first_name: 'Cindy',
        //       last_name: 'User',
        //       id: 2,
        //       age: 12,
        //       gender: 'female'
        //    }
        //   ]
        // },
</script>

<div class="content">

    <div class="inner-content grid-x grid-margin-x">

        <main class="main small-12 large-12 medium-12 cell" role="main">

            <?php if (have_posts()): while (have_posts()): the_post();?>

            <?php //get_template_part( 'parts/loop', 'page' ); ?>

            <?php
        $post = get_post();

        if (has_blocks($post->post_content)) {
            $blocks = gutenberg_parse_blocks($post->post_content);

            foreach ($blocks as $block) {
                echo gutenberg_render_block($block);
            }
        }
        ?>

            <?php endwhile;endif;?>

        </main> <!-- end #main -->

        <?php //get_sidebar(); ?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer();?>