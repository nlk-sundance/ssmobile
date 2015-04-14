				</div><!-- #content -->
					<?php
					/* add Dealer Loc + Hot Tubs + Request + Donwload links here... */
					?>
<a href="/hot-tubs-and-spas/" data-role="none" class="mbtn hottubs"><span class="im"></span><span class="tx">View Hot Tubs</span><span class="ar"></span></a>
<a href="/request-literature/" data-role="none" class="mbtn bro"><span class="im"></span><span class="tx">Free Brochure</span><span class="ar"></span></a>

				<?php do_action( 'wptouch_body_bottom' ); ?>
					
				<div class="<?php wptouch_footer_classes(); ?>">
                <div>Copyright &copy; <?php echo date('Y'); ?> Sundance Spas Inc., All&nbsp;rights&nbsp;reserved</div>
				<?php if ( wptouch_show_switch_link() ) { ?>
                <div><a href="<?php wptouch_the_mobile_switch_link(); ?>">View Full Website</a></div>
                <?php } ?>
					<?php wptouch_footer(); ?>
				</div>
	
				<?php do_action( 'wptouch_advertising_bottom' ); ?>
			</div> <!-- #inner-ajax -->
		</div> <!-- #outer-ajax -->
		<?php // include_once('web-app-bubble.php'); ?>
		<!-- <?php echo 'Built with WPtouch Pro ' . WPTOUCH_VERSION; ?> -->
	</body>
</html>