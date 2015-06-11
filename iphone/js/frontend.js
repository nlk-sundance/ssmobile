// JavaScript Document
var jht_geocoder;

function jht_position( position ) {
	//alert('jackpot!! '+ position.coords.latitude + ' x ' + position.coords.longitude);
	// 32.74812376 , -117.16450744000001
	var latlng = new google.maps.LatLng( position.coords.latitude, position.coords.longitude );
	jht_geocoder.geocode({'latLng': latlng}, function(results,status) {
		//console.log('--- results ---');
		//console.log(results);
		//console.log('** status **');
		//console.log(status);
		var jhtaok = false;
		if ( status == google.maps.GeocoderStatus.OK) {
			// look for zip
			for ( a in results[0].address_components ) {
				if ( jhtaok == false ) {
					if ( results[0].address_components[a].types[0] == 'postal_code' ) {
						jQuery('#dlzip').val( results[0].address_components[a].long_name );
						jhtaok = true;
						jQuery('#dltopform').submit();
					}
				}
			}
			if ( jhtaok == false ) {
				status = 'inability to accurately determine your Zip/Postal Code';
			}
		}
		
		if ( jhtaok == false ) {
			alert("Geocoder failed due to:\n"+ status);
		}
	});
}

function jht_fposition( position ) {
	//alert('jackpot!! '+ position.coords.latitude + ' x ' + position.coords.longitude);
	// 32.74812376 , -117.16450744000001
	var latlng = new google.maps.LatLng( position.coords.latitude, position.coords.longitude );
	jht_geocoder.geocode({'latLng': latlng}, function(results,status) {
		if ( status == google.maps.GeocoderStatus.OK) {
			//alert('zip found? '+ results[0].address_components[7].long_name);
			jQuery('#dlzip').val( results[0].address_components[7].long_name ).blur();
			//jQuery('#dlfform').submit();
		} else {
			alert("Geocoder failed due to:\n"+ status);
		}
	});
}

(function($){
	$(window).load(function(){
		$('#show-msrp').click(function(){
			if ( $(this).hasClass('close') ) { 
			    $('.msrp-container').hide(); 
			    $(this).removeClass('close').text('View Suggested Retail Pricing'); 
			} else { 
			    $('.msrp-container').show(); 
			    $(this).addClass('close').text('Close'); 
			}
		});

		$('.msrp-pricing').click(function(event){
			event.preventDefault();
			$('input#dlzip').focus();
		});
	});
})(jQuery);