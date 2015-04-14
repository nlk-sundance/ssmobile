<?php

global $tubcats;


?>

<?php get_header(); ?>	



<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	<div class="<?php wptouch_post_classes(); ?> page-title-area rounded-corners-8px">

		<h2 role="heading"><?php wptouch_the_title(); ?></h2>

		<?php wp_link_pages( __( 'Pages in the article:', 'wptouch-pro' ), '', 'number' ); ?>

	</div>	




<?php require( 'style-startup.php' ); ?>




<div id="startupguide" class="container mobile shownav">

	<div class="sg-menu">

		<?php
			/*
			 * Template Part : Startup Guide Nav
			 *
			 */
		?>

		<!-- Series Nav Bar -->
		<nav id="startup-nav-series" class="active">

			<ul class="nav-series">

				<?php foreach ( $tubcats as $s ) { ?>

					<li id="sg-nav-series-<?php echo strtolower(esc_attr($s['name'])); ?>" class="series" series="<?php echo strtolower(esc_attr($s['name'])); ?>">

						<div><span><?php echo strtolower(esc_attr($s['name'])); ?></span> Series Spas</div>

						<ul id="<?php echo strtolower(esc_attr($s['name'])); ?>" class="sub_menu sub_spas">

							<?php foreach ( $s['tubs'] as $t ) { ?>

								<?php $spa_name = esc_attr( str_replace( '&trade;', '', strtolower( esc_attr( $t['name'] ) ) ) ); ?>

								<?php if ( !in_array( $t['id'], array(2151,2157,2159) ) ) { ?>

									<li id="<?php echo $t['id']; ?>" class="sgspa spa-<?php echo $spa_name; ?>"><?php echo $spa_name; ?>
										<span class="chevron chevron-right"></span>
									</li>

								<?php } ?>

							<?php } ?>

						</ul>

					</li>

				<?php } ?>

			</ul>

		</nav>

		<!-- Tub Details Nav Bar -->
		<nav id="startup-nav-spa">

			<ul class="nav-spa">

				<li class="nav-title show-all"><span class="tub-title">All Spas</span><span class="chevron chevron-left"></span></li>

				<li id="show-air-control" class="details">

					<div class="chevron chevron-down"></div>

					<div icon="air-control" class="wrapr">

						<span>Air Control</span>

					</div>

					<div>

						<p>The spa air controls allow you to adjust the amount of air flow going into your jets to create movement and the optimal hydrotherapy session.</p>

						<button show="sg-details-air">

							<div class="chevron chevron-right"></div>

						</button>

					</div>

				</li>

				<li id="show-massage-selector" class="details">

					<div class="chevron chevron-down"></div>

					<div icon="massage-selector" class="wrapr">

						<span>Massage Selector</span>

					</div>

					<div>

						<p>The massage selector allows you to control the direction of the water flow and intensity of your massage for a customized spa experience.</p>

						<button show="sg-details-massage">

							<div class="chevron chevron-right"></div>

						</button>

					</div>

				</li>

				<li id="show-control-panel" class="details">

					<div class="chevron chevron-down"></div>

					<div icon="control-panel" class="wrapr">

						<span>Control Panel</span>

					</div>

					<div>

						<p>The i-Touch<sup>&trade;</sup> Control Panel gives you complete control of your spa at your fingertips. With a convenient backlit LCD display, the i-Touch<sup>&trade;</sup> Control Panel is easy to read at all times.</p>

						<button show="sg-details-panel">

							<div class="chevron chevron-right"></div>

						</button>

					</div>

				</li>

			</ul>

		</nav>

	</div>

	<style type="text/css">
			/* - - - - - LOADER - - - - - */
				#loading-animation {
					background-color: transparent;
					display: none;
					height: 100%;
					min-height: 480px;
					position: absolute;
					top: 0;
					width: 100%;
					z-index: 99;
				}
				.inner-circle {
				    width: 34px;
				    height: 34px;
				    position: absolute;
				    top: 50%;
				    left: 50%;
				    margin-top: -17px;
				    margin-left: -17px;
				    cursor: pointer;
				    border-radius: 999px;
				    border-bottom: 6px solid #002B49;
				    border-bottom: 6px solid rgba(255, 255, 255, 0.33);
				    border-left: 6px solid #fff;
				    border-left: 6px solid rgba(255, 255, 255, 0.66);
				    border-right: 6px solid #002B49;
				    border-right: 6px solid rgba(255, 255, 255, 0.11);
				    border-top: 6px solid #fff;
				    border-top: 6px solid rgba(255, 255, 255, 1.0);
				    background-color: transparent;
				    -webkit-animation-name: rotate;
				    -webkit-animation-duration: 1.5s;
				    -webkit-animation-iteration-count: infinite;
				    -webkit-animation-timing-function: linear;
				    -moz-animation-name: rotate;
				    -moz-animation-duration: 1.5s;
				    -moz-animation-iteration-count: infinite;
				    -moz-animation-timing-function: linear;
				    animation-name: rotate;
				    animation-duration: 1.5s;
				    animation-iteration-count: infinite;
				    animation-timing-function: linear;
				}

				@-webkit-keyframes rotate {
				    from {
				        -webkit-transform: rotate(0deg);
				        -moz-transform: rotate(0deg);
				        transform: rotate(0deg);
				    }
				    to {
				        -webkit-transform: rotate(360deg);
				        -moz-transform: rotate(360deg);
				        transform: rotate(360deg);
				    }
				}
				@-moz-keyframes rotate {
				    from {
				        -webkit-transform: rotate(0deg);
				        -moz-transform: rotate(0deg);
				        transform: rotate(0deg);
				    }
				    to {
				        -webkit-transform: rotate(360deg);
				        -moz-transform: rotate(360deg);
				        transform: rotate(360deg);
				    }
				}
				@keyframes rotate {
				    from {
				        -webkit-transform: rotate(0deg);
				        -moz-transform: rotate(0deg);
				        transform: rotate(0deg);
				    }
				    to {
				        -webkit-transform: rotate(360deg);
				        -moz-transform: rotate(360deg);
				        transform: rotate(360deg);
				    }
				}
				@-webkit-keyframes color {
				    0% {
				        color:#002B49;
				    }
				    50% {
				        color: transparent;
				    }
				    100% {
				        color:#002B49;
				    }
				}
	</style>
	<div id="loading-animation">
		<div class="inner-circle"></div>
	</div>

	<div class="sg-spa-details">

		<div id="sg-spa-container"></div>

	</div>


</div>

<?php } ?>

<?php get_footer(); ?>
