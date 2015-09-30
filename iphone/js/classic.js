/* WPtouch Pro Classic JS */
/* This file holds all the default jQuery & Ajax functions for the classic theme on mobile */
/* Description: JavaScript for the Classic theme on mobile */
/* Required jQuery version: 1.5.2+ */

var WPtouchWebApp = navigator.standalone;

/* For debugging Web-App mode in a browser */
//var WPtouchWebApp = true;

/* see http://cubiq.org/add-to-home-screen for additional information */
var addToHomeConfig = {
	startDelay: 550,								// milliseconds
	lifespan: 1000*60,							// milliseconds  (set to: 30 secs)
	expire: 60*24*WPtouch.expiryDays,	// minutes (set in admin settings)
	animationIn: 'bubble',
	animationOut: 'drop',
	touchIcon: true,
	message: WPtouch.add2home_message
};

/*
If it's a device that supports ontouchstart & ontouchend, then we'll use the faster event handlers. 
Desktop browsers use click (ontouchstart/end is faster on iOS & Android).
*/
if ( typeof ontouchstart != 'undefined' && typeof ontouchend != 'undefined' ) { 
	var touchStartOrClick = 'touchstart', touchEndOrClick = 'touchend'; 
} else {
	var touchStartOrClick = 'click', touchEndOrClick = 'click'; 
};

/* Try to get out of frames! */
if ( window.top != window.self ) { 
	window.top.location = self.location.href
}


