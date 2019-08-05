<?php /* Template Name: About >> FAQs */?>
<?php
/**
 * The template for displaying the about pages
 */
$about_pages = array(
    'Our Story',
    'Teams',
    'Our Ministries',
    'All Activities',
    'Ceremonies',
    'FAQs'
);
get_header();
?>
<div class="content">
	<div class="inner-content grid-x grid-margin-x">
		<main
			class="main small-12 medium-12 large-12 cell tabs-view about-page-main"
			role="main">
		<div class="hero-tabs-container about-page margin-bottom-60">
			<ul class="tabs hero-tabs about-page-tabs" id="about-page-tabs">
                    <?php foreach ($about_pages as $key => $value): ?>
                    <li
					class="tabs-title <?php if ($key === 0) {echo 'is-active';}?>"><a
					href="about-<?php echo str_replace(' ', '-', strtolower($value)); ?>"
					class="<?php echo str_replace(' ', '-', strtolower($value)); ?>-tab-link">
                            <?php echo $value; ?>
                        </a></li>
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
<?php
$faqs = get_field('faqs');
setup_postdata($faqs);
$faq_array = [];
foreach ($faqs as $faq) {
    $tempArray = array(
        'question' => $faq['question'],
        'answer' => $faq['answer']
    );
    $faq_array[$faq['question_categories'][0]][] = $tempArray;
}
?>
<div class="faqs-container grid-container">
			<div class="card flat">
				<label class="input-icon faq-search-input"> <input type="text"
					placeholder="Search" id="searchbar" onkeyup="search_question(this)"
					class="input-icon"> <i class="icon icon-search-copy"></i>
				</label>
				<div id="search-results" class="faq-tab">
					<div id = "searchResult"></div>
					<?php $k = 0; foreach ($faqs as $key => $faqData) { ?>
						<div class="col-lg-12 col-md-12 hide tab-content">
							<button data-toggle="collapse"
								data-target="#<?='serachCollap'.$k?>" class="queAns"><?=$faqData['question']?></button>
							<div id="<?='serachCollap'.$k?>" class="collapse">
                            	<?=$faqData['answer']?>
                        	</div>
						</div>
					<?php $k++; } ?>
				</div>
				<div class="card-section full-width faqs-content-container" id="catQueAns">
					<div class="faq-tab">
						<ul
							class="nav nav-tabs nav-stacked col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            		<?php $i=0; foreach ($faq_array as $key => $faqCat) { ?>
                  		<li class="<?php if($i==0) echo 'active'; ?>"><a
								data-toggle="tab" href="#<?='tab'.$i?>"><?=$key?></a></li>
                    <?php $i++; } ?>
                </ul>
                	<div
							class="tab-content col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <?php $i=0; foreach ($faq_array as $key => $faqCat) {  ?>
                  <div id="<?='tab'.$i?>"
								class="tab-pane fade<?php if($i==0) echo ' in active'; ?>">
                  		<?php $j=0; foreach ($faqCat as $key => $faqs) {  ?>
                  		<div class="col-lg-12 col-md-12">
									<button data-toggle="collapse"
										data-target="#<?='collapsible'.$i.$j?>" class="question"><?=$faqs['question']?></button>
									<div id="<?='collapsible'.$i.$j?>" class="collapse">
                            	<?=$faqs['answer']?>
                            </div>
								</div>
                        <?php $j++; } ?>
                    </div>
                    <?php $i++; } ?>
                </div>
					</div>
				</div>
			</div>
		</div>
		</main>
		<!-- end #main -->
		<script type="text/javascript">
			var faqs = <?php echo json_encode($faqs); ?>;
			// search query for questions 
			function search_question () { 
			    let input = document.getElementById('searchbar').value 
			    input=input.toLowerCase(); 
			    let x = document.getElementsByClassName('queAns');
			    let k = 0; 
			    for (i = 0; i < x.length; i++) {  
			        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
			            x[i].parentElement.className="col-lg-12 col-md-12 hide"; 
			        } 
			        else { 
				        k++;
				        document.getElementById('catQueAns').style.display = 'none';
						document.getElementById('search-results').style.display = 'block';
			            x[i].parentElement.className="col-lg-12 col-md-12 tab-content";                  
			        } 
			    } 
			    document.getElementById('searchResult').innerHTML = '<p class="dark-gray margin-bottom-30"><span class="uppercase small-text bold">'+k+' Results</span> <span>|</span> <span class="uppercase small-text pointer bold" id="clearSearch">Clear Search</span></p>';
		
			} 
    			$(document).on('click','#clearSearch',function(){
    				document.getElementById('catQueAns').style.display = 'block';
    				document.getElementById('search-results').style.display = 'none';
    				document.getElementById('searchbar').value = "";
    			});
        </script>
        <?php get_sidebar();?>
    </div>
	<!-- end #inner-content -->
</div>
<!-- end #content -->
<?php get_footer();?>