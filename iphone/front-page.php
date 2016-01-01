<?php get_header(); ?>
<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	<div class="<?php wptouch_post_classes(); ?> page-title-area rounded-corners-8px dlform">

		<h2 role="heading">Locate a Dealer</h2>
	<form action="#" method="get" id="dltopform"<?php if (isset($_GET['dlzip'])) echo ' class="zipposted"'; ?>>
	<div id="dlbtn"></div>
	<input type="text" data-role="none" id="dlzip" name="dlzip" value="<?php echo (isset($_GET['dlzip']) ? $_GET['dlzip'] : 'Zip/Postal Code'); ?>" onblur="if(this.value=='') this.value='Zip/Postal Code';" onfocus="if(this.value=='Zip/Postal Code') this.value='';" />
	<input type="submit" data-role="none" value="SEARCH" class="dlsub" />
	</form>
	</div>
	<div id="dlandimg"></div>
    <div id="dlrap"><div id="dlresult"></div></div>
    <style type="text/css">
		#dlandimg {
			background-image: url('http://staging.sundancespas.com/wp-content/wptouch-data/themes/ssmobile/iphone/images/promo/hero12112015.jpg') !important;
		}
	</style>
	<?php
		
			echo '<!-- Coming here -->';
			global $post_ID;;
			$banner_image = get_field('banner-img', $post_ID );
			if($banner_image):
			?>
				<style type="text/css">
					#dlandimg {
					    background-image: url('<?php echo $banner_image; ?>');
					}
				</style>
			<?php
			endif;
	?>
<?php } ?>
<?php get_footer(); ?>