function doClassicReady() {
	jQuery.mobile.ajaxEnabled = false;
	/*  Header #tab-bar tabs */
	jQuery( function() {
	    var tabContainers = jQuery( '#menu-container > div' );
		var innerTabs = jQuery( '#tab-inner-wrap-left a' );

	    innerTabs.click( function() {
	        tabContainers.hide().filter( this.hash ).show();
	    	innerTabs.removeClass( 'selected' );
	   		jQuery( this ).addClass( 'selected' );
	        return false;
	    }).filter( ':first' ).click();
	});

	jQuery( 'a#header-menu-toggle' ).click( function() {
		jQuery( this ).toggleClass( 'menu-toggle-open' );
		jQuery( '#main-menu' ).opacityToggle( 380 );	
		return false;
	});	

	jQuery( '#main-menu ul li a:not(li.has_children > a)' ).bind( 'click', function(){
		jQuery( this ).parent().addClass( 'active' );
	});

	jQuery( 'a#tab-search' ).click( function() {
		jQuery( '#search-bar' ).toggleClass( 'show-search' );
		jQuery( this ).toggleClass( 'search-toggle-open' );
		return false;
	});	

	/* Filter parent link href's and make them toggles for thier children */
	jQuery( '#main-menu' ).find( 'li.has_children ul' ).hide();
	
	jQuery( '#main-menu ul li.has_children > a' ).click( function() {
		jQuery( this ).parent().children( 'ul' ).opacityToggle( 380 );
		jQuery( this ).toggleClass( 'arrow-toggle' );
		jQuery( this ).parent().toggleClass( 'open-tree' );
		return false;
		});

	/* If Prowl Message Sent */
	if ( jQuery( '#prowl-message' ).length ) {
		setTimeout( function() { jQuery( '#prowl-message' ).fadeOut( 350 ); }, 2500 );
	}

	/* Try to make imgs and captions nicer in posts */	
		jQuery( '.content img, .content .wp-caption' ).each( function() {
			if ( !jQuery( this ).hasClass( 'aligncenter' ) && jQuery( this ).width() > 105 ) {
				jQuery( this ).addClass( 'aligncenter' );
			}
		});

	/* Pesky plugin image protect stuff */	
	jQuery( '.single .p3-img-protect' ).each( function() {
		jQuery( '.p3-overlay' ).remove();
		var insideContent = jQuery( this ).html();
		jQuery( this ).replaceWith( insideContent );
	});

	/* Single post page share menu */
	jQuery( 'a#share-toggle' ).click( function( e ) {
		jQuery( '#share-links' ).opacityToggle( 330 );
		e.preventDefault();
	});	
	
	/* .active styling to mimic default iOS functionality */
		jQuery( '#action-buttons a, .comment-buttons a, a#cancel-comment-reply-link, a.com-toggle' ).bind( touchStartOrClick, function() {
			jQuery( this ).addClass( 'active' );
		}).bind( touchEndOrClick, function() {
			jQuery( this ).removeClass( 'active' );
		});

	jQuery( 'a#instapaper-toggle' ).click( function( e ) {
		var userName = prompt( WPtouch.instapaper_username, '' );
		if ( userName ) {
			var passWord = prompt( WPtouch.instapaper_password, '' );
			if ( !passWord ) {
				passWord = 'default';	
			}
			
			var ajaxParams = {
				url: document.location.href,
				username: userName,
				password: passWord,
				title: document.title
			};
			
			WPtouchAjax( 'instapaper', ajaxParams, function( result ) {
				if ( result == '1' ) {
					alert( WPtouch.instapaper_saved );
				} else {
					alert( WPtouch.instapaper_try_again );
					jQuery( 'a#instapaper-toggle' ).click();
				}
			});
		}
		e.preventDefault();
	});

	jQuery( '#email' ).find( 'a' ).click( function() {
		jQuery( 'a#share-toggle' ).click();
		return true;
	});

	/* Add a rounded top left corner to the first gravatar in comments, removes double bordering */
	jQuery( '.commentlist li :first, .commentlist img.avatar:first' ).addClass( 'first' );

	jQuery( 'a.com-toggle' ).bind( 'click', function() {
		jQuery( 'ol.commentlist' ).toggleClass( 'hidden' );
		jQuery( 'img#com-arrow' ).toggleClass( 'com-arrow-down' );
		return false;
	});
		
	/* Detect window width and add corresponding 'portrait' or 'landscape' classes onload */
	if ( jQuery( window ).width() >= 480 ) { 
		jQuery( 'body' ).addClass( 'landscape' );
	} else {
		jQuery( 'body' ).addClass( 'portrait' );
	}

	/* Detect orientation change and add or remove corresponding 'portrait' or 'landscape' classes */
	window.onorientationchange = function() {
		var scrollPosition = jQuery( 'body' ).scrollTop() + 1;
		var orientation = window.orientation;
			switch( orientation ) {
				//Portrait
				case 0:
				case 180:
				jQuery( 'body' ).addClass( 'portrait' ).removeClass( 'landscape' );
				window.scrollTo( 0, scrollPosition,100 );
				break;
				//Landscape
				case 90:
				case -90:
				jQuery( 'body' ).addClass( 'landscape' ).removeClass( 'portrait' );
				window.scrollTo( 0, scrollPosition,100 );
				break;
				default:
				jQuery( 'body' ).addClass( 'portrait' ).removeClass( 'landscape' );				
			}
	}
	
	var header = jQuery( '#header' ).get(0);
	header.addEventListener( 'touchmove', classicTouchMove, false );
    
    // Check to make sure the menu bar is in the DOM
    if ( jQuery( '#tab-bar' ).length ) {
        var tabBar = jQuery( '#tab-bar' ).get(0);
        tabBar.addEventListener( 'touchmove', classicTouchMove, false );
    }
	
	/* Ajaxify commentform */
	var postURL = document.location;
	var commentTextarea = jQuery( '#commentform textarea' );
	var CommentFormOptions = {
		beforeSubmit: function() {
			commentTextarea.addClass( 'loading' );			
		},
		success: function() {
			commentTextarea.removeClass( 'loading' ).addClass( 'success' );			
			alert( WPtouch.comment_success );
			setTimeout( function () { 
				commentTextarea.removeClass( 'success' );
			}, 1500 );
//			jQuery( 'ol.commentlist' ).load( postURL + ' ol.commentlist > li', function(){ 
//				comReplyArrows();
//			});
		},
		error: function() {
			commentTextarea.removeClass( 'loading' ).addClass( 'error' );
			alert( WPtouch.comment_failure );
			setTimeout( function () { 
				commentTextarea.removeClass( 'error' );
			}, 3000 );
		},
		resetForm: true,
		timeout:   10000
	} 	//end options
	
	if ( jQuery.isFunction( jQuery.fn.ajaxForm ) ) {
		jQuery( '#commentform' ).ajaxForm( CommentFormOptions );
	}
/*
	loadMoreEntries();
	loadMoreComments();
	comReplyArrows();
	classicExcerptToggle();
	welcomeMessage();
	webAppLinks();
	webAppOnly();
	handleVids();
*/	
	jQuery( 'a.login-req, a.comment-reply-login' ).bind( 'click', function() {
		jQuery( 'a#header-menu-toggle, a#tab-login' ).click();
		scrollTo( 0,0,1 );
		return false;
	});
			
	/* Hide addressBar */
	if ( jQuery( 'body' ).hasClass( 'hide-addressbar' ) ) {
		jQuery( window ).load( function() {
		    setTimeout( function(){ scrollTo( 0, 0 ) }, 1 );
		});
	}
	
	/*Single post Back to Top */
	jQuery( 'a.back-to-top' ).click( function(){
	    jQuery( 'body' ).animate( { scrollTop: jQuery( 'html' ).offset().top }, 750 );		
		return false;
	});
	
	/*Single postSkip to Comments */
	jQuery( 'a.middle-link' ).click( function(){
	    jQuery( 'body' ).animate( { scrollTop: jQuery( '.nav-bottom' ).offset().top }, 750 );		
		return false;
	});

	/* Set tabindex automagically */
	jQuery( function(){
	var tabindex = 1;
		jQuery( 'input, select, textarea' ).each( function() {
			if ( this.type != "hidden" ) {
				var inputToTab = jQuery( this );
				inputToTab.attr( 'tabindex', tabindex );
				tabindex++;
			}
		});
	});
	
	/* New Toggle Switch JS */
	var onLabel = WPtouch.toggle_on, offLabel = WPtouch.toggle_off;
	jQuery( '.on' ).text( onLabel );
	jQuery( '.off' ).text( offLabel );
	
	jQuery( '#switch' ).find( 'div' ).bind( touchEndOrClick, function(){ 
		var switchURL = jQuery( this ).attr( 'title' );
		jQuery( '.on' ).toggleClass( 'active' );
		jQuery( '.off' ).toggleClass( 'active' );
		setTimeout( function () { window.location = switchURL }, 500 );
		return false;
	});

	classicHandleShortcodes();
	
	//hslides
	if ( jQuery('.mslide').size() > 0 ) {
		jQuery('#mdots a').each(function(i) {
			jQuery(this).click(function() {
				if ( jQuery(this).parent().hasClass('onn') == false ) {
					var isprev = jQuery('#mdots').hasClass('prev');
					var nex = jQuery('.mslide:eq('+i+')');
					nex.css('left',(isprev ? '-' : '') + '100%').show();
					var onn = jQuery('.mslide.onn');
					onn.add(nex).animate({
						left: (isprev ? '+' : '-') + '=100%'
					}, 400, function() {
						jQuery(this).toggleClass('onn');
					});
					jQuery(this).parent().addClass('onn').siblings('.onn').removeClass();
				}
				jQuery('#mdots').removeClass('prev');
				return false;
			});
		});
		jQuery('body').on({
			swiperight: function() {
				jQuery('#mdots').addClass('prev');
				var onn = jQuery('#mdots .onn');
				var nex = onn.prev();
				if ( nex.size() == 0 ) {
					nex = onn.parent().children(':last-child');
				}
				nex.children('a').click();
			},
			swipeleft: function() {
				var onn = jQuery('#mdots .onn');
				var nex = onn.next();
				if ( nex.size() == 0 ) {
					nex = onn.parent().children(':first-child');
				}
				nex.children('a').click();
			}
		});
	}
	// tub details
	if ( jQuery('.tubslide').size() > 0 ) {
		jQuery('#mdots a').each(function(i) {
			jQuery(this).click(function() {
				if ( jQuery(this).parent().hasClass('onn') == false ) {
					var isprev = jQuery('#mdots').hasClass('prev');
					var nex = jQuery('.tubslide:eq('+i+')');
					nex.css('left',(isprev ? '-' : '') + '100%').show();
					var onn = jQuery('.tubslide.onn');
					onn.add(nex).animate({
						left: (isprev ? '+' : '-') + '=100%'
					}, 400, function() {
						jQuery(this).toggleClass('onn');
					});
					jQuery(this).parent().addClass('onn').siblings('.onn').removeClass();
				}
				jQuery('#mdots').removeClass('prev');
				return false;
			});
		});
		jQuery('body').on({
			swiperight: function() {
				jQuery('#mdots').addClass('prev');
				var onn = jQuery('#mdots .onn');
				var nex = onn.prev();
				if ( nex.size() == 0 ) {
					nex = onn.parent().children(':last-child');
				}
				nex.children('a').click();
			},
			swipeleft: function() {
				var onn = jQuery('#mdots .onn');
				var nex = onn.next();
				if ( nex.size() == 0 ) {
					nex = onn.parent().children(':first-child');
				}
				nex.children('a').click();
			}
		});
		jQuery('.tubslide img.attachment-background').each(function() {
			var iw = jQuery(this).attr('width');
			var ih = jQuery(this).attr('height');
			var neww = Math.round(iw*229/ih);
			var lef = Math.floor( ( jQuery(window).width() - neww ) / 2) -41;
			jQuery(this).css({'height':229,'width':neww, 'margin-left': lef + 'px'});
		});
	}
	
	// cats landing
	if ( jQuery('.post.cats .tubs').size() > 0 ) {
		if ( jQuery('.post.post-1894').size() > 0 ) {
			jQuery('.post.cats .content').accordion({
				active: false,
				collapsible: true,
				heightStyle: "content"
			});
		} else {
			jQuery('.post.cats .content').accordion({
				heightStyle: "content"
			});
		}
	}
	// hot tubs btn redundancy fx
	if ( jQuery('.post-1894').size() > 0 ) {
		jQuery('a.mbtn.hottubs').hide();
	}
	// dl?
	jQuery('#dlzip').bind('focus',function() {
		if ( jQuery(this).hasClass('locd') == false ) {
			jQuery(this).addClass('locd');
			navigator.geolocation.getCurrentPosition(jht_fposition);
		}
	});
	jht_geocoder = new google.maps.Geocoder();
	if ( jQuery('#dltopform').size() > 0 ) {
		
		jQuery('#dlbtn').click(function() {
			//alert('attempting to get your browser\'s location...');
			navigator.geolocation.getCurrentPosition(jht_position);
			return false;
		}).trigger('click');
		
		jQuery('#dltopform').each(function() {
			jQuery(this).bind({
				'submit': function() {
				var dzip = jQuery('#dlzip').val();
				
				//alert('Searching for Jacuzzi Hot Tubs Dealers in ... '+ dzip );
				jQuery(this).trigger('dlloading');
				
				if ( dzip != 'Zip/Postal Code' ) {
				jQuery.ajax({
				type: "POST",
				url: '/hot-tub-dealer-locator/cities/',
				data: { "zipcodeSearch": 1, "data[Dealer][country_id]": 1, "zip": dzip },
				success: function(result) {
					//console.log('##bazing##');
					//console.log(result);
					jQuery('#dlandimg').hide();
					jQuery('#dmap-canvas').remove();
					jQuery('#dlrap').show().children().empty();
					
					var dh3 = jQuery(result).find('.dealername');
					if ( dh3.size() > 0 ) {
						//console.log(dh3.html());
						var dinfo = dh3.siblings('.dealerinfo');
					} else {
						dh3 = jQuery('<h3>'+ jQuery(result).find('.dealer-details h2').children().html() + '</h3>');
						var dinfo = jQuery('<p>'+ jQuery(result).find('.dealer-address').text().trim() +'</p>');
					}
					dh3.add(dinfo).appendTo('#dlresult');
					
					// wrap dlphone
					var pho = jQuery(result).find('.phone');
					if ( pho.size() > 0 ) {
						pho.each(function() {
							var htm = jQuery(this).html();
							//console.log('**phone : '+ htm);
							jQuery('<a href="tel:'+htm+'" onclick="_gaq.push([\'_trackEvent\', \'DealerLocator\', \'click-to-call\', \'Mobile\']);" >'+htm+'</a><br />').prependTo(dinfo);
						});
					}
					
					var daddr = '';
					var dladdr1 = dinfo.find('.address1');
					if ( dladdr1.size() > 0 ) {
						daddr += jQuery.trim( dladdr1.html() );
					}
					var dlcity = dinfo.find('.city');
					if ( dlcity.size() > 0 ) {
						daddr += ', '+ jQuery.trim( dlcity.html() );
					}
					var dlstate = dinfo.find('.state');
					if ( dlstate.size() > 0 ) {
						daddr += ', ' + jQuery.trim( dlstate.html() );
					}
					var dlzip = dinfo.find('.dzip');
					if ( dlzip.size() > 0 ) {
						daddr += ' ' + jQuery.trim( dlzip.html() );
					}
					var dmapd = jQuery('<div id="dmap-canvas"></div>');
					dmapd.insertBefore('#dlrap');
					// and then ...
					jht_geocoder.geocode( { 'address': daddr }, function ( results, status ) {
						if (status == google.maps.GeocoderStatus.OK) {
							var mapOptions = {
								zoom: 14,
								center: results[0].geometry.location,
								mapTypeId: google.maps.MapTypeId.ROADMAP
							};
							map = new google.maps.Map(document.getElementById('dmap-canvas'), mapOptions);
							
							map.setCenter(results[0].geometry.location);
							var marker = new google.maps.Marker({
								map: map,
								position: results[0].geometry.location
							});
							jQuery('#dltopform').trigger('dldone');
						  } else {
							if ( status == 'ZERO_RESULTS' ) {
								status = 'No Sundance Spas Dealers were found in your area.';
								jQuery('#dltopform').trigger('dlreset');
							}
							alert("Geocode was not successful for the following reason:\n" + status);
						  }
					});
					var daddrp = daddr.replace(/ /g,"+");
					
					var dbtns = jQuery('<div class="dbtns"><a href="http://maps.google.com/?saddr=&daddr='+daddrp+'" onclick="_gaq.push([\'_trackEvent\',\'DealerLocator\',\'Directions\',\'Mobile\']);">Directions</a><a href="/get-a-quote/" onclick="_gaq.push([\'_trackEvent\',\'DealerLocator\',\'Get-Quote\',\'Mobile\']);">Get Pricing</a></div>');
					dbtns.appendTo('#dlresult');
					
					jQuery(result).find('#truckd,#additional_html').appendTo('#dlresult');
				}
				});
				}
				return false;
			},
			'dlloading': function() {
				jQuery('#dltopform input.dlsub').val('...').attr('disabled',true).addClass('offf');
			},
			'dlreset': function() {
				jQuery('#dlandimg').show().next();
				jQuery('#dmap-canvas').remove();
				jQuery('#dlrap').hide();
				jQuery('#dlzip').val('').blur();
				jQuery(this).trigger('dldone');
			},
			'dldone': function() {
				jQuery('#dltopform input.dlsub').val('SEARCH').removeAttr('disabled').removeClass('offf');
			}
			});
			
			if ( jQuery(this).hasClass('zipposted') ) {
				jQuery(this).submit();
			}
		});
	}
}
/* End Document Ready */

