<?php

	/*
	 * Template Part : Startup Guide
	 * 
	 * Page : Landing
	 *
	 */


		$colors = array(
			'sgtan' => '#F1EBE1',
			'sgtan-hover' => '#F9F5EF',
			'sgtan-border' => '#E6DECE',
			'sgtan-title' => '#A49383',
			'sgblue' => '#445463',
			'sgblue-hover' => '#002B49',
			'sgblue-highlight' => '#206CC5'
			);

?>
<style type="text/css">

	/* - - - - FIXES - - - - */
	nav#startup-nav-series ul li[series="select"],
	nav#startup-nav-series ul li[series="780"],
	nav#startup-nav-series ul li[series="680"] {
		display: none;
	}

	/* end fixes */


	#startupguide.mobile.shownav {
		background-color: #fff;
		background-position: 50% 0;
	}
	.sg-menu,
	.nav-control-panel {
		background-color: transparent;
		background-image: url("<?php echo get_bloginfo('url'); ?>/wp-content/themes/sundance/images/startup/sg-landing.png");
		background-size: cover;
		box-sizing: border-box;
		display: block;
		margin: 0;
		padding: 0;
		width: 100%;
		z-index: 2;
	}
	.sg-nav nav {
		color: #fff;
		display: block;
		left: 0;
		top: 0;
		width: 100%;
	}

	.sg-spa-details {
		background-color: #fff;
		position: relative;
		width: 100%;
		z-index: 1;
	}

	/* - - - - - ICONS - - - - - */
		[icon="lt"]:before,
		[icon] span:before {
			background: url("<?php echo get_bloginfo('url'); ?>/wp-content/themes/sundance/images/startup/mobile-iconset.png") no-repeat 0 0;
			content: "";
			display: inline-block;
			float: left;
			height: 36px;
			margin-right: 10px;
			width: 36px;
		}
		[icon] span:before {
			margin-left: 12px;
			margin-top: -5px;
		}
		.nav-control-panel div[icon] span:before {
			background: url("<?php echo get_bloginfo('url'); ?>/wp-content/themes/sundance/images/startup/mobile-cp-iconset.png") no-repeat 0 0;
			content: "";
			display: inline-block;
			float: left;
			height: 36px;
			margin-right: 10px;
			width: 36px;
		}
		[icon="air-control"] span:before {
			background-position: -2px -26px;
			height: 27px;
		}
		[icon="massage-selector"] span:before {
			background-position: -40px -24px;
		}
		[icon="control-panel"] span:before {
			background-position: -2px -60px;
		}
		.nav-control-panel div[icon="cp-jets"] span:before {
			background-position: -2px 0px;
		}
		.nav-control-panel div[icon="cp-temp"] span:before {
			background-position: -2px -40px;
		}
		.nav-control-panel div[icon="cp-light"] span:before {
			background-position: -2px -76px;
		}
		.nav-control-panel div[icon="cp-setting"] span:before {
			background-position: -2px -115px;
		}
		/*
		li.details [icon] span:after {
			background: url("http://local.sundance/wp-content/themes/sundance/images/startup/mobile-iconset.png") no-repeat -63px 0px;
			content: "";
			display: inline-block;
			float: right;
			height: 22px;
			margin-right: 20px;
			margin-top: 0px;
			width: 36px;
		}
		li.details.active [icon] span:after {
			background: url("<?php echo get_bloginfo('url'); ?>/wp-content/themes/sundance/images/startup/mobile-iconset.png") no-repeat -19px 0px;
		}
		*/
		[icon="lt"]:before {
			background: url("<?php echo get_bloginfo('url'); ?>/wp-content/themes/sundance/images/startup/lt.png") no-repeat 0 0;
			height: 13px;
			margin-bottom: -1px;
			margin-left: 0px;
			margin-right: 10px;
			width: 8px;
		}

	/* - - - - - LEFT MENU - - - - - */

		/* menu <li> base styles */

			#startup-nav-spa {
				display: none;
			}
			#startup-nav-series ul.sub_menu {
				height: 0px;
				overflow: hidden;
			}
			#startup-nav-series.active,
			#startup-nav-spa.active {
				display: block;
				z-index: 99;
			}

			#startup-nav-series ul li.series,
			#startup-nav-spa ul li,
			.nav-control-panel li {
				background-color: transparent;
				border-bottom: 1px solid rgba(255,255,255,0.15);
				box-sizing: border-box;
				color: #fff;
				display: block;
				height: 78px;
				overflow: hidden;
				text-transform: uppercase;
				width: 100%;
			}
			#startup-nav-series ul li.series.active,
			#startup-nav-spa ul li.active,
			.nav-control-panel li.active {
				height: auto;
			}


		/* menu series */

			#startup-nav-series ul li.series,
			.nav-control-panel li {
				color: #fff;
				cursor: pointer;
				font: 20px/28px "AM", Tahoma, sans-serif;
				margin: 0;
				padding: 0;
			}
			#startup-nav-series ul li.series div {
				box-sizing: border-box;
				margin: 0;
				padding: 28px 0 18px;
				text-align: center;
				width: 100%;
				-webkit-transition: background-color .35s;
				transition: background-color .35s;
			}
			
			#startup-nav-series ul li.series span,
			.nav-control-panel li span {
				font: 28px/28px "AL", Tahoma, sans-serif;
			}
			
			#startup-nav-series ul li.series.active div,
			#startup-nav-series ul li.series ul.sub_menu li.active {
				background-color: rgba(255,255,255,0.10);
			}
			#startup-nav-series ul li.series.active div,
			#startup-nav-series ul li.series.active ul.sub_menu li {
				border-bottom: 1px solid rgba(255,255,255,0.15);
			}
			#startup-nav-series ul li.series.active ul.sub_menu {
				display: block;
				height: auto;
			}
			#startup-nav-series ul.sub_menu li {
				box-sizing: border-box;
				display: block;
				padding: 28px 0 18px 20px;
				position: relative;
				text-align: left;
				width: 100%;
			}
			/*
			#startup-nav-series ul.sub_menu li.sgspa:after {
				background: url("http://local.sundance/wp-content/themes/sundance/images/startup/mobile-iconset.png") no-repeat -78px -24px;
				content: '';
				display: block;
				float: right;
				height: 34px;
				margin-right: 20px;
				margin-top: 20px;
				position: absolute;
				right: 0;
				top: 0; 
				width: 22px;
			}
			*/
			#startup-nav-series ul.sub_menu li .chevron,
			.nav-control-panel li .chevron {
				margin-right: 20px;
				margin-top: 28px;
				position: absolute;
				right: 0;
				top: 0;
			}

			.nav-control-panel li.details div p {
				margin-bottom: 20px !important;
			}

			

		/* menu spa details <li>\'s and spans */

			#startup-nav-spa ul li.show-all {
				cursor: pointer;
			}

			#startup-nav-spa ul li {
				box-sizing: border-box;
				font: 20px/28px "AM", Tahoma, sans-serif;
				margin: 0;
				overflow: hidden;
			}
			#startup-nav-spa ul li.active,
			.nav-control-panel li.active {
				height: auto;
			}
			#startup-nav-spa ul li.nav-title {
				background-color: rgba(255,255,255,0.10);
				font-family: "AL";
				font-size: 30px;
				letter-spacing: 2px;
				padding: 28px 0 18px;
				position: relative;
				text-align: center;
				text-transform: uppercase;
			}
			#startup-nav-spa ul li.nav-title .chevron,
			#startupguide section.sg-details h4.goback .chevron {
				left: 0;
				margin-left: 26px;
				margin-top: 30px;
				position: absolute;
				top: 0;
			}
			/*
			#startup-nav-spa ul li.nav-title:before {
				background: url("http://local.sundance/wp-content/themes/sundance/images/startup/mobile-iconset.png") no-repeat 0px 0px;
				content: '';
				display: block;
				float: left;
				height: 26px;
				margin-left: 20px;
				position: absolute;
				width: 17px;
			}
			*/
			#startup-nav-spa ul li.details,
			.nav-control-panel li.details {
				position: relative;
			}
			#startup-nav-spa ul li.details .chevron,
			.nav-control-panel li .chevron {
				position: absolute;
				margin-right: 20px;
				margin-top: 26px;
				right: 0;
				top: 0;
			}
			#startup-nav-spa ul li.details div.wrapr,
			.nav-control-panel li.details div.wrapr {
				box-sizing: border-box;
				cursor: pointer;
				height: 78px;
				padding: 28px 0 18px;
				width: 100%;
			}
			#startup-nav-spa ul li.details div.wrapr span,
			.nav-control-panel li.details div.wrapr span {
				text-transform: uppercase;
			}
			
			#startup-nav-spa ul li.details div p,
			.nav-control-panel li.details div p {
				font: 13px/20px Verdana, sans-serif;
				margin: 0;
				padding: 0 20px;
			}

			#startup-nav-spa ul li.details button {
				background-color: transparent;
				border: 1px solid #fff;
				border-radius: 99px;
				box-sizing: border-box;
				color: transparent;
				cursor: pointer;
				height: 75px;
				margin: 20px 20px;
				padding: 0;
				position: relative;
				text-align: center;
				text-transform: uppercase;
				width: 75px;
			}
			#startup-nav-spa ul li.details button .chevron {
				left: 24px;
				position: absolute;
			}

	/* - - - - - SERIES GRID - - - - - */
		/* series landing */
		.sgseries {
			box-sizing: border-box;
			display: none;
			padding: 20px;
			position: relative;
			top: 0;
			width: 100%;
		}
		.sgseries.active {
			display: block;
		}
		.sgspa {
			display: inline-block;
			float: left;
			position: relative;
			text-align: center;
		}
		.sgspa img {
			display: none;
		}
		.sgspa h6 {
			color: #786C5F !important;
			font: 18px/24px Tahoma, sans-serif !important;
			margin: 10px 0 18px;
			text-align: center;
		}
		.sgspa:hover h6 {
			color: <?php echo $colors['sgblue-highlight']; ?> !important;
		}
		.sgspa a {
			background-color: rgb(245, 245, 245);
			background-color: rgba(245, 245, 245, .9);
			border-radius: 8px;
			box-shadow: 0px 0px 12px rgba(0,0,0,.5);
			color: #206CC5;
			cursor: pointer;
			display: block;
			font: 14px/30px "AM", sans-serif;
			height: 27px;
			left: 50%;
			margin-top: -27px;
			margin-left: -50px;
			opacity: 0;
			position: absolute;
			text-decoration: none;
			top: 80px;
			width: 100px;
			-webkit-transition: opacity .35s;
			transition: opacity .35s;
		}
		.sgspa:hover a {
			opacity: 1;
			text-decoration: none;
		}

	/* - - - - - DETAILS - - - - - */

		
		#startupguide section.sg-details {
			display: none;
		}
		#startupguide section.sg-details.active {
			display: block;
		}
		#startupguide section.sg-details h4.goback {
			background-color: <?php echo $colors['sgblue']; ?>;
			color: #fff;
			cursor: pointer;
			display: block;
			font: 200 16px "AL", sans-serif;
			font-family: "AL";
			font-size: 30px;
			letter-spacing: 2px;
			margin: 0;
			padding: 24px 0 18px;
			position: relative;
			text-align: center;
			text-transform: uppercase;
			z-index: 9;
		}
		/*
		#startupguide section.sg-details h4:before {
			background: url("http://local.sundance/wp-content/themes/sundance/images/startup/mobile-iconset.png") no-repeat 0px 0px;
			content: '';
			display: block;
			float: left;
			height: 26px;
			margin-left: 20px;
			position: absolute;
			width: 17px;
		}
		*/
		#startupguide #sg-details-landing {
			display: none;
		}
		
		/* air controls section */
			#startupguide #sg-details-air {
				padding: 0;
				position: relative;
			}
			#sg-air-landing-container {
				padding: 0;
			}
			#sg-air-overhead {
				position: relative;
				width: 100%;
				margin: auto;
			}
			#sg-air-overhead img {
				width: 100%;
			}
			#sg-air-overhead img.sg-air-overhead {
				left: 0;
				position: relative;
				top: 0;
			}
			#sg-air-overhead img.sg-air-overhead-selectables,
			#sg-air-overhead img.sg-air-layer {
				position: absolute;
				left: 0;
				top: 0;
			}
			#sg-air-overhead img.sg-air-layer {
				display: none;
			}
			#sg-air-overhead img.sg-air-layer.active,
			#sg-air-overhead img.sg-air-layer.over {
				display: block;
				z-index: 7;
			}
			#sg-air-overhead a.sg-air-anchor {
				background-color: transparent;
				cursor: pointer;
				height: 9%;
				position: absolute;
				width: 10%;
				z-index: 9;
			}

		/* massage controls section */
			#startupguide #sg-details-massage {
				padding: 0;
				position: relative;
			}
			#sg-massage-landing-container {
				padding: 0;
			}
			#sg-massage-overhead {
				position: relative;
				width: 100%;
				margin: auto;
				margin-top: -8%;
			}
			#sg-massage-overhead img {
				width: 100%;
			}
			#sg-massage-overhead img.sg-massage-overhead {
				left: 0;
				position: relative;
				top: 0;
			}
			#sg-massage-overhead img.sg-massage-overhead-selectables,
			#sg-massage-overhead img.sg-massage-layer {
				position: absolute;
				left: 0;
				top: 0;
			}
			#sg-massage-overhead img.sg-massage-layer {
				display: none;
			}
			#sg-massage-overhead img.sg-massage-layer.active,
			#sg-massage-overhead img.sg-massage-layer.over {
				display: block;
				z-index: 7;
			}
			#sg-massage-overhead a.sg-massage-anchor {
				background-color: transparent;
				cursor: pointer;
				height: 10%;
				position: absolute;
				width: 10%;
				z-index: 9;
			}
			#sg-massage-top-bar {
				background-color: <?php echo $colors['sgblue']; ?>;
				box-sizing: border-box;
				height: 110px;
				padding: 48px 20px;
				position: relative;
				width: 100%;
				z-index: 11;
			}
			#sg-massage-slider {
				background-image: none;
				background-color: #C4C8CD;
				border: none;
				display: inline-block;
				float: left;
				height: 4px;
				margin-left: 5%;
				margin-top: 3px;
				width: 90%;
			}
			#sg-massage-slider a {
				background-color: #445463;
				background-image: none;
				border: none;
				border-radius: 99px;
				margin-top: -4px;
			}


		/* control panel section landing */
			#startupguide #sg-details-panel {
				padding: 0;
				position: relative;
			}

		/* CP landing page */
			#startupguide #sg-panel-landing-container {
				min-height: 740px;
				margin: 0;
				overflow: hidden;
				padding: 0;
				position: relative;
				width: 100%;
				z-index: 9;
			}
			#startupguide #sg-panel-landing-container.active {
				display: block;
			}
			#startupguide #sg-panel-landing-container img {
				height: auto;
				left: 0;
				margin: 0;
				padding: 0;
				position: relative;
				top: 0;
				width: 100%;
			}
			#startupguide #sg-panel-landing-container button#sg-panel-explore-jets {
				background-color: transparent;
				background-image: url("<?php echo get_template_directory_uri(); ?>/images/startup/sg-explore-jets-btn.png");
				background-position: 0 0;
				border: none;
				cursor: pointer;
				height: 49px;
				left: 50%;
				margin-left: -122px;
				position: absolute;
				top: 440px;
				width: 243px;
			}
			#startupguide #sg-panel-landing-container button#sg-panel-explore-jets:hover {
				background-position: 0 -49px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar {
				background-color: <?php echo $colors['sgblue']; ?>;
				box-sizing: border-box;
				color: #fff;
				float: right;
				height: 100%;
				height: calc(100% - 1px);
				min-height: 740px;
				opacity: .935;
				padding: 0;
				position: absolute;
				right: 0;
				top: 0;
				width: 220px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar.closed {
				white-space: nowrap;
				width: 40px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar.closed > div h3:after {
				display: none;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div {
				border-bottom: 1px solid #66737F;
				border-bottom: 1px solid rgba(255, 255, 255, .15);
				box-sizing: border-box;
				cursor: pointer;
				height: 50px;
				min-height: 50px;
				overflow: hidden;
				padding: 10px;
				position: relative;
				width: 100%;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div.active {
				height: auto;
				min-height: 50px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div h3:before {
				background-image: url("<?php echo get_template_directory_uri(); ?>/images/startup/sg-cp-rightbar.png");
				background-repeat: no-repeat;
				content: '';
				display: block;
				float: left;
				height: 24px;
				margin-right: 10px;
				width: 24px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div#sg-panel-landing-rightbar-openclose:before {
				background-image: url("<?php echo get_template_directory_uri(); ?>/images/startup/sg-cp-rightbar.png");
				background-position: -16px 0;
				background-repeat: no-repeat;
				content: '';
				display: block;
				float: right;
				height: 13px;
				margin: 10px 2px 0 0;
				width: 8px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar.closed > div#sg-panel-landing-rightbar-openclose:before {
				background-position: 0 0;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div#sg-panel-landing-rightbar-temp h3:before {
				background-position: 0 -16px;
				height: 23px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div#sg-panel-landing-rightbar-lighting h3:before {
				background-position: 0 -40px;
				height: 25px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div#sg-panel-landing-rightbar-setting h3:before {
				background-position: 0 -66px;
				height: 22px;
			}

			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div h3 {
				font: 15px/30px "AM", sans-serif;
				margin-top: 3px;
				text-transform: uppercase;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div h3:after {
				background-image: url("<?php echo get_template_directory_uri(); ?>/images/startup/sg-cp-rightbar-oc.png");
				background-repeat: no-repeat;
				background-position: 0 0;
				content: '';
				display: block;
				height: 6px;
				position: absolute;
				right: 10px;
				top: 22px;
				width: 11px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div:hover h3:after {
				background-position: 0 -6px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div.active h3:after {
				background-position: 0 -12px;
			}
			#startupguide #sg-panel-landing-container #sg-panel-landing-rightbar > div p {
				font: 13px/20px Verdana, sans-serif;
				padding: 8px 10px;
			}

		/* CP Overhead page */
			#startupguide #sg-panel-overhead-container {
				display: none;
				position: relative;
			}
			#startupguide #sg-panel-overhead-container.active {
				display: block;
			}

		/* CP details - top bar */
			#sg-panel-top-bar {
				margin: auto;
				max-width: 386px;
			}
			#startupguide #sg-details-panel #sg-panel-overhead-container #sg-panel-top-bar button {
				background-color: transparent;
				background-image: url("<?php echo get_bloginfo('url'); ?>/wp-content/themes/sundance/images/startup/sg-control-panel.png");
				border: none;
				cursor: pointer;
				display: inline-block;
				height: 40px;
				margin: 10px 0px;
				padding: 0;
				width: 106px;
			}
			#sg-btn-jets { background-position: -106px 0; }
			#sg-btn-jets.active { background-position: 0 0; }

			#sg-btn-bubbles { background-position: -106px -40px; }
			#sg-btn-bubbles.active { background-position: 0 -40px; }

			#sg-btn-bubbles2 { background-position: -106px -80px; }
			#sg-btn-bubbles2.active { background-position: 0 -80px; }

		/* CP details - spa overhead */
			#startupguide #sg-details-panel #sg-panel-overhead-container #sg-panel-overhead {
				position: relative;
			}

			#startupguide #sg-details-panel #sg-panel-overhead-container #sg-panel-overhead img {
				position: relative;
				width: 100%;
			}
			#startupguide #sg-details-panel #sg-panel-overhead-container #sg-panel-overhead img.sg-layer {
				display: none;
				left: 0;
				position: absolute;
				top: 0;
			}


</style>
<style><?php include_once('style-startup-anchors.css'); ?></style>