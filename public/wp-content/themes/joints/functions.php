<?php
/**
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

/**
 * override default oEmbed size
 */
function new_embed_size() { 
	return array( 'width' => 1440, 'height' => 800 );
}

add_filter( 'embed_defaults', 'new_embed_size' );

/**
 * Convenience function to extract array elements from a multi-dimensional array 
 * without having to manually check for valid keys at each level
 * 
 * Usage:
 * $food = ['fruits' => ['apples' => ['fuji', 'granny smith'], 'bananas']];
 * $apples = array_extract($food, 'fruits.apples'); // returns ['fuji', 'granny smith']
 */
function array_extract($arr, $path = '')
{
    $path_parts = explode('.', $path);
    foreach ($path_parts as $part) {
        if (isset($arr[$part])) {
            $arr = $arr[$part];
        }
        else {
            return null;
        }
    }

    return $arr;
}

//download the image from any external url
function fetchImage($photo_url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $photo_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    $data = curl_exec($ch);
    curl_close($ch);
    $tmpfile = get_theme_root().'/joints/assets/images' . DS . md5($photo_url) . '.jpg';
    @file_put_contents( $tmpfile, $data );
    return $tmpfile;
}



/**
 * Given an associative array, will turn any CamelCase array keys into snake_case
 */
function underscore_array_keys($array)
{
    foreach (array_keys($array) as $key) {
        # Working with references here to avoid copying the value,
        # since you said your data is quite large.
        $value = &$array[$key];
        unset($array[$key]);
        # This is what you actually want to do with your keys:
        #  - remove exclamation marks at the front
        #  - camelCase to snake_case
        $transformedKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', ltrim($key, '!')));
        # Work recursively
        if (is_array($value)) transformKeys($value);
        # Store with new key
        $array[$transformedKey] = $value;      
        # Do not forget to unset references!
        unset($value);
    }

    return $array;
}


function content($content = '', $limit = 0)
{
    $content = explode(' ', $content, $limit);
    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = \implode(" ", $content);
    }
    $content = apply_filters('the_content', $content);
   
    return $content;
}

add_action('wp_enqueue_scripts','Load_Template_Scripts_wpa83855');
function Load_Template_Scripts_wpa83855(){
    if ( is_page_template('about-teams.php') ) {
        wp_enqueue_script('jqeury-scroll', 'path/custom/jquery.scrolling-tabs.js');
    }
}



/**
 * Count no. of words.
 * @param string $content
 * @param number $limit
 * @return mixed
 */
function count_words($content = '')
{
    $content = explode(' ', $content);
    
    return count($content);
}

/**
 * Convenience wrapper for print_r, but enclosed in <pre> tags, so useful for browser output/debugging
 */
function pr($data = [])
{
    echo "<pre style='font-size:9px;'>";
    print_r($data);
    echo "</pre>";
}

/**
 * Writes message/data to the javascript console
 */
function console_log($message, $data)
{
    // only use in debug mode
    if (WP_DEBUG) {
        echo "<script>";
        echo "console.log('$message');";
        echo "console.log(" . json_encode($data) . ")";
        echo "</script>";
    }
}

/**
 * Given a string, removes all chars except alpha-numeric and dash.  Returns string in lower cased form.
 */
function clean($string) {
    $string = str_replace(' ', '', $string); // Removes spaces.
    $string_no_chars = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return strtolower($string_no_chars);
}

/**
 * get the differiante the youtube video and vimeo video
 * */


function getVideoUrl($videoURl){
    
    $parts=explode('/',parse_url($videoURl)['path']);
    array_unshift($parts,trim(strstr(parse_url($videoURl)['host'],'.'),'.'));
    $url = (array_filter($parts));
    $finalURl = $url['0'];
    if($finalURl=='youtube.com'){
        
        return "youtube";
    }if($finalURl=='vimeo.com'){
        
        return "vimeo";
    }else{
        return "vidyard";
    }
}