function classicTouchMove( e ){
	e.preventDefault();
}

/* New jQuery function opacityToggle() */
jQuery.fn.opacityToggle = function( speed, easing, callback ) { 
	return this.animate( { opacity: 'toggle' }, speed, easing, callback ); 
}

/* New jQuery function viewportCenter() */
jQuery.fn.viewportCenter = function() {
    this.css( 'position', 'absolute' );
    this.css( 'top', ( ( jQuery( window ).height() - this.outerHeight() ) / 3 ) + jQuery( window ).scrollTop() + 'px' );
    this.css( 'left', ( ( jQuery( window ).width() - this.outerWidth() ) / 2 ) + jQuery( window ).scrollLeft() + 'px' );
	this.show();
    return this;
}

function welcomeMessage() {
	if ( !WPtouchWebApp ) {	
// Show the welcome message since we're not in Web-App Mode 
		jQuery( '#welcome-message' ).show();
		jQuery( 'a#close-msg' ).bind( 'click', function() {
			WPtouchCreateCookie( 'wptouch_welcome', '1', 365 );
			jQuery( '#welcome-message' ).fadeOut( 350 );
			return false;
		});
// Show the switch button since we're not in Web-App Mode 
		jQuery( '#switch' ).show();
	}
}

function webAppLinks() {
	if ( WPtouchWebApp ) {
		// The New Sauce ( Nobody makes tasty gravy like mom )		
		// bind to all links, except UI controls and such
		var webAppLinks = jQuery( 'a' ).not( 
			'.no-ajax, .email a, .feed a, a#header-menu-toggle, .has_children > a, a.load-more-link, .load-more-comments-link a, a#share-toggle, .GTTabs a' 
		);

 		webAppLinks.each( function(){
			var targetUrl = jQuery( this ).attr( 'href' ), targetLink = jQuery( this );
			var localDomain = location.protocol + '//' + location.hostname,  rootDomain = location.hostname.split( '.' ), masterDomain = rootDomain[1] + '.' + rootDomain[2];
//			var localDomain = location.hostname.match(/\.?([^.]+)\.[^.]+.?$/)[1];	
//			var localDomain = location.hostname;	
	
			// link is local, but set to be non-mobile
			if ( typeof wptouch_ignored_urls != 'undefined' ) {
				jQuery.each( wptouch_ignored_urls, function( i, val ) {
					if ( targetUrl.match( val ) ) {
						targetLink.addClass( 'ignored' );
					}
				});
			}
			
		   // filetypes, images class name additions
	       if ( targetUrl.match( ( /[^\s]+(\.(pdf|numbers|pages|xls|xlsx|doc|docx|zip|tar|gz|csv|txt))$/i ) ) ) {
				targetLink.addClass( 'external' );
	       } else if ( targetUrl.match( ( /[^\s]+(\.(jpg|jpeg|gif|png|bmp|tiff))$/i ) ) ) {
				targetLink.addClass( 'img-link' );
	       }

			jQuery( targetLink ).unbind( 'click' ).bind( 'click', function( e ) {

				// is this an external link? Confirm to leave WAM
				if ( jQuery( targetLink ).hasClass( 'external' ) || jQuery( targetLink ).parent( 'li' ).hasClass( 'external' ) ) {
			       	confirmForExternal = confirm( WPtouch.external_link_text + ' \n' + WPtouch.open_browser_text );
					if ( confirmForExternal ) {
						return true;
					} else {			
						return false;
					}
				// prevent images with links to larger ones from opening in web-app mode
				} else if ( jQuery( targetLink ).hasClass( 'img-link' ) ) {
					return false;

				// local http link or no http present: 
				} else if ( targetUrl.match( localDomain ) || !targetUrl.match( 'http://' ) ) {
					// make sure it's not in the ignored list first
					if ( jQuery( targetLink ).hasClass( 'ignored' ) || jQuery( targetLink ).parent( 'li' ).hasClass( 'ignored' ) ) {
				       	confirmForExternal = confirm( WPtouch.wptouch_ignored_text + ' \n' + WPtouch.open_browser_text );
							if ( confirmForExternal ) {
								return true;	
							} else {
								return false;
							}
					// okay, it's passed the tests, this is a local link, fire WAM
					} else {
						/* Check to see if menu is showing */
						if ( jQuery( '#main-menu' ).hasClass( 'show-menu' ) ) {
							/* Menu is showing, so lets close it */
							jQuery( this ).opacityToggle( 380 );
							jQuery( 'a#header-menu-toggle' ).toggleClass( 'menu-toggle-open' );
						}
						loadPage( targetUrl ); 
						return false;
					}
				// not local, not ignored, doesn't have no-ajax but it's got an external http domain url
				} else {
			       	confirmForExternal = confirm( WPtouch.external_link_text + ' \n' + WPtouch.open_browser_text );
					if ( confirmForExternal ) {
						return true;
					} else {			
						return false;
					}					
				}
			}); /* end click bindings */
		}); /* end .each loop */
	} else {
		// Do non web-app setup
		jQuery( 'li.target a' ).attr( 'target', '_blank' );
	}
}

