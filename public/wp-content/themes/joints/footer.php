<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>

<footer class="footer" role="contentinfo">
    <div class="inner-footer grid-x grid-container grid-margin-x grid-padding-x">

        <div class="small-12 medium-12 large-12 cell links-container">
            <div class="grid-x">
                <?php joints_social_links(); ?>
            </div>

            <hr class="white">
            <nav role="navigation">
                <?php joints_footer_links(); ?>
            </nav>
        </div>
        <div class="small-12 medium-12 large-12 cell contact-container padding-bottom">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kanakuk-white.png" />
            <div class="padding-vertical">
                <span class="small-text bold">1353 Lake Shore Drive Branson, MO 65616</span>
                <br />
                <span class="small-text bold">417.266.3000</span>
            </div>
            <span class="source-org copyright small-text">
                &copy;
                <?php echo date('Y'); ?>
                <?php bloginfo('name'); ?> Ministries</span>
        </div>

    </div> <!-- end #inner-footer -->

</footer> <!-- end .footer -->

</div> <!-- end .off-canvas-content -->

</div> <!-- end .off-canvas-wrapper -->

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->
<script type="text/javascript">
//banner for hero image
$('#about-page-tabs').parent().appendTo('.hero-container');
//faq js 
window.onload=function(){
jQuery('li.faqs-content-question').click(function(){
 var displayProp = jQuery(this).children('div').css('display');
 displayProp = displayProp=='none' ? 'block' : 'none';
 jQuery(this).children('div').css('display',displayProp); 
}); 
}
 
</script>
