<?php /* Template Name: Transportation */?>
<?php
/**
 * The template for displaying the transportation pages
 */
get_header();

console_log('kan_get_transportation_options', kan_get_transportation_options());
console_log('kan_get_charter_availability', kan_get_charter_availability());
$post_id = get_the_ID();
$transportation_page = get_page_by_title('Transportation');
$args = array(
    'post_parent' => $transportation_page->ID,
    'post_type' => 'page'
);
$transportation_subpages = get_children($args);
?>

<div class="content">
	<div class="inner-content grid-x grid-margin-x">
		<main
			class="main small-12 medium-12 large-12 cell tabs-view about-page-main"
			role="main">
		<div class="hero-tabs-container about-page margin-bottom-60">
			<ul class="tabs hero-tabs about-page-tabs"
				id="transportation-page-tabs">
				<li
					class="tabs-title <?php if(strpos(get_the_title(), 'Transportation') !== false) { echo 'active'; } ?>">
					<a
					href="<?php echo esc_url( get_permalink( $transportation_page ) ); ?>"
					class="all-transportation-tab-link">All Transportation</a>
				</li>
							<?php
    global $post;
    foreach ($transportation_subpages as $subpage) :
        ?>
							<li
					class="tabs-title <?php if($post->ID === $subpage->ID) { echo 'active'; } ?>">
					<a href="<?php echo esc_url( get_permalink( $subpage->ID ) ); ?>"
					class="<?php echo str_replace(' ', '-', $subpage->post_name); ?>-tab-link">
											<?php echo $subpage->post_title; ?>
									</a>
				           </li>
							<?php endforeach;?>
					</ul>
		</div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
            $post = get_post();
            if (has_blocks($post->post_content)) {
                $blocks = gutenberg_parse_blocks($post->post_content);
                foreach ($blocks as $block) {
                    if (substr($block['blockName'], 0, 3) === 'acf') {
                        echo gutenberg_render_block($block);
                    } else {
                        echo '<div class="grid-container m-t40">' . gutenberg_render_block($block) . '</div>';
                    }
                }
                ?>
     <?php if($post_id=='1394'):?>
	   <ul class="nav nav-tabs camp-tab">
			<li class="k-1 active"><a data-toggle="tab" href="#home">K-1</a></li>
			<li class="k-2"><a data-toggle="tab" href="#menu1">K-2</a></li>
			<li class="k-3"><a data-toggle="tab" href="#menu2">K-Seven</a></li>
			<li class="k-4"><a data-toggle="tab" href="#menu3">K-Kountry</a></li>
			<li class="k-5"><a data-toggle="tab" href="#menu4">K-West</a></li>
			<li class="k-6"><a data-toggle="tab" href="#menu5">K-Kauai</a></li>
			<li class="k-7"><a data-toggle="tab" href="#menu6">KampOut</a></li>
			<li class="k-8"><a data-toggle="tab" href="#menu7">WorldView Camp</a></li>
		</ul>
		<div class="tab-content camp-tab-content">
			<div id="home" class="tab-pane fade in active">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51202.81031367731!2d-93.26531541271406!3d36.67027768943803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cf0479a49e1c51%3A0x3fd27dce39014b8b!2s1353+Lake+Shore+Dr%2C+Branson%2C+MO+65616!5e0!3m2!1sen!2sus!4v1410383355801&quot; "
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3205.2049860718516!2d-93.48265658522799!3d36.5491700894906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cedf5d5d23572f%3A0xa56c2c59a3c24ae0!2s20+K-2+Dr%2C+Lampe%2C+MO+65681%2C+USA!5e0!3m2!1sen!2sin!4v1564491238530!5m2!1sen!2sin&quot"
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu2" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3205.037029494252!2d-93.49358438522792!3d36.553220089263974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cedf574b25e5bf%3A0xfd4786dbc33d3c35!2s118+K7+Dr%2C+Lampe%2C+MO+65681%2C+USA!5e0!3m2!1sen!2sin!4v1564491434015!5m2!1sen!2sin"
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu3" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3200.86748741124!2d-93.21314688522483!3d36.6536383836366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cf0478703cd4df%3A0xff84a0cde2542127!2s967+Lake+Shore+Dr%2C+Branson%2C+MO+65616%2C+USA!5e0!3m2!1sen!2sin!4v1564491534569!5m2!1sen!2sin"
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu4" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3204.9334399938252!2d-93.49350808522779!3d36.555717789123904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cedf57759b3539%3A0xbc5b9ffffd1ead4!2s793+K+W+Dr%2C+Lampe%2C+MO+65681%2C+USA!5e0!3m2!1sen!2sin!4v1564491617368!5m2!1sen!2sin "
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu5" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3200.9484362112066!2d-93.21278488522489!3d36.6516910837459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cf03879d8b406d%3A0xc1a0d71faa53b9bc!2s833+Lake+Shore+Dr%2C+Branson%2C+MO+65616%2C+USA!5e0!3m2!1sen!2sin!4v1564491701443!5m2!1sen!2sin "
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu6" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3200.746342057685!2d-93.21189698522473!3d36.656552483473234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cf0479bdde6e29%3A0xd44ef9532a3df7b7!2s1353+Lake+Shore+Dr%2C+Branson%2C+MO+65616%2C+USA!5e0!3m2!1sen!2sin!4v1564491832820!5m2!1sen!2sin"
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<div id="menu7" class="tab-pane fade">
				<div class="grid-container m-t40">
					<iframe frameborder="0" id="1" scrolling="yes"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3205.2049860718516!2d-93.48265658522799!3d36.5491700894906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cedf5d5d23572f%3A0xa56c2c59a3c24ae0!2s20+K-2+Dr%2C+Lampe%2C+MO+65681%2C+USA!5e0!3m2!1sen!2sin!4v1564491982321!5m2!1sen!2sin"
						align="middle" frameborder="1" height="400" width="100%"></iframe>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
            			<?php
            }
            ?>
					<?php endwhile; endif; ?>
					
					<?php get_template_part( 'elements/transportation/accordion-content' ); ?>
					<?php
    if (strpos(get_the_title(), 'Bus') !== false) {
        get_template_part('elements/transportation/accordion-charter');
    }
    ?>

			</main>
	<!-- end #main -->
				<?php get_sidebar(); ?>
		</div>
<!-- end #inner-content -->
</div>
<!-- end #content -->
<?php get_footer(); ?>