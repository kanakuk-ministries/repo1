<?php /* Template Name: Transportation */?>
<?php
/**
 * The template for displaying the transportation pages
 */
get_header();

console_log('kan_get_transportation_options', kan_get_transportation_options());
console_log('kan_get_charter_availability', kan_get_charter_availability());

$transportation_page = get_page_by_title( 'Transportation' );
$args = array(
	'post_parent' => $transportation_page->ID,
	'post_type' => 'page'
);
$transportation_subpages = get_children($args);
?>

	<div class="content">

		<div class="inner-content grid-x grid-margin-x">

		<main class="main small-12 medium-12 large-12 cell tabs-view about-page-main" role="main">
			<div class="hero-tabs-container about-page margin-bottom-60">
					<ul class="tabs hero-tabs about-page-tabs" id="transportation-page-tabs">
							<li class="tabs-title <?php if(strpos(get_the_title(), 'Transportation') !== false) { echo 'active'; } ?>">
									<a href="<?php echo esc_url( get_permalink( $transportation_page ) ); ?>" class="all-transportation-tab-link">
											All Transportation
									</a>
							</li>
							<?php
							global $post;
							foreach ($transportation_subpages as $subpage): ?>
							<li class="tabs-title <?php if($post->ID === $subpage->ID) { echo 'active'; } ?>">
									<a href="<?php echo esc_url( get_permalink( $subpage->ID ) ); ?>" class="<?php echo str_replace(' ', '-', $subpage->post_name); ?>-tab-link">
											<?php echo $subpage->post_title; ?>
									</a>
							</li>
							<?php endforeach;?>
					</ul>
			</div>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
						$post = get_post();

						if ( has_blocks( $post->post_content ) ) {
							$blocks = gutenberg_parse_blocks( $post->post_content );

							foreach ($blocks as $block) {
								if (substr($block['blockName'], 0, 3) === 'acf') {
									echo gutenberg_render_block($block);
								} else {
									echo '<div class="grid-container">' . gutenberg_render_block($block) . '</div>';
								}
							}
						}
						?>
					<?php endwhile; endif; ?>

					<?php get_template_part( 'elements/transportation/accordion-content' ); ?>

					<?php
						if(strpos(get_the_title(), 'Bus') !== false) {
							get_template_part( 'elements/transportation/accordion-charter' );
						}
					?>

			</main> <!-- end #main -->

				<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>