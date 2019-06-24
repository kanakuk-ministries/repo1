<?php /* Template Name: About >> FAQs */?>
<?php
/**
 * The template for displaying the about pages
 */
$about_pages = array('Our Story', 'Teams', 'Our Ministries', 'All Activities', 'Ceremonies', 'FAQs');
get_header();?>

<?php
	$faqs = get_field('faqs');
	setup_postdata($faqs);
?>

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
						
			<div class="faqs-container grid-container" id="faqs-container" v-cloak>
				<div class="card flat">
					<label class="input-icon faq-search-input">
							<input class="input-icon" type="text" placeholder="Search" v-model="search_query">
							<i class="icon icon-search-copy"></i>
					</label>
					<div class="card-section full-width faqs-content-container">
						<div class="show-for-small-only flex-container align-center">
							<!-- <span class="show-for-small-only card-label-text uppercase bold dark-gray">Category: </span> -->
							<p class="uppercase medium-text dark-gray bold margin-bottom-0" @click="open_mobile_menu">
								<span>{{ selected_category }}</span>
							</p>
							<i class="icon medium dark-gray" 
							v-bind:class="{'icon-caret-large-up': mobile_menu_open, 'icon-caret-large-down': !mobile_menu_open}"></i>
						</div>
						<ul class="faqs-content-categories-container" v-bind:class="{'mobile-menu-open': mobile_menu_open, 'hide': search_query}">
							<p class="bold dark-blue" v-if="search_query">Search Results</p>
							<li 
								class="faqs-content-category"
								v-bind:class="{'bold is-active': category === selected_category, 'hide-on-mobile': selected_category === category }"
								v-for="(category, index) in faq_categories"
								@click="select_category(category)">
									{{ category }}
								</li>
						</ul>
						<ul class="faqs-content-faqs-container accordion" 
								id="faqs-content-faqs-container"
								data-accordion 
								data-multi-expand="true"
								data-allow-all-closed="true">
							<div v-if="search_query && search_query.trim() !== ''">
								<p class="dark-gray margin-bottom-30">
									<span class="uppercase small-text bold">{{visible_faqs.length}} Results</span>
									<span>|</span>
									<span class="uppercase small-text pointer bold" @click="clearSearch()">Clear Search</span>
								</p>
							</div>
							<li 
								class="accordion-item faqs-content-question"
								data-accordion-item
								v-for="(faq, index) in visible_faqs" >
								<a class="accordion-title faqs-content-question-title">{{ faq.question }}</a>
								<div class="accordion-content faqs-content-answer" data-tab-content>
									<div v-html="faq.answer"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</main> <!-- end #main -->
				
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script type="text/javascript">
			var faqs = <?php echo json_encode($faqs); ?>;
        </script>

        <?php get_sidebar();?>

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer();?>