/* Load domain urls with Ajax (works with webAppLinks(); ) */
function loadPage( targetUrl ) {
	var persistenceOn = jQuery( 'body.loadsaved' ).length;
	if ( jQuery( 'body' ).hasClass( 'ajax-on' ) ) {
		jQuery( 'body' ).append( '<div id="progress"></div>' );
		jQuery( '#progress' ).viewportCenter();
		jQuery( document ).unbind();
		jQuery( '#outer-ajax' ).load( targetUrl + ' #inner-ajax', function( allDone ) {
			jQuery( '#progress' ).addClass( 'done' );
			if ( persistenceOn ) {
		  		WPtouchCreateCookie( 'wptouch-load-last-url', targetUrl, 365 );
			} else {
			  	WPtouchEraseCookie( 'wptouch-load-last-url' );	
			}
			doClassicReady();
			scrollTo( 0, 0, 100 );
		});
	} else {
		jQuery( 'body' ).append( '<div id="progress"></div>' );
		jQuery( '#progress' ).viewportCenter();
		if ( persistenceOn ) {
	  		WPtouchCreateCookie( 'wptouch-load-last-url', targetUrl, 365 );
		}
		setTimeout( function () { window.location = targetUrl; }, 550 );
	}
}

/* Things to do only when in Web-App Mode */
function webAppOnly() {
	if ( WPtouchWebApp ) {
		var persistenceOn = jQuery( 'body.loadsaved' ).length;
		if ( !persistenceOn ) {
			WPtouchEraseCookie( 'wptouch-load-last-url' );
		}
		jQuery( 'body' ).addClass( 'web-app' );
		jQuery( 'body.black-translucent' ).css( 'margin-top', '20px' );
		jQuery( 'a.comment-reply-link, a.comment-edit-link' ).remove();
		setTimeout( function () { jQuery( '#progress' ).remove(); }, 150 );
	}
}