/**
 * Used to render partial templates from within another template.  
 * 
 * @param $template the path to the template file (excluding the extension)
 * @param $vars variables to make available to the template
 */
function element($template, $vars = [])
{
    $element = "";
    $path = STYLESHEETPATH . "/elements/" . str_replace('.', '/', $template) . '.php';

    if (file_exists($path)) {
        ob_start();
        extract($vars);
        include $path;
        $element = ob_get_contents();
        ob_end_clean();
        return $element;
    } else {
        throw new Exception("Missing element template: " . $template . ".php");
    }
}

function get_staff($ids = null, $title = null)
{
    // WP_Query arguments
    $args = array(
        'posts_per_page'   => -1,
        'post_type' => 'leadership_members',
        'post_status' => 'publish',
    );

    if ($ids) {
        $args['post__in'] = $ids;
    }

    if ($title) {
        $args['meta_query'] = array(
            array(
                'key' => 'member_team',
                'value' => $title,
                'compare' => 'LIKE'
            )
        );
    }
    // The Query
    $staff = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($staff->have_posts()) {
        while ($staff->have_posts()) {
            $staff->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

function get_activities($ids = null)
{
    // WP_Query arguments
    $args = array(
        'posts_per_page'   => -1,
        'post_type' => 'activity',
        'post_status' => 'publish',
    );

    if ($ids) {
        $args['post__in'] = $ids;
    }

    // The Query
    $activities = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($activities->have_posts()) {
        while ($activities->have_posts()) {
            $activities->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

function get_kamps()
{
    // WP_Query arguments
    $args = array(
        'post_type' => array('kamps'),
        'post_status' => array('publish'),
    );

    // The Query
    $staff = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($staff->have_posts()) {
        while ($staff->have_posts()) {
            $staff->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

function get_kamp($title)
{
    // WP_Query arguments
    $args = array(
        'post_type' => 'kamps',
        'meta_key' => 'kamp_title',
        'meta_value' => $title,
    );

    // The Query
    $staff = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($staff->have_posts()) {
        while ($staff->have_posts()) {
            $staff->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

function get_kamp_titles()
{
    $kamps = get_kamps();
    return array_column($kamps, 'kamp_title');
}

function get_kamp_by_title($title)
{
    $kamps = get_kamps();
    foreach ($kamps as $kamp) {
        if (stripos($kamp['kamp_title'], $title) !== false) {
            return $kamp;
        }
    }
    return null;
}

function get_kamp_types()
{
    $args = array(
        'post_type' => array('kamp_types'),
        'post_status' => array('publish'),
    );

    // The Query
    $type = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($type->have_posts()) {
        while ($type->have_posts()) {
            $type->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

function get_kamp_type($type_object)
{
    $title = $type_object->post_name ?: $type_object->post_title;

    $args = array(
        'post_type' => 'kamp_types',
        'meta_key' => 'title',
        'meta_value' => $title,
    );

    // The Query
    $type = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($type->have_posts()) {
        while ($type->have_posts()) {
            $type->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

function faq_search($query) 
{
    $args = array(
        'post_type' => 'faqs',
        'meta_key' => 'title',
        'meta_value' => $title,
    );

    // The Query
    $type = new WP_Query($args);

    // results to return
    $results = [];

    // The Loop
    if ($type->have_posts()) {
        while ($type->have_posts()) {
            $type->the_post();
            // do something
            $post_id = get_the_ID();
            $results[] = get_fields($post_id);
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $results;
}

// register the ajax action for authenticated users
add_action('wp_ajax_get_faq_search', 'get_faq_search');

// register the ajax action for unauthenticated users
add_action('wp_ajax_nopriv_get_faq_search', 'get_faq_search');

// handle the ajax request
function get_faq_search($query) {
    $search_query = $_REQUEST['query'];
    //Get the post data 
    $search_query = $_POST["query"];
    
    // add your logic here...

    $faqs = get_field('faqs', 32, false);
    
    $response = array(
        'query'   => $search_query,
        'faqs'    => $faqs
    );
    
    // in the end, returns success json data
    wp_send_json_success($response);

    // or, on error, return error json data
    wp_send_json_error(['Something went wrong']);

}

function my_acf_init()
{

    // check function exists
    if (function_exists('acf_register_block')) {

        // register a 4-image block
        acf_register_block([
            'name' => 'four-image',
            'title' => __('Four Image'),
            'description' => __('A four image block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'format-gallery',
            'keywords' => ['kan', 'kanakuk', 'image'],
        ]);

        // register a 5-image block
        acf_register_block([
            'name' => 'five-image',
            'title' => __('Five Image'),
            'description' => __('A five image block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'format-gallery',
            'keywords' => ['kan', 'kanakuk', 'image'],
        ]);

        // register a hero block
        acf_register_block([
            'name' => 'hero',
            'title' => __('Hero'),
            'description' => __('A hero block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'hero'],
        ]);

        // register a kamp card block
        acf_register_block([
            'name' => 'kamp-card',
            'title' => __('Kamp Card'),
            'description' => __('A predefined kamp card block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'kamp'],
        ]);
        
        // register a kamp card block
        acf_register_block([
            'name' => 'kaui-speakers',
            'title' => __('Speakers Sections'),
            'description' => __('A section for K-Kauakui block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'kamp'],
        ]);
        
        // register a kamp card block
        acf_register_block([
            'name' => 'speakers-group',
            'title' => __('Speakers Group'),
            'description' => __('A section for K-Kauakui block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'kamp'],
        ]);

        // register a kamp trait card block
        acf_register_block([
            'name' => 'kamp-trait-card',
            'title' => __('Kamp Trait Card'),
            'description' => __('A predefined kamp trait card block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'kamp'],
        ]);

        // register a kamp card block
        acf_register_block([
            'name' => 'simple-text',
            'title' => __('Simple Text'),
            'description' => __('A simple text block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'text', 'simple'],
        ]);

        // register a testimonial block
        acf_register_block([
            'name' => 'testimonial',
            'title' => __('Testimonial'),
            'description' => __('A custom testimonial block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'testimonial', 'quote'],
        ]);

        // register a slideshow block
        acf_register_block([
            'name' => 'slideshow',
            'title' => __('Slideshow'),
            'description' => __('A custom slideshow block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kan', 'kanakuk', 'slideshow', 'quote'],
        ]);

        // register a kitchen sink block
        acf_register_block([
            'name' => 'kitchen-sink',
            'title' => __('Kitchen Sink'),
            'description' => __('A custom kitchen sink block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['kitchen-sink'],
        ]);

        // register a subhero block
        acf_register_block([
            'name' => 'sub-hero',
            'title' => __('SubHero'),
            'description' => __('A custom sub hero block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['sub-hero'],
        ]);

        // register a contact block
        acf_register_block([
            'name' => 'kamp-contact',
            'title' => __('Kamp Contact'),
            'description' => __('A custom kamp contact block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['contact', 'kamp', 'director'],
        ]);

        // register an about card block
        acf_register_block([
            'name' => 'about-card',
            'title' => __('About Card'),
            'description' => __('A custom about card block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['about', 'card', 'description'],
        ]);
        
        // register a contact us section block
        acf_register_block([
            'name' => 'simple-description',
            'title' => __('Simple description'),
            'description' => __('A custom descriton for any page title.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['simple', 'description', 'description'],
        ]);

        // register a summer staff section block
        acf_register_block([
            'name' => 'summer-staff',
            'title' => __('Summer Staff'),
            'description' => __('A custom summer staff section block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['about', 'team', 'summer', 'staff'],
        ]);

        // register a contact us section block
        acf_register_block([
            'name' => 'contact-us',
            'title' => __('Contact Us'),
            'description' => __('A custom contact us section block. This should only be used on the contact us page as it will include the contact form to the right.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['contact', 'us', 'question'],
        ]);

        // register a intro with CTA block
        acf_register_block([
            'name' => 'intro-with-cta',
            'title' => __('Intro With CTA'),
            'description' => __('A custom block with a title, intro and CTA button.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['introduction', 'executive', 'faq'],
        ]);

        // register a text list item block
        acf_register_block([
            'name' => 'text-list-item',
            'title' => __('Text List Item'),
            'description' => __('A custom block with a title, body and possibly URL, aligned left.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['list', 'text', 'simple'],
        ]);

        // register a card with text list block
        acf_register_block([
            'name' => 'card-with-text-list',
            'title' => __('Card With Text List'),
            'description' => __('A custom block with a white card style background and text listed.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => ['list', 'text', 'card'],
        ]);
    }
}

add_action('acf/init', 'my_acf_init');

function my_acf_block_render_callback($block)
{

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "elements/acf-blocks" folder
    if (file_exists(STYLESHEETPATH . "/elements/acf-blocks/content-{$slug}.php")) {
        include STYLESHEETPATH . "/elements/acf-blocks/content-{$slug}.php";
    }
}

/*
 * The following functions were taken from the gutenberg plugin, this functionality seemed to be missing
 * from the default gutenberg install that came with Wordpress 5.0
 *
 * These functions allow custom rendering of gutenberg blocks
 */

if (!function_exists('gutenberg_parse_blocks')) {
    /**
     * Parses blocks out of a content string.
     *
     * @since 0.5.0
     *
     * @param  string $content Post content.
     * @return array  Array of parsed block objects.
     */
    function gutenberg_parse_blocks($content)
    {
        /**
         * Filter to allow plugins to replace the server-side block parser
         *
         * @since 3.8.0
         *
         * @param string $parser_class Name of block parser class
         */
        $parser_class = apply_filters('block_parser_class', 'WP_Block_Parser');

        // Load default block parser for server-side parsing if the default parser class is being used.
        if ('WP_Block_Parser' === $parser_class) {
            require_once dirname(__FILE__) . '/../../../wp-includes/class-wp-block-parser.php';
        }
        $parser = new $parser_class();
        return $parser->parse($content);
    }
}

/**
 * Renders a single block into a HTML string.
 *
 * @since 1.9.0
 * @since 4.4.0 renders full nested tree of blocks before reassembling into HTML string
 * @global WP_Post $post The post to edit.
 *
 * @param  array $block A single parsed block object.
 * @return string String of rendered HTML.
 */
function gutenberg_render_block($block)
{
    global $post;

    $block_type = WP_Block_Type_Registry::get_instance()->get_registered($block['blockName']);
    $is_dynamic = $block['blockName'] && null !== $block_type && $block_type->is_dynamic();
    $inner_content = '';
    $index = 0;

    foreach ($block['innerContent'] as $chunk) {
        $inner_content .= is_string($chunk) ? $chunk : gutenberg_render_block($block['innerBlocks'][$index++]);
    }

    if ($is_dynamic) {
        $attributes = is_array($block['attrs']) ? (array) $block['attrs'] : array();
        $global_post = $post;
        $output = $block_type->render($attributes, $inner_content);
        $post = $global_post;

        return $output;
    }

    return $inner_content;
}

// Theme support options
require_once get_template_directory() . '/functions/theme-support.php';

// WP Head and other cleanup functions
require_once get_template_directory() . '/functions/cleanup.php';

// Register scripts and stylesheets
require_once get_template_directory() . '/functions/enqueue-scripts.php';

// Register custom menus and menu walkers
require_once get_template_directory() . '/functions/menu.php';

// Register sidebars/widget areas
require_once get_template_directory() . '/functions/sidebar.php';

// Makes WordPress comments suck less
require_once get_template_directory() . '/functions/comments.php';

// Replace 'older/newer' post links with numbered navigation
require_once get_template_directory() . '/functions/page-navi.php';

// Adds support for multiple languages
require_once get_template_directory() . '/functions/translation/translation.php';

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php');

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');
