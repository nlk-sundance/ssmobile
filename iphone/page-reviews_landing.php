<?php 

$is_staging = ( sds_my_server() == 'live' ? false : true );
$bv = new BV(
    array(
        'deployment_zone_id' => 'ReadOnly-en_US',
        'product_id' => "SDS-ALL-REVIEWS", // must match ExternalID in the BV product feed
        'cloud_key' => 'sundancespas-486bb392da92b7b9f1e1628eec33b8ae',
        'staging' => $is_staging
        )
    );


get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php locate_template( 'blog-loop.php', true ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>

<script type="text/javascript">                  
$BV.configure("global", { "productId" : "SDS-ALL-REVIEWS" });
$BV.ui( 'rr', 'show_reviews', {
doShowContent : function () {
    // If the container is hidden (such as behind a tab), put code here to make it visible (open the tab).
}
});
function submitGeneric() {
    $BV.ui(
        "rr",
        "submit_generic",
        { "categoryId" : "SDS" }
    );
}
(function($){
	$(window).load(function(){
		$('.bv-write-review').removeAttr( 'onclick' ).bind('click', function(e){
			e.preventDefault();
			submitGeneric();
		});
	});
})(jQuery);
</script>

		<div class="<?php wptouch_post_classes(); ?> page-title-area rounded-corners-8px">

			<h2 role="heading"><?php wptouch_the_title(); ?></h2>

			<?php wp_link_pages( __( 'Pages in the article:', 'wptouch-pro' ), '', 'number' ); ?>

		</div>	
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<?php wptouch_the_content(); ?>
				<button id="submit-review" type="button" onclick="submitGeneric()" class="bigBlueBtn" style="position: absolute; right: 20px; top: 80px; padding: 10px 24px;">Write a Review</button>
	            <div itemscope itemtype="http://schema.org/Product">
	                <meta itemprop="name" content="<?php echo the_title(); ?>" />
	                <div id="BVRRContainer">
	                    <?php echo $bv->reviews->getContent();?>
	                </div>
	            </div>

			</div>
			
					<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Pages", "wptouch-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          

		</div><!-- wptouch_posts_classes() -->

	<?php } ?>
<?php } ?>

<?php get_footer(); ?>