function classicExcerptToggle() {
	jQuery( 'a.excerpt-button' ).live( 'click', function() {
		jQuery( this ).toggleClass( 'open' ).parent( '.post' ).find( '.content' ).opacityToggle( 380 );	
		return false;	
	});
}

function classicHandleShortcodes() {
	// For web application mode
	if ( WPtouchWebApp ) {
		var webAppDivs = jQuery( '.wptouch-shortcode-webapp-only' );
		if ( webAppDivs.length ) {
			webAppDivs.show();
		}
	}
}

function loadMoreEntries() {
	var loadMoreLink = jQuery( 'a.load-more-link' );
	var ajaxDiv = '.ajax-page-target';
	loadMoreLink.live( 'click', function() {
		jQuery( this ).addClass( 'ajax-spinner' ).text( WPtouch.loading_text );
		var loadMoreURL = jQuery( this ).attr( 'rel' );
		jQuery( '#content' ).append( "<div class='ajax-page-target'></div>" );
		jQuery( ajaxDiv ).hide().load( loadMoreURL + ' #content .post, #content .load-more-link', function() {
			jQuery( this ).replaceWith( jQuery( this ).html() );	
			jQuery( 'a.load-more-link.ajax-spinner' ).fadeOut( 350 );
			webAppLinks();
			handleVids();
		});
		return false;
	});	
}

function loadMoreComments() {
	var loadMoreLink = jQuery( 'li.load-more-comments-link a' );
	var ajaxDiv = '.ajax-page-target';
	loadMoreLink.live( 'click', function() {
		jQuery( this ).addClass( 'ajax-spinner' );
		var loadMoreURL = jQuery( this ).attr( 'href' );
		jQuery( 'ol.commentlist' ).append( "<div class='ajax-page-target'></div>" );
		jQuery( ajaxDiv ).hide().load( loadMoreURL + ' ol.commentlist > li', function() {
			jQuery( this ).replaceWith( jQuery( this ).html() );	
			jQuery( '.load-more-comments-link a.ajax-spinner' ).parent().fadeOut( 350 );
			if ( WPtouchWebApp ) { 
				jQuery( 'a.comment-reply-link, a.comment-edit-link' ).remove();
				webAppLinks(); 
			}
		});
		return false;
	});	
}

function comReplyArrows() {
	var comReply = jQuery( 'ol.commentlist li li > .comment-top' );
	jQuery.each( comReply, function() {
		jQuery( comReply ).prepend( "<div class='com-down-arrow'></div>" );
	});
}

function handleVids() {
	/* add dynamic automatic video resizing via fitVids or CoyierVids (if enabled) */

	if ( jQuery.isFunction( jQuery.fn.fitVids ) ) {	
		jQuery( '.content' ).fitVids();
	}
	
	if ( typeof window.coyierVids == 'function' ) {
		coyierVids();
	}
	
	/* If we have html5 videos, add controls for them if they're not specified */
	if ( jQuery( 'video' ).length ) {
		jQuery( 'video' ).attr( 'controls', 'controls' );
	}
}

function WPtouchCreateCookie( name, value, days ) {
	if ( days ) {
		var date = new Date();
		date.setTime( date.getTime() + ( days*24*60*60*1000 ) );
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path="+WPtouch.siteurl;
}

function WPtouchEraseCookie( name ) {
	WPtouchCreateCookie( name,"",-1 );
}
	
jQuery( document ).ready( function() { doClassicReady(); } );
