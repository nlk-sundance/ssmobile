<?php

// Color Selector For Sundance

?>
<style>
.color-selector.color-selector-container { xheight: 600px; margin-top: 1px; width: 100%; }
.color-selector.color-selector-container .color-selector-wrapper { margin: auto; width: 100%; }
.color-selector.color-selector-container .color-selector-wrapper .left { box-sizing: border-box; xfloat: left; xheight: 400px; margin-right: 45px; text-align: center; width: 100%; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-container { margin-top: 30px; height: 280px; overflow: visible; position: relative; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-container div { xposition: absolute; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-container .tub-skirt img { z-index: 1; height: auto !important; left: 0; opacity: 0; position: absolute; top: 18px; width: 450px; -webkit-transition: opacity .05s; transition: opacity .05s; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-container .tub-shell img { z-index: 2; height: auto !important; left: 0; opacity: 0; position: absolute; top: 0; width: 450px; -webkit-transition: opacity .05s; transition: opacity .05s; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-container img.active { opacity: 1; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-details {font-family: "GSL"; margin-top: 14px; padding-left: 10px; text-align: left; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-details h3 { font-size: 13px; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-details h3 strong { font-family: "GSBQ"; font-weight: 700; }
.color-selector.color-selector-container .color-selector-wrapper .left .tub-details li { font-size: 13px; font-weight: 700; margin-left: 17px; }
.color-selector.color-selector-container .color-selector-wrapper .right { box-sizing: border-box; xfloat: left; xheight: 400px; padding-top: 22px; width: 100%; }
.color-selector.color-selector-container .color-selector-wrapper .right h2 { font-size: 16px; letter-spacing: .75px; margin: 24px 5px 10px; text-transform: none; }
.color-selector.color-selector-container .color-selector-wrapper .right h2 span { font-family: "GSL"; font-weight: 700; }
.color-selector.color-selector-container .color-selector-wrapper .right .btn { margin-top: 34px; text-transform: uppercase; }
.color-selector.color-selector-container .color-selector-wrapper .right .pdf-download { color: #414141; font: 400 16px/40px "GSL"; }
.color-selector.color-selector-container .color-selector-wrapper .thumb { border: 2px solid #fff; border-radius: 0px; cursor: pointer; display: inline-block; margin: 2px 3px; overflow: hidden; -webkit-transition: border-color .05s; transition: border-color .05s; }
.color-selector.color-selector-container .color-selector-wrapper .thumb.active,
.color-selector.color-selector-container .color-selector-wrapper .thumb:hover { border: 2px solid #666; box-shadow: 0px 0px 6px rgba(0,0,0,.25);  }
.color-selector.color-selector-container .color-selector-wrapper .thumb img { border: 2px solid #fff; border-radius: 0px; display: block; height: 50px; width: 50px; }
/* styles for when modal */
.color-selector-modal-bg { background-color: rgba(0,0,0,.66); height: 100%; left: 0; position: fixed; top: 0; width: 100%; z-index: 999; }
.color-selector-modal { background-color: #fff; margin: 55px auto; width: 1020px; }
.color-selector-modal-title { background-color: #000; position: relative; width: 100%; }
.color-selector-modal-title h2 { color: #fff; font: 700 24px/84px "AL"; letter-spacing: 1px; margin: 40px; }
.color-selector-modal-title span { position: absolute; right: 36px; top: 36px; }
.color-selector-modal-title span a { color: #fff; cursor: pointer; font: 700 16px "AL"; }
.color-selector-modal-title span a:after { border: 1px solid #fff; content: 'x'; display: inline-block; height: 7px; line-height: 5px; margin-left: 8px; padding: 2px; }
.color-selector-modal .hidemodal { display: none !important;}

div[timg="platinum"] img { background-color: #d4d7d7; }
div[timg="silverpearl"] img { background-color: #e5e4de; }
div[timg="monaco"] img { background-color: #887e78; }
div[timg="midnight"] img { background-color: #242426; }
div[timg="opal"] img { background-color: #d3d5d7; }
div[timg="sahara"] img { background-color: #c5c4c2; }
div[timg="sand"] img { background-color: #bca792; }
div[timg="desertsand"] img { background-color: #726151; }
div[timg="caribbeansurf"] img { background-color: #0090b8; }
div[timg="slategreen"] img { background-color: #39565a; }
div[timg="brazilianteak"] img { background-color: #be9969; }
div[timg="roastedchestnut"] img { background-color: #47312c; }
div[timg="silverwood"] img { background-color: #635e5f; }

.color-selector-wrapper .bigBlueBtn {
		font: 400 16px/22px 'AH', Helvetica, Geneva, arial, sans-serif;
		text-transform: uppercase;
		text-decoration: none;
		color: #fff;
		letter-spacing: 1px;
		cursor: pointer;
		text-align: center;
		text-shadow: 1px 1px 1px #018EA1, -1px -1px 1px #017C8C, 0px 0px 2px #fff;
		display: block;
		border: 1px solid #fff;
		border-radius: 8px;
		box-shadow: 3px 3px 6px #444;
		background: rgb(1,142,161); /* Old browsers */
		background: -moz-linear-gradient(top,  rgba(1,142,161,1) 0%, rgba(1,142,161,1) 50%, rgba(1,124,140,1) 51%, rgba(1,124,140,1) 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(1,142,161,1)), color-stop(50%,rgba(1,142,161,1)), color-stop(51%,rgba(1,124,140,1)), color-stop(100%,rgba(1,124,140,1))); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  rgba(1,142,161,1) 0%,rgba(1,142,161,1) 50%,rgba(1,124,140,1) 51%,rgba(1,124,140,1) 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  rgba(1,142,161,1) 0%,rgba(1,142,161,1) 50%,rgba(1,124,140,1) 51%,rgba(1,124,140,1) 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  rgba(1,142,161,1) 0%,rgba(1,142,161,1) 50%,rgba(1,124,140,1) 51%,rgba(1,124,140,1) 100%); /* IE10+ */
		background: linear-gradient(to bottom,  rgba(1,142,161,1) 0%,rgba(1,142,161,1) 50%,rgba(1,124,140,1) 51%,rgba(1,124,140,1) 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#018ea1', endColorstr='#017c8c',GradientType=0 ); /* IE6-9 */

		-webkit-transition: all 0.5s;
	    -moz-transition: all 0.5s;
	    -o-transition: all 0.5s;
	    transition: all 0.5s;
	}
	
.color-selector-wrapper .bigBlueBtn:hover {
		background: rgb(1,121,137); /* Old browsers */
	background: -moz-linear-gradient(top,  rgba(1,121,137,1) 0%, rgba(1,121,137,1) 50%, rgba(1,105,119,1) 51%, rgba(1,105,119,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(1,121,137,1)), color-stop(50%,rgba(1,121,137,1)), color-stop(51%,rgba(1,105,119,1)), color-stop(100%,rgba(1,105,119,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba(1,121,137,1) 0%,rgba(1,121,137,1) 50%,rgba(1,105,119,1) 51%,rgba(1,105,119,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba(1,121,137,1) 0%,rgba(1,121,137,1) 50%,rgba(1,105,119,1) 51%,rgba(1,105,119,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba(1,121,137,1) 0%,rgba(1,121,137,1) 50%,rgba(1,105,119,1) 51%,rgba(1,105,119,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom,  rgba(1,121,137,1) 0%,rgba(1,121,137,1) 50%,rgba(1,105,119,1) 51%,rgba(1,105,119,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#017989', endColorstr='#016977',GradientType=0 ); /* IE6-9 */


		-webkit-transition: all 0.5s;
	    -moz-transition: all 0.5s;
	    -o-transition: all 0.5s;
	    transition: all 0.5s;
}


.color-selector-wrapper a.btn.bigBlueBtn
{
	border: 0px solid #FFF;
	color: #FFF;
	padding: 10px 0px;
	width: 280px;
	text-decoration: none;
	margin-bottom: 20px;
	display: block;
}


.color-selector-wrapper .tub-details ul
{
	margin-left: 0px;
	padding-left: 0px;
}

.color-selector-wrapper .tub-details ul li, .color-selector-wrapper .tub-details p
{
	font-family: "Verdana";
	font-size: 12px;
	line-height: 15px;
	font-style: italic;
	list-style: none;	
	font-weight: normal;
}

.color-selector.color-selector-container .color-selector-wrapper .right h2
{
	color: #786c5f;
	font-weight: normal;
    font-family: "AR";
    font-size: 26px;
}	

.color-selector-wrapper .right h2 strong
{
	color: #786c5f;
	text-transform: uppercase;
	font-weight: normal;
    font-family: "AH";
    font-size: 26px;
}

.color-selector.color-selector-container .color-selector-wrapper .right .pdf-download
{
	font-size: 21px;
	line-height: 26px;
	margin-top: 25px;
	text-decoration: underline;
	color: #786c5f;
	font-family: Verdana;
	font-weight: bold;
	margin-bottom: 30px;
}

.color-selector-wrapper h1.color-heading 
{
	font-size: 24px;
	line-height: 28px;
	margin-top: 25px;
	color: #786c5f;
	font-family: "AL";
}


.color-selector-wrapper .tub-details p
{
	font-size: 13px;
	line-height: 18px;
	margin-top: 25px;
	font-style: italic;
	color: #786c5f;
	font-family: "Verdana";
	margin-bottom: 25px;
}

@media only screen  
and (max-width : 450px)  
{
	.color-selector.color-selector-container .color-selector-wrapper .left .tub-container { margin-top: 30px; height: 180px; overflow: visible; position: relative; }	
}

</style>
<div class="color-selector color-selector-container">

	<div class="color-selector-wrapper">
		<h1 class="color-heading hidemodal">Hot Tub Color Selector</h1>
		<div class="left">

			<div class="tub-container">
				<div class="tub-skirt">
					<img class="active" src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/skirts/skirt-coastal.png" timg="coastal" height="313" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/skirts/skirt-mahogny.png" timg="mahogny" height="313" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/skirts/skirt-autumnwall.png" timg="autumnwall" height="313" width="576" />
				</div>
				<div class="tub-shell">
					<img class="active" src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/celestite.png" timg="celestite" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/platinum.png" timg="platinum" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/oyester.png" timg="oyester" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/sahara.png" timg="sahara" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/sand.png" timg="sand" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/coppersand.png" timg="coppersand" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/midnight.png" timg="midnight" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/monaco.png" timg="monaco" height="137" width="576" />
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/carribeansurf.png" timg="carribeansurf" height="137" width="576" />
				</div>
			</div>
			<div class="tub-details">
				<p>*Cameo&trade; model shown for visualization purposes only. Tub size and jet placement will vary by model. Not all colors available in all models. See individual product pages for available colors.</p>
			</div>

		</div>
		
		<div class="right">

			<h2><strong>Shell:</strong> <span class="shell-name"></span></h2>
			<div class="shells">
				<div class="shell thumb active" timg="celestite" data-pdf="celestite" rel="Celestite" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/celestite-thumb.jpg" height="50" width="50"/></div>
				<div class="shell thumb" timg="platinum" data-pdf="platinum" rel="Platinum" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/platinum-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="oyester" data-pdf="oyester" rel="Oyester" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/oyester-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="sahara" data-pdf="sahara" rel="Sahara" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/sahara-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="sand" data-pdf="sand" rel="Sand" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/sand-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="coppersand" data-pdf="coppersand" rel="Copper Sand" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/coppersand-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="midnight" data-pdf="midnight" rel="Midnight" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/midnight-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="monaco" data-pdf="monaco" rel="Monaco" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/monaco-thumb.jpg" height="50" width="50" /></div>
				<div class="shell thumb" timg="carribeansurf" data-pdf="carribeansurf" rel="Carribean Surf" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/shells/caribbean-thumb.jpg" height="50" width="50" /></div>
			</div>
			<h2><strong>Cabinetry:</strong> <span class="skirt-name"></span></h2>
			<div class="skirts">
				<div class="skirt thumb coastal active" timg="coastal" rel="Coastal" data-pdf="coastal" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/skirts/coastal-thumb.jpg" height="50" width="50" /></div>
				<div class="skirt thumb mahogny" timg="mahogny" rel="Mahogny" data-pdf="mahogny" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/skirts/mahogny-thumb.jpg" height="50" width="50" /></div>
				<div class="skirt thumb autumnwall" timg="autumnwall" rel="Autumn Walnut" data-pdf="autumnwall" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/colorselector/skirts/autumnwall-thumb.jpg" height="50" width="50" /></div>
			</div>
			<a class="btn bigBlueBtn" href="<?php echo get_bloginfo('url'); ?>/get-a-quote/">Get Pricing</a>
			<a class="pdf-download" href="" download="">Download Your Selected Color PDF</a>

		</div>

	</div>

</div>
<script type="text/javascript">
jQuery(function($){

	function updatepdf() {
		var pdf1 = $('.color-selector div.shell.thumb.active').attr('data-pdf'),
			pdf2 = $('.color-selector div.skirt.thumb.active').attr('data-pdf'),
			pdfroot = "<?php echo get_stylesheet_directory_uri().'/brochures/shellskirtoptions/'; ?>";
		if ( $(this).hasClass('shell') ) {
			pdf1 = $(this).attr('data-pdf');
		}
		if ( $(this).hasClass('skirt') ) {
			pdf1 = $(this).attr('data-pdf');
		}
		var pdfurl = pdfroot + pdf1 + '_' + pdf2;
		$('a.pdf-download').attr({
			'href': pdfurl + '.pdf',
			'download': pdf1 + '_' + pdf2
		});
	}
	
	
	
	// set default shell and skirt names
	var shellname = $('.color-selector div.shell.thumb.active').attr('rel');
	var skirtname = $('.color-selector div.skirt.thumb.active').attr('rel');
	$('.color-selector span.shell-name').html( shellname );
	$('.color-selector span.skirt-name').html( skirtname );
	updatepdf();

	// onclick update
	$('.color-selector div.shell.thumb').click(function(){
		var newshellname = $(this).attr('rel');
		var newshellimg = $(this).attr('timg');
		$('.color-selector div.shell.thumb.active').removeClass('active');
		$('.color-selector div.tub-shell img.active').removeClass('active');
		$(this).addClass('active');
		$('.color-selector div.tub-shell').find('img[timg="' + newshellimg + '"]').addClass('active');
		$('.color-selector span.shell-name').html( newshellname );
		updatepdf();
	});
	$('.color-selector div.shell.thumb').hover(function(){
		var newshellname = $(this).attr('rel');
		$('.color-selector span.shell-name').html( newshellname );
	}, function(){
		var shellname = $('.color-selector div.shell.thumb.active').attr('rel');
		$('.color-selector span.shell-name').html( shellname );
	});
	$('.color-selector div.skirt.thumb').click(function(){
		var newskirtname = $(this).attr('rel');
		var newskirtimg = $(this).attr('timg');
		$('.color-selector div.skirt.thumb.active').removeClass('active');
		$('.color-selector div.tub-skirt img.active').removeClass('active');
		$(this).addClass('active');
		$('.color-selector div.tub-skirt').find('img[timg="' + newskirtimg + '"]').addClass('active');
		$('.color-selector span.skirt-name').html( newskirtname );
		updatepdf();
	});
	$('.color-selector div.skirt.thumb').hover(function(){
		var newskirtname = $(this).attr('rel');
		$('.color-selector span.skirt-name').html( newskirtname );
	}, function(){
		var skirtname = $('.color-selector div.skirt.thumb.active').attr('rel');
		$('.color-selector span.skirt-name').html( skirtname );
	});
	$('#close-cs-modal').click(function(){
		$('.color-selector-modal-bg').hide();
	});
	$('a.pdf-download').click(function(){

	})
});
</script>
