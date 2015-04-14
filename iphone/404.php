<?php

		global $wp_query;
		
		$template = '404d';
		
		$req = $_SERVER['REQUEST_URI'];
		if ( ( substr($req, -1) != '/' ) && ( strpos($req, '?s_cid=') === false ) ) {
			//wp_redirect($req . '/');
			//exit;
		}
		if ( strpos($req, 'accessories') > 0 ) {
			$unslashed = substr( $req, strrpos( $req, '/', -2)+1, -1 );
			$old_query = $wp_query;
			$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 's_acc_cat',
						'field' => 'slug',
						'terms' => $unslashed,
					)
				)
			);
			$wp_query = new WP_Query( $args );
			if ( $wp_query->post_count > 0 ) {
				$template = get_taxonomy_template();
				status_header(200);
				include($template);
				exit;
			} else {
				$wp_query = $old_query;
			}
		} else {
			$slashcount = substr_count($req, '/');
			if ( in_array($slashcount, array( 2, 3 ) ) ) {
				$old_query = $wp_query;
				$morevars = array( 'page' => 0 );
				if ( $slashcount == 2 ) {
					$ptype = 's_cat';
					//$unslashed = str_replace('/', '', $req);
				} else {
					$ptype = 's_spa';
					//$unslashed = substr( $req, strrpos( $req, '/', -2)+1, -1 );
				}
				$slash2 = strrpos($req, '/');
				$slash1 = strrpos(substr($req,0,$slash2-2), '/')+1;
				$unslashed = substr($req,$slash1, $slash2-$slash1);
				$wp_query = new WP_Query(array('post_type'=>$ptype, 'name'=> $unslashed));
				$morevars[$ptype] = $unslashed;
				
				if ( $wp_query->post_count > 0 ) {
					$wp_query->query_vars = array_merge($morevars, $wp_query->query_vars);
					$morevars['page'] = '';
					$wp_query->query = array_merge($morevars, $wp_query->query);
					
					global $post;
					$post = $wp_query->post;
					$template = locate_template('single-'. $ptype .'.php');
					status_header(200);
					include($template);
//					wp_die('<pre>'. print_r($wp_query,true) .'</pre>');
					exit;
				} else {
					$wp_query = $old_query;
				}
			}
		}
get_header(); ?>	

	<div class="post four-oh-four-title rounded-corners-8px">
		<h2 role="heading"><?php _e( "Page or Post Not Found", "wptouch-pro" ); ?></h2>
	</div>
	
	<div class="post four-oh-four-content rounded-corners-8px">
		<?php wptouch_the_404_message(); ?>
	</div>		

<?php get_footer(); ?>