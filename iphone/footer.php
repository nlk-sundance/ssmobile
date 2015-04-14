				</div><!-- #content --><?php
					/* add Dealer Loc + Hot Tubs + Request + Donwload links here... */
					/* CURRENT PROMO?? */
?>
<?php /* <div id="promo"><img src="<?php bloginfo('template_url'); ?>/images/promo/mobile-promo.jpg" alt="Current Promotion" /></div> */ ?>
<?php
					if ( !is_front_page()) {
					?>
<div class="mdloc">
    <div class="im"></div>
    <form action="<?php echo trailingslashit(get_bloginfo('url')) .'mobile-dealer-locator/'; ?>" method="get" id="dlfform">
        <div class="tx">Locate a Dealer</div>
        <input type="text" data-role="none" id="dlzip" name="dlzip" value="Zip/Postal Code" onblur="if(this.value=='') this.value='Zip/Postal Code';" onfocus="if(this.value=='Zip/Postal Code') this.value='';" />
        <input type="submit" value="VIEW" class="dlsub" data-role="none" />
	</form>
</div>
<?php }
if ( !is_page(array('get-a-quote', 'request-literature'))) {
?>
<a href="/hot-tubs-and-spas/" data-role="none" class="mbtn hottubs"><span class="im"></span><span class="tx">View Hot Tubs</span><span class="ar"></span></a>
<a href="/get-a-quote/" data-role="none" class="mbtn quo"><span class="im"></span><span class="tx">Get Pricing</span><span class="ar"></span></a>
<a href="/request-literature/" data-role="none" class="mbtn bro"><span class="im"></span><span class="tx">Free Brochure</span><span class="ar"></span></a>
<?php } ?>

				<?php do_action( 'wptouch_body_bottom' ); ?>
						
				<div class="<?php wptouch_footer_classes(); ?>">
                <div>Copyright &copy;<?php echo date('Y'); ?> Sundance Spas Inc., All&nbsp;rights&nbsp;reserved</div>
				<?php if ( wptouch_show_switch_link() ) { ?>
                <div><a href="<?php wptouch_the_mobile_switch_link(); ?>">View Full Website</a></div>
                <?php } ?>
					<?php wptouch_footer(); ?>
				</div>
	
				<?php do_action( 'wptouch_advertising_bottom' ); ?>
			</div> <!-- #inner-ajax -->
		</div> <!-- #outer-ajax -->
		<?php // include_once('../../../private/var/folders/5s/hfqw0tvn5k70swhg64fydljr0000gn/T/com.blackpixel.versions/web-app-bubble.php'); ?>
		<!-- <?php echo 'Built with WPtouch Pro ' . WPTOUCH_VERSION; ?> -->
	</body>
</html>