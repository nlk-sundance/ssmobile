<?php

wp_enqueue_script('jquery-ui-accordion');
//wp_enqueue_style('jquery-ui', get_bloginfo('stylesheet_directory') .'/jquery-ui/custom.min.css');

get_header(); ?>	

	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		
        <div class="cathdr">
        <div class="txt"><h2>Experience the<br />Sundance Difference</h2></div>
        </div>
        
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px cats">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<?php //wptouch_the_content(); ?>
                    	<?php
						global $post;
						//global $tubcats;
						$tubcats = get_transient( 's_tubcats' );
						if ( $post->ID == 1894 ) { // HOT TUBS landing page
						//echo '<pre>'. print_r($tubcats,true) .'</pre>';
							// only loop through main cats (for now?)
							foreach ( $tubcats as $k => $c ) {
									?>
                            <h3 role="heading"><?php echo $c['name']; ?> Series<span class="tm">&trade;</span> Spas</h3>
                            <?php
							echo '<div>';
								$tubs = $c['tubs'];
								
							if ( count($tubs) > 0 ) {
								$cat_tubs = sundance_grouptubs($tubs);
								//echo '<pre>'. print_r($cat_tubs,true) .'</pre>';
								foreach ( $cat_tubs as $s => $r ) {
									echo '<h4 class="tubsize">'. esc_attr($s) .' Spas</h4>';
									echo '<ul class="tubs">';
									foreach ( $r as $i => $t ) {
										if ( is_array($t) ) {
									echo '<li class="tub">';
							?>
								
									<a href="<?php echo get_permalink($t['id']); ?>"><?php
									echo '<span class="tubThumb ' . preg_replace('/\s/', '', strtolower(esc_attr(str_replace('®', '', $t['name'])))) . '"></span>';
									esc_attr_e($t['name']); ?></a>
                                    <div class="spx">
                                    Seats: <?php esc_attr_e($t['seats']) ?><br />
									Jets: <?php echo absint($t['jets']) ?>
                                    </div>
							<?php
								echo '</li>';
										}
								}
								echo '</ul>';
								}
							}
							echo '</div>';
						}
						} else {
							?>
                            <h3 role="heading"><?php wptouch_the_title(); ?> Series<span class="tm">&trade;</span> Spas</h3>
                            <?php
							echo '<div><ul class="tubs">';
							/*
							if ( $post->post_parent ) {
								$tubs = $tubcats[$post->post_parent]['subcats'][$post->ID]['tubs'];
							} else {
							*/
								$tubs = $tubcats[$post->ID]['tubs'];
							//}
							
							if ( count($tubs) > 0 ) {
								$cat_tubs = sundance_grouptubs($tubs);
								//echo '<pre>'. print_r($cat_tubs,true) .'</pre>';
								foreach ( $cat_tubs as $s => $r ) {
									echo '<h4 class="tubsize">'. esc_attr($s) .' Spas</h4>';
									echo '<ul class="tubs">';
									foreach ( $r as $i => $t ) {
										if ( is_array($t) ) {
									echo '<li class="tub">';
							?>
								
									<a href="<?php echo get_permalink($t['id']); ?>"><?php
									echo '<span class="tubThumb ' . preg_replace('/\s/', '', strtolower(esc_attr(str_replace('®', '', $t['name'])))) . '"></span>';
									esc_attr_e($t['name']); ?></a>
                                    <div class="spx">
                                    Seats: <?php esc_attr_e($t['seats']) ?><br />
									Jets: <?php echo absint($t['jets']) ?>
                                    </div>
							<?php
								echo '</li>';
										}
								}
								echo '</ul>';
								}
							}
							echo '</ul></div>';
						} ?>

			</div>
		</div><!-- wptouch_posts_classes() -->

		<?php } ?>

<?php get_footer(); ?>