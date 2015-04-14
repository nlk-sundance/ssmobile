jQuery(document).ready(function($) {

	// initializes page to display 880 series by default, sets nav and etc
	function sg_initialize_series(){
		var init = '880'; // which series to start as active
		$('#startupguide.mobile').addClass('shownav');
		$('#startup-nav-series').show().addClass('active'); //.find('li#sg-nav-series-' + init).addClass('active'); // set nav bar to default series
	}
	sg_initialize_series();



	// control clicks between series
	function sg_swap_series( $this ){
		//if ( $this.hasClass('active') ) {
		//	return false;
		//}
		var s = $this.attr('series');
		$this.toggleClass('active', 250).siblings('.active').removeClass('active', 250);
	}
	// click on series, show that series, hide others
	$('#startup-nav-series li.series div').click(function(){ sg_swap_series( $(this).parent() ); });




	// hides series on other menu click
	function sg_hide_series(){
		//$('#startup-nav-series').hide('slide', {direction: 'left'}, 250, function(){
		$('#startup-nav-series').hide(50, function(){
			$(this).removeClass('active'); // slide out of view then remove all active from nav bar
		});
	}
	// displays details nav menu on spa click
	function sg_show_details( spa, name ){
		//$('#startup-nav-spa').show('slide', {direction: 'right'}, 250).addClass('active').attr('rel', spa ).find('li.nav-title .tub-title').text( name ); // slide in menu
		$('#startup-nav-spa').show(50).addClass('active').attr('rel', spa ).find('li.nav-title .tub-title').text( name ); // slide in menu
	}
	// do after ajax load




	// hides details page and returns to series menu
	function sg_hide_details(){
		//$('#startup-nav-spa').hide('slide', {direction: 'right'}, 250, function(){
		$('#startup-nav-spa').hide(50, function(){
			$(this).removeClass('active').attr('rel', '').find('.active').removeClass('active'); // slide out of view then remove all active from nav bar
		});
	}
	function sg_show_series(){
		//$('#startup-nav-series').show('slide', {direction: 'left'}, 250).addClass('active'); // slide in menu
		$('#startup-nav-series').show(50).addClass('active'); // slide in menu
	}
	// when viewing a spa, "all spas" returns to initialize state
	$('#startup-nav-spa li.show-all').click(function(){
		sg_hide_details();
		sg_show_series();
	});




	// open / close menu height on details view
	function sg_nav_details_expand( $this ){
		$this.parent('li').toggleClass("active", 250).siblings(".active").removeClass("active", 250).find('.chevron-up').fadeOut(125, function(){
			$(this).removeClass('chevron-up').addClass('chevron-down');
			$(this).fadeIn(125);
		});
		if ( $this.siblings('.chevron').hasClass('chevron-up') ) {
			$this.siblings('.chevron').fadeOut(125, function(){
				$(this).removeClass('chevron-up').addClass('chevron-down');
				$(this).fadeIn(125);
			});
		}
		else {
			$this.siblings('.chevron').fadeOut(125, function(){
				$(this).removeClass('chevron-down').addClass('chevron-up');
				$(this).fadeIn(125);
			});
		}
	}
	// open/close spa details menu drop-downs
	$('.nav-spa li.details div.wrapr').click(function(){ sg_nav_details_expand( $(this) ); });

	// show specific details section
	$('#startup-nav-spa .details button').click(function(){
		var show = $(this).attr('show');
		//$('#startupguide div.sg-menu').hide('slide', {direction: 'left'}, 250, function(){
		$('#startupguide div.sg-menu').hide(50, function(){
			$(this).removeClass('active'); // slide out of view then remove all active from nav bar
		});
		$('div.sg-spa-details').find('section#' + show).addClass('active');
		$('div.sg-spa-details').show(50).addClass('active');
	});



	



	// swap between different details views
	function sg_swap_details_view( $this ){
		var showing = $this.attr('show');
		$this.parents('li.active').addClass('lastone');
		if ( $('section#' + showing).hasClass('active') ) {
			return false;
		}
		$('section.sg-details.active').fadeOut(150,function(){
			$(this).removeClass('active').find('img.active').hide().removeClass('active');
			$(this).find('.active').removeClass('active');
			$(this).find('.toggle-me').addClass('closed');
			$('section#' + showing).find('div.home').show().addClass('active');
			$('section#' + showing).fadeIn(250).addClass('active');
		});
	}

	// explore jets action fades out control panel landing image
	function sg_panel_explore_jets() {
		$('#sg-panel-landing-container').fadeOut(250, function(){
			$(this).removeClass('active');
			$('#sg-panel-overhead-container').fadeIn(250).addClass('active');
		});
	}



	// control panel - explore jets
	$('#sg-panel-explore-jets').click(function(){ sg_panel_explore_jets(); });


	// massage sliders
	var slider_styles = {
		'background-image': 'none',
		'background-color': '#C4C8CD',
		'border': 'none',
		'border-radius': 99,
		'display': 'inline-block',
		'float': 'left',
		'height': 10,
		'margin-top': 3,
		'margin-left': '5%',
		'width': '90%'
	};
	var slider_a_styles = {
		'background-color': '#fff',
		'background-image': 'none',
		'border': 'none',
		'border-radius': '99px',
		'cursor': 'pointer',
		'display': 'block',
		'height': 30,
		'top': -9,
		'position': 'relative',
		'width': 30
	};

	// Control Panel Functions
	function sg_panel_reset_landing(){
		$('#sg-panel-overhead-container').fadeOut(250, function(){
			$(this).removeClass('active').find('.active').removeClass('active');
			$('#sg-panel-overhead-container').find('img.sg-layer').hide();
			$('#sg-panel-landing-container').fadeIn(250).addClass('active');
		});
	}
	function sg_panel_explore_jets() {
		$('#sg-panel-landing-container').fadeOut(250, function(){
			$(this).removeClass('active');
			$('#sg-panel-landing-rightbar').addClass('closed').find('.active').removeClass('active');
			$('#sg-panel-overhead-container').fadeIn(250).addClass('active');
		});
	}
	function sg_panel_rightbar( $this ){
		if ( $this.attr('id') == 'sg-panel-landing-rightbar-openclose' ) {
			$this.parent('#sg-panel-landing-rightbar').toggleClass('closed', 250);
		}
		else if ( $this.parent('#sg-panel-landing-rightbar').hasClass('closed') ) {
			$this.parent('#sg-panel-landing-rightbar').removeClass('closed', 250);
		}
		$this.toggleClass('active', 250).siblings('.active').removeClass('active', 250);
	}
	function sg_panel_topbar_button( $this ){
		var l = $this.attr('layer');
		if ( $this.hasClass('active') ) {
			$this.removeClass('active');
			$('img#sg-' + l).fadeOut(250).removeClass('active');
		}
		else {
			$this.addClass('active').siblings('.active').removeClass('active');
			$('img#sg-' + l).fadeIn(250).addClass('active').siblings('.active').fadeOut(250).removeClass('active');
		}
	}


	// on spa selection (click)
	$("li.sgspa").click(function() {

		// display loader while we get the content
		$("#loading-animation").fadeIn(350);

		// spa ID
		var post_id = $(this).attr("id");
		var s = $(this).attr('id'),
			n = $(this).text();
		

		// ajax file URL
		var ajaxURL = StartupAjax.ajaxurl;

		$.ajax({
			type: 'POST',
			url: ajaxURL,
			data: {"action": "load-mobile-content", post_id: post_id },
			success: function(response) {
				$("#sg-spa-container").html(response);
				$("#loading-animation").fadeOut(250, function(){
					$(this).hide();
					sg_hide_series();
					sg_show_details( s, n );
				});

				// hide details section and return to menu
				$('.sg-spa-details h4.goback').click(function(){
					if ( $(this).hasClass('fromjets') ) {
						//$('#sg-panel-overhead-container').hide('slide', {direction: 'right'}, 250, function(){
						$('#sg-panel-overhead-container').hide(50, function(){
							//$('#sg-panel-landing-container').show('slide', {direction: 'left'}, 250);
							$('#sg-panel-landing-container').show(50);
						});
						$('#sg-panel-overhead-container').find('.active').removeClass('active');
						$('#sg-panel-overhead-container').find('.sg-layer').hide();
						return false;
					}
					//$(this).parents('.sg-spa-details').hide('slide', {direction: 'right'}, 250, function(){
					$(this).parents('.sg-spa-details').hide(50, function(){
						$(this).removeClass('active').find('.active').removeClass('active'); // slide out of view then remove all active from nav bar
						$(this).find('.sg-massage-layer').hide();
					});
					//$('div.sg-menu').show('slide', {direction: 'left'}, 250).addClass('active');
					$('div.sg-menu').show(50).addClass('active');
				});


				// air control sections
				$('a.sg-air-anchor').click(function(){
						var r = $(this).attr('rel');
						if ( $('img#' + r).hasClass('active') ) {
							$('img#' + r).fadeOut(250).removeClass('active'); // if this is active. turn off on click...
						}
						else {
							$('img#' + r).fadeIn(250, function(){
								$(this).addClass('active'); // otherwise set this active, and fade out active siblings
							});
							$('img#' + r).siblings('.active').fadeOut(250).removeClass('active');
						}
					});
				
				// massage A/B fade slider
				$( "input#sg-massage-slider" ).slider({ theme: "b" });
				$("input#sg-massage-slider").on("change", function (event) {
					var v = $(this).val();
					var o = $(this).parent('#sg-massage-top-bar').siblings('#sg-massage-overhead').find('img.sg-massage-layer.main.active').attr('id');
					var a = o + '-a';
					var b = o + '-b';
					$('#' + a).css('opacity', (100 - v) / 100);
					$('#' + b).css('opacity', v/100);
				});

				// Massage hover/click events
				$('a.sg-massage-anchor').click(function(){
						$("input#sg-massage-slider").val(50);
						var r = $(this).attr('rel');
						if ( $('img#' + r).hasClass('active') ) {
							$('img#' + r + ', img#' + r + '-a' + ', img#' + r + '-b').fadeOut(250).removeClass('active');
						}
						else {
							var hide_these = $('img#' + r).siblings('img.active').attr('id');
							$('img#' + hide_these + ', img#' + hide_these + '-a' + ', img#' + hide_these + '-b').fadeOut(250).removeClass('active leader');
							$('img#' + r).fadeIn(250, function(){
								$(this).addClass('active');
							});
							$('img#' + r + '-a' + ', img#' + r + '-b').fadeTo(250, 0.5, function(){
								$(this).addClass('active');
							});
						}
				});


				// open / close menu height on control panel view
				function sg_cp_details_expand( $this ){
					if ( $this.parent('li').attr('id') == 'show-cp-jets' ) {
						$this.parent('li').siblings('.active').removeClass('active', 150).find('.chevron-up').fadeOut(125, function(){
							$(this).removeClass('chevron-up').addClass('chevron-down');
							$(this).fadeIn(125);
						});
						// show the jets page
						//$('#sg-panel-landing-container').hide('slide', {direction: 'left'}, 250, function(){
						$('#sg-panel-landing-container').hide(50, function(){
							//slide in jets
							//$('#sg-panel-overhead-container').show('slide', {direction: 'right'}, 250);
							$('#sg-panel-overhead-container').show(50);
						});
						return false;
					}
					$this.parent('li').toggleClass("active", 250).siblings(".active").removeClass("active", 250).find('.chevron-up').fadeOut(125, function(){
						$(this).removeClass('chevron-up').addClass('chevron-down');
						$(this).fadeIn(125);
					});
					if ( $this.siblings('.chevron').hasClass('chevron-up') ) {
						$this.siblings('.chevron').fadeOut(125, function(){
							$(this).removeClass('chevron-up').addClass('chevron-down');
							$(this).fadeIn(125);
						});
					}
					else {
						$this.siblings('.chevron').fadeOut(125, function(){
							$(this).removeClass('chevron-down').addClass('chevron-up');
							$(this).fadeIn(125);
						});
					}
				}
				// open/close spa details menu drop-downs
				$('.nav-control-panel li.details div.wrapr').click(function(){ sg_cp_details_expand( $(this) ); });

				// control panel actions
				$('#sg-panel-top-bar button').click(function(){ sg_panel_topbar_button( $(this) ); });


				return false;
			}
		});
	});

});
