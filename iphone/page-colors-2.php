<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php locate_template( 'blog-loop.php', true ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		<div class="<?php wptouch_post_classes(); ?> page-title-area rounded-corners-8px">

			<h2 role="heading"><?php wptouch_the_title(); ?></h2>

			<?php wp_link_pages( __( 'Pages in the article:', 'wptouch-pro' ), '', 'number' ); ?>

		</div>	
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<?php get_template_part( 'color', 'selector-mobile' );  ?>
			</div>
			
					<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Pages", "wptouch-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          

		</div><!-- wptouch_posts_classes() -->

	<?php } ?>
<?php } ?>

<?php get_footer(); ?>
