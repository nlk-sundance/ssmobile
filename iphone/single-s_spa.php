<?php get_header(); ?>	

	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post();
		global $post;
		
$custom = get_post_meta($post->ID,'s_info');
$s_info = $custom[0];
		
$custom = get_post_meta($post->ID,'s_specs');
$jht_specs = $custom[0];


$custom = get_post_meta($post->ID,'s_colors');
$jht_colors = $custom[0];
// array(66,68,70...) -> so process it
$o = array();

$args = array( 'numberposts' => -1, 'post_type'=>'s_color', 'include' => $jht_colors, 'orderby' => 'menu_order', 'order' => 'ASC' );
$thesecolors = get_posts($args);

foreach ( $thesecolors as $c ) {
	$o[$c->ID] = $c->post_title;
}

$jht_colors = $o;

$custom = get_post_meta($post->ID,'s_cabs');
$jht_cabs = $custom[0];
// array(66,68,70...) -> so process it
$o = array();

$args = array( 'numberposts' => -1, 'post_type'=>'s_cab', 'include' => $jht_cabs, 'orderby' => 'menu_order', 'order' => 'ASC' );
$thesecolors = get_posts($args);

foreach ( $thesecolors as $c ) {
	$o[$c->ID] = $c->post_title;
}
$jht_cabs = $o;

$custom = get_post_meta($post->ID,'s_jets');
$jht_jets = $custom[0];
$jetcount = 0;
foreach ( $jht_jets as $v ) $jetcount += $v;
		?>

		<div class="post <?php //wptouch_post_classes(); ?> tubtop">

			<div class="tubnum"><?php wptouch_the_title(); ?></div>
            <?php			
			if (class_exists('MultiPostThumbnails')) {
				echo '<div class="tubslides"><div class="tubslide onn">';
				
				MultiPostThumbnails::the_post_thumbnail('s_spa', 'overhead-large', $post->ID, 'overhead-large');
				
				echo '</div><div class="tubslide">';
				
				the_post_thumbnail('background',array( 'class'=>'bannerimg'));
				
				echo '</div><ul id="mdots"><li class="onn"><a href="#"></a></li><li><a href="#"></a></li></ul></div>';
			}
			?>
            <div class="content">
				<h2><?php esc_attr_e($s_info['topheadline']); ?></h2>
				<?php wptouch_the_content(); ?>
            </div>
		</div>
        <ul class="tubinfo">
            <li><strong>Seats:</strong> <?php esc_attr_e($jht_specs['seats']); ?></li>
            <li><strong>PowerPro Jets:</strong> <?php echo absint($jetcount); ?></li>
            <li><strong>Dimensions:</strong> <?php esc_attr_e($jht_specs['dim_us']); ?></li>
            <li><strong>Water Purification System:</strong> <?php echo $jht_specs['wps']; ?></li>
            <li><strong>Spa Volume:</strong> <?php esc_attr_e($jht_specs['vol_us']); ?></li>
        </ul>
        <?php if ( msrp_display() ) : ?>
            <?php
            $msrp = esc_attr($jht_specs['msrp']);
            $msrp = ( $msrp[0] == '$' ? $msrp : '$'.$msrp );
            ?>
            <div class="msrp-button">
                <a id="show-msrp" href="#" class="getpricing" rel="View Suggested Retail Pricing">View Suggested Retail Pricing</a>
            </div>
            <div class="msrp-container" style="display:none;">
                <?php echo '<p class="msrp-price"><span>' . $msrp . '</span> Suggested Retail</p>'; ?>
                <p class="msrp-disclaimer">Prices listed are suggested retail price. Actual retail price may vary based on rebates and/or incentives that may be available at your local dealer. Please request a quote or visit your local dealer for current pricing information.</p>
                <a class="msrp-dealer" href="<?php bloginfo('url'); ?>/hot-tub-dealer-locator/">Find Your Nearest Dealer</a>
                <a class="msrp-pricing" href="<?php bloginfo('url'); ?>/get-a-quote/?tid=<?php echo $post->ID; ?>">Request Pricing from Dealer</a>
            </div>
        <?php endif; ?>
        <div class="moc"><div class="min">
			<div class="lbl">Monthly Operating Cost 60&deg;F / 15&deg;C</div>
            <div class="cost"><?php esc_attr_e($jht_specs['emoc']); ?></div>
        </div></div>
        <ul class="tubinfo">
            <li>Monthly energy costs are estimates based on the results of the California Energy Commissions Portable Hot Tub Testing Protocol. Ambient temperature of 60° F / 15° C and national average of 10 cents per kWh. Actual monthly costs may vary depending on temperature, electricity costs, and usage.</li>
        </ul>
            
        <div class="tubcolors">
        <h3>Shell Colors</h3>
            <ul>
                <?php
                foreach ( $jht_colors as $i => $t ) {
                    echo '<li><span>'. get_the_post_thumbnail( $i, 'swatch-large') .'</span>';
                    echo $t;
                    echo '</li>';
                }
                ?>
            </ul>
            <div class="hr"></div>
            <h3>Cabinet Colors</h3>
            <ul>
                <?php
                foreach ( $jht_cabs as $i => $t ) {
                    echo '<li><span>'. get_the_post_thumbnail( $i, 'swatch-large') .'</span>';
                    echo $t;
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
<?php
	}
get_footer(); ?>