<?php
if ( function_exists('avala_form_submit') ) avala_form_submit();

wp_enqueue_style( 'jquery-mobile-css', 'http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css' );

get_header(); ?>	

	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		<div class="<?php wptouch_post_classes(); ?> page-title-area rounded-corners-8px">

			<h2 role="heading">Get Pricing</h2>

		</div>	
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<?php //wptouch_the_content(); ?>
                <p class="note">Please provide your information in the form below. *&nbsp;Indicates&nbsp;required&nbsp;fields.</p>
                    <form action="<?php echo get_permalink(); ?>" method="post" id="leadForm">
                        <script type="text/javascript">
                            var invalidInputs = ["www", "http"];
                            var states = null;
                            var emailAddress = 'email'; // class for email address fields
                            var required = 'required';  // class for required fields
                            var error = 'err';          // class for displaying errors
                            jQuery(document).ready(function ($) {
                                $("form#leadForm").submit(function (e) {
                                    var cancel = false;
                                    $("." + required).each(function () {
                                        if ($(this).val() === "") {
                                            //$(this).addClass("error");
                                            $(this).addClass(error);
                                            if (!cancel) {
                                                cancel = true;
                                                $(this).focus();
                                            }
                                        }
                                    })
                                    if (cancel) e.preventDefault();
                                });
                                $("form ." + required).blur(function() {
                                    if ($(this).val() === "") {
                                        $(this).addClass(error);
                                    } else {
                                        if ($(this).is(".email")) {
                                            return;
                                        }
                                        else {
                                            $(this).removeClass(error);
                                        }
                                    }
                                })
                                $("form ." + emailAddress).bind('blur keyup', function() {
                                    var a = $("form ." + emailAddress).val();
                                    var filter = new RegExp("\\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,4}\\b");
                                    if ($(this).val() === "") {
                                        $(this).addClass(error);
                                    }
                                    if (filter.test(a)) {
                                        $(this).removeClass(error);
                                        return true;
                                    }
                                    else {
                                        $(this).addClass(error);
                                        return false;
                                    }
                                });
                                $("form input[type=text]").bind('blur keyup', function() {
                                    var n = invalidInputs.length;
                                    for (var i = 0; i < n; i++) {
                                        if ($(this).val().toLowerCase().indexOf(invalidInputs[i]) > -1) {
                                            $(this).addClass(error);
                                            return false;
                                        }
                                    }
                                });
                                $("form .number").keydown(function (event) {
                                    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
                                    event.keyCode == 190 || event.keyCode == 110 ||
                                    (event.keyCode == 65 && event.ctrlKey === true) ||
                                    (event.keyCode >= 35 && event.keyCode <= 39)) {
                                        return;
                                    }
                                    else {
                                        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                                            event.preventDefault();
                                        }
                                    }
                                });

                                $("select.state").change(function (e) {            
                                    $("select.country").val($(this).find("option:selected").attr("data-country"));
                                });
                                $(".country").change(function (e) {
                                    var country = $(this).val();
                                    $("select.state option").remove();
                                    if ( (country == "0") || (country == "") ) {
										$('<option value="">Please select Country first</option>').prependTo('select.state');
										$('select.state').selectmenu('disable');
                                    } else {
                                        states.find("[data-country=" + country + "]").clone().appendTo("select.state");
										$('<option value="">Select State</option>').prependTo('select.state');
										$('select.state').selectmenu('enable');
                                    }
									$('select.state').selectmenu('refresh');
                                });

                                states = $("select.state").clone();
                            });
                        </script>
                        <?php avala_hidden_fields(13, 6, 5); ?>
                        <p>
                                    <label for="person_first_name">First Name*</label>
                                    <input id="person_first_name" name="FirstName" type="text" class="text w270 required" />
                                          
                                </p>
                                <p>
                                    <label for="person_last_name">Last Name*</label>
                                    <input id="person_last_name" name="LastName" type="text" class="text w270 required" />
                                </p>
                                <p>
                                    <label for="person_email">Email*</label>
                                    <input id="person_email" name="EmailAddress" type="email" class="email text w270 required" />
                                </p>
                                <p>
                                    <label for="person_phone">Phone</label>
                                    <input id="person_phone" name="Phone" type="tel" class="text w270 number" maxlength="16"/>
                                </p>
                                <p>
                                    <label for="person_postal_code">Postal Code*</label>
                                    <input id="person_postal_code" name="PostalCode" type="text" maxlength="10" class="text w270 required" /> 
                                </p>
                                <?php /*
                                <p>
                                    <label for="person_address">Address*</label>
                                    <input id="person_address" name="Address1" type="text" class="text w270 required" />
                                </p>
                                <p>
                                    <label for="person_city">City*</label>
                                    <input id="person_city" name="City" type="text" class="text w270 required" />
                                </p>
                            
                                                <p>
                                                    <label for="person_state">State*</label>
                                                    <select id="person_state" name="State" class="state w130 select" disabled="disabled"> 
                                                        <option value="">Please select Country first</option> 
                                                        <option data-country="AE" value="AD">Abu Dhabia</option> 
                                                        <option data-country="AE" value="AJ">Ajman</option> 
                                                        <option data-country="AE" value="DU">Dubai</option> 
                                                        <option data-country="AE" value="FU">Fujairah</option> 
                                                        <option data-country="AE" value="RK">Ras al-Khaimah</option> 
                                                        <option data-country="AE" value="SH">Sharjah</option> 
                                                        <option data-country="AE" value="UQ">Umm al-Quwain</option> 
                                                        <option data-country="US" value="AL">Alabama</option> 
                                                        <option data-country="FR" value="A">Alsace</option> 
                                                        <option data-country="FR" value="B">Aquitaine</option> 
                                                        <option data-country="US" value="AK">Alaska</option> 
                                                        <option data-country="FR" value="C">Auvergne</option> 
                                                        <option data-country="FR" value="P">Basse-Normandie</option> 
                                                        <option data-country="US" value="AZ">Arizona</option> 
                                                        <option data-country="FR" value="D">Bourgogne</option> 
                                                        <option data-country="US" value="AR">Arkansas</option> 
                                                        <option data-country="FR" value="E">Bretagne</option> 
                                                        <option data-country="US" value="CA">California</option> 
                                                        <option data-country="FR" value="F">Centre</option> 
                                                        <option data-country="FR" value="G">Champagne-Ardenne</option> 
                                                        <option data-country="US" value="CO">Colorado</option> 
                                                        <option data-country="US" value="CT">Connecticut</option> 
                                                        <option data-country="FR" value="H">Corse</option> 
                                                        <option data-country="FR" value="I">Franche-Comt </option> 
                                                        <option data-country="US" value="DE">Delaware</option> 
                                                        <option data-country="FR" value="Q">Haute-Normandie</option> 
                                                        <option data-country="US" value="DC">District Of Columbia</option> 
                                                        <option data-country="FR" value="J"> le-de-France</option> 
                                                        <option data-country="US" value="FL">Florida</option> 
                                                        <option data-country="US" value="GA">Georgia</option> 
                                                        <option data-country="FR" value="K">Languedoc-Roussillon</option> 
                                                        <option data-country="FR" value="L">Limousin</option> 
                                                        <option data-country="FR" value="M">Lorraine</option> 
                                                        <option data-country="US" value="HI">Hawaii</option> 
                                                        <option data-country="US" value="ID">Idaho</option> 
                                                        <option data-country="FR" value="N">Midi-Pyr n es</option> 
                                                        <option data-country="FR" value="O">Nord - Pas-de-Calais</option> 
                                                        <option data-country="US" value="IL">Illinois</option> 
                                                        <option data-country="US" value="IN">Indiana</option> 
                                                        <option data-country="FR" value="R">Pays de la Loire</option> 
                                                        <option data-country="FR" value="S">Picardie</option> 
                                                        <option data-country="US" value="IA">Iowa</option> 
                                                        <option data-country="US" value="KS">Kansas</option> 
                                                        <option data-country="FR" value="T">Poitou-Charentes</option> 
                                                        <option data-country="FR" value="U">Provence-Alpes-C te d'Azur</option> 
                                                        <option data-country="US" value="KY">Kentucky</option> 
                                                        <option data-country="US" value="LA">Louisiana</option> 
                                                        <option data-country="FR" value="V">Rh ne-Alpes</option> 
                                                        <option data-country="US" value="ME">Maine</option> 
                                                        <option data-country="US" value="MD">Maryland</option> 
                                                        <option data-country="US" value="MA">Massachusetts</option> 
                                                        <option data-country="US" value="MI">Michigan</option> 
                                                        <option data-country="US" value="MN">Minnesota</option> 
                                                        <option data-country="US" value="MS">Mississippi</option> 
                                                        <option data-country="US" value="MO">Missouri</option> 
                                                        <option data-country="US" value="MT">Montana</option> 
                                                        <option data-country="US" value="NE">Nebraska</option> 
                                                        <option data-country="US" value="NV">Nevada</option> 
                                                        <option data-country="US" value="NH">New Hampshire</option> 
                                                        <option data-country="US" value="NJ">New Jersey</option> 
                                                        <option data-country="US" value="NM">New Mexico</option> 
                                                        <option data-country="US" value="NY">New York</option> 
                                                        <option data-country="US" value="NC">North Carolina</option> 
                                                        <option data-country="US" value="ND">North Dakota</option> 
                                                        <option data-country="US" value="OH">Ohio</option> 
                                                        <option data-country="US" value="OK">Oklahoma</option> 
                                                        <option data-country="US" value="OR">Oregon</option> 
                                                        <option data-country="US" value="PA">Pennsylvania</option> 
                                                        <option data-country="US" value="RI">Rhode Island</option> 
                                                        <option data-country="US" value="SC">South Carolina</option> 
                                                        <option data-country="US" value="SD">South Dakota</option> 
                                                        <option data-country="US" value="TN">Tennessee</option> 
                                                        <option data-country="US" value="TX">Texas</option> 
                                                        <option data-country="US" value="UT">Utah</option> 
                                                        <option data-country="US" value="VT">Vermont</option> 
                                                        <option data-country="US" value="VA">Virginia</option> 
                                                        <option data-country="US" value="WA">Washington</option> 
                                                        <option data-country="US" value="WV">West Virginia</option> 
                                                        <option data-country="US" value="WI">Wisconsin</option> 
                                                        <option data-country="US" value="WY">Wyoming</option> 
                                                        <option data-country="US" value="AE">Armed Forces - Europe</option> 
                                                        <option data-country="US" value="AP">Armed Forces - Pacific</option> 
                                                        <option data-country="US" value="AA">Armed Forces - Americas</option> 
                                                        <option data-country="AS" value="AS">American Samoa</option> 
                                                        <option data-country="FM" value="FM">Micronesia</option> 
                                                        <option data-country="GU" value="GU">Guam</option> 
                                                        <option data-country="MH" value="MH">Marshall Islands</option> 
                                                        <option data-country="MP" value="MP">N Mariana Islands</option> 
                                                        <option data-country="PW" value="PW">Palau</option> 
                                                        <option data-country="PR" value="PR">Puerto Rico</option> 
                                                        <option data-country="VI" value="VI">Virgin Islands</option> 
                                                        <option data-country="CA" value="AB">Alberta</option> 
                                                        <option data-country="CA" value="BC">British Columbia</option> 
                                                        <option data-country="CA" value="MB">Manitoba</option> 
                                                        <option data-country="CA" value="NB">New Brunswick</option> 
                                                        <option data-country="CA" value="NL">Newfoundland</option> 
                                                        <option data-country="CA" value="NS">Nova Scotia</option> 
                                                        <option data-country="CA" value="NT">Northwest Territory</option> 
                                                        <option data-country="CA" value="NU">Nuavut</option> 
                                                        <option data-country="CA" value="ON">Ontario</option> 
                                                        <option data-country="CA" value="PE">Prince Edward Island</option> 
                                                        <option data-country="CA" value="QC">Qu bec</option> 
                                                        <option data-country="CA" value="SK">Saskatchewan</option> 
                                                        <option data-country="CA" value="YT">Yukon Territories</option> 
                                                        <option data-country="AU" value="SA">Southern Australia</option> 
                                                        <option data-country="AU" value="QLD">Queensland</option> 
                                                        <option data-country="AU" value="NSW">New South Wales</option> 
                                                        <option data-country="AU" value="ACT">Australian Capital Territory</option> 
                                                        <option data-country="AU" value="VIC">Victoria</option> 
                                                        <option data-country="AU" value="WA">Western Australia</option> 
                                                        <option data-country="AU" value="TAS">Tasmania</option> 
                                                        <option data-country="AU" value="NT">Northern Territory</option> 
                                                        <option data-country="BR" value="AC">Acre</option> 
                                                        <option data-country="BR" value="AL">Alagoas</option> 
                                                        <option data-country="BR" value="AM">Amazonas</option> 
                                                        <option data-country="BR" value="AP">Amap </option> 
                                                        <option data-country="BR" value="BA">Bahia</option> 
                                                        <option data-country="BR" value="CE">Cear </option> 
                                                        <option data-country="BR" value="DF">Distrito Federal</option> 
                                                        <option data-country="BR" value="ES">Espirito Santo</option> 
                                                        <option data-country="BR" value="GO">Goi s</option> 
                                                        <option data-country="BR" value="MA">Maranh o</option> 
                                                        <option data-country="BR" value="MG">Minas Gerais</option> 
                                                        <option data-country="BR" value="MS">Mato Grosso do Sul</option> 
                                                        <option data-country="BR" value="MT">Mato Grosso</option> 
                                                        <option data-country="BR" value="PA">Par </option> 
                                                        <option data-country="BR" value="PB">Para ba</option> 
                                                        <option data-country="BR" value="PE">Pernambuco</option> 
                                                        <option data-country="BR" value="PI">Piau </option> 
                                                        <option data-country="BR" value="PR">Paran </option> 
                                                        <option data-country="BR" value="RJ">Rio de Janeiro</option> 
                                                        <option data-country="BR" value="RN">Rio Grande do Norte</option> 
                                                        <option data-country="BR" value="RO">Rond nia</option> 
                                                        <option data-country="BR" value="RR">Roraima</option> 
                                                        <option data-country="BR" value="RS">Rio Grande do Sul</option> 
                                                        <option data-country="BR" value="SC">Santa Catarina</option> 
                                                        <option data-country="BR" value="SE">Sergipe</option> 
                                                        <option data-country="BR" value="SP">S o Paulo</option> 
                                                        <option data-country="BR" value="TO">Tocantins</option> 
                                                    </select>
                                                </p>

                                <p>
                                    <label for="person_country">Country*</label>
                                    <select id="person_country" name="CountryCode" class="country w270 select"> 
                                        <option value="">Select Country</option>
                                        <option value=""></option>
                                        <option value="US">United States</option> 
                                        <option value="CA">Canada</option>
                                        <option value=""></option> 
                                        <option value="AF">Afghanistan</option> 
                                        <option value="AL">Albania</option> 
                                        <option value="DZ">Algeria</option> 
                                        <option value="AS">American Samoa</option> 
                                        <option value="AD">Andorra</option> 
                                        <option value="AO">Angola</option> 
                                        <option value="AI">Anguilla</option> 
                                        <option value="AQ">ANTARCTICA</option> 
                                        <option value="AG">Antigua and Barbuda</option> 
                                        <option value="AR">Argentina</option> 
                                        <option value="AM">Armenia</option> 
                                        <option value="AW">Aruba</option> 
                                        <option value="AC">Ascension Island</option> 
                                        <option value="AU">Australia</option> 
                                        <option value="AT">Austria</option> 
                                        <option value="AZ">Azerbaijan</option> 
                                        <option value="BS">Bahamas</option> 
                                        <option value="BH">Bahrain</option> 
                                        <option value="BD">Bangladesh</option> 
                                        <option value="BB">Barbados</option> 
                                        <option value="BY">Belarus</option> 
                                        <option value="BE">Belgium</option> 
                                        <option value="BZ">Belize</option> 
                                        <option value="BJ">Benin</option> 
                                        <option value="BM">Bermuda</option> 
                                        <option value="BT">Bhutan</option> 
                                        <option value="BO">Bolivia</option> 
                                        <option value="BA">Bosnia-Herzegovina</option> 
                                        <option value="BW">Botswana</option> 
                                        <option value="BV">BOUVET ISLAND</option> 
                                        <option value="BR">Brazil</option> 
                                        <option value="IO">BRITISH INDIAN OCEAN TERRITORY</option> 
                                        <option value="BN">Brunei Darussalam</option> 
                                        <option value="BG">Bulgaria</option> 
                                        <option value="BF">Burkina Faso</option> 
                                        <option value="BI">Burundi</option> 
                                        <option value="KH">Cambodia</option> 
                                        <option value="CM">Cameroon</option> 
                                        <option value="CV">Cape Verde</option> 
                                        <option value="KY">Cayman Islands</option> 
                                        <option value="CF">Central African Republic</option> 
                                        <option value="TD">Chad</option> 
                                        <option value="CL">Chile</option> 
                                        <option value="CN">China</option> 
                                        <option value="CX">Christmas Island</option> 
                                        <option value="CC">Cocos (Keeling) Islands</option> 
                                        <option value="CO">Colombia</option> 
                                        <option value="KM">Comoros</option> 
                                        <option value="CD">Congo, Democratic Republic of the</option> 
                                        <option value="CG">Congo, Republic of</option> 
                                        <option value="CK">Cook Islands</option> 
                                        <option value="CR">Costa Rica</option> 
                                        <option value="CI">Cote d'Ivoire</option> 
                                        <option value="HR">Croatia</option> 
                                        <option value="CU">Cuba</option> 
                                        <option value="CY">Cyprus</option> 
                                        <option value="CZ">Czech Republic</option> 
                                        <option value="DK">Denmark</option> 
                                        <option value="DJ">Djibouti</option> 
                                        <option value="DM">Dominica</option> 
                                        <option value="DO">Dominican Republic</option> 
                                        <option value="TL">East Timor</option> 
                                        <option value="EC">Ecuador</option> 
                                        <option value="EG">Egypt</option> 
                                        <option value="SV">El Salvador</option> 
                                        <option value="GQ">Equatorial Guinea</option> 
                                        <option value="ER">Eritrea</option> 
                                        <option value="EE">Estonia</option> 
                                        <option value="ET">Ethiopia</option> 
                                        <option value="FK">Falkland Islands</option> 
                                        <option value="FO">Faroe Islands</option> 
                                        <option value="FJ">Fiji</option> 
                                        <option value="FI">Finland</option> 
                                        <option value="00">Foreign</option> 
                                        <option value="FR">France</option> 
                                        <option value="GF">French Guiana</option> 
                                        <option value="PF">French Polynesia</option> 
                                        <option value="TF">French Southern Territories</option> 
                                        <option value="GA">Gabon</option> 
                                        <option value="GM">Gambia</option> 
                                        <option value="GE">Georgia</option> 
                                        <option value="DE">Germany</option> 
                                        <option value="GH">Ghana</option> 
                                        <option value="GI">Gibraltar</option> 
                                        <option value="GR">Greece</option> 
                                        <option value="GL">Greenland</option> 
                                        <option value="GD">Grenada</option> 

                                        <option value="GP">Guadeloupe</option> 
                                        <option value="GU">Guam</option> 
                                        <option value="GT">Guatemala</option> 
                                        <option value="GG">Guernsey</option> 
                                        <option value="GN">Guinea</option> 
                                        <option value="GW">Guinea-Bissau</option> 
                                        <option value="GY">Guyana</option> 
                                        <option value="HT">Haiti</option> 
                                        <option value="HM">Heard and McDonald Islands</option> 
                                        <option value="VA">HOLY SEE (VATICAN CITY STATE)</option> 
                                        <option value="HN">Honduras</option> 
                                        <option value="HK">Hong Kong</option> 
                                        <option value="HU">Hungary</option> 
                                        <option value="IS">Iceland</option> 
                                        <option value="IN">India</option> 
                                        <option value="ID">Indonesia</option> 
                                        <option value="IR">Iran</option> 
                                        <option value="IQ">Iraq</option> 
                                        <option value="IE">Ireland</option> 
                                        <option value="IM">Isle of Man</option> 
                                        <option value="IL">Israel</option> 
                                        <option value="IT">Italy</option> 
                                        <option value="JM">Jamaica</option> 
                                        <option value="JP">Japan</option> 
                                        <option value="JE">Jersey</option> 
                                        <option value="JO">Jordan</option> 
                                        <option value="KZ">Kazakhstan</option> 
                                        <option value="KE">Kenya</option> 
                                        <option value="KI">Kiribati</option> 
                                        <option value="KW">Kuwait</option> 
                                        <option value="KG">Kyrgyzstan</option> 
                                        <option value="LA">Laos</option> 
                                        <option value="LV">Latvia</option> 
                                        <option value="LB">Lebanon</option> 
                                        <option value="LS">Lesotho</option> 
                                        <option value="LR">Liberia</option> 
                                        <option value="LY">Libya</option> 
                                        <option value="LI">Liechtenstein</option> 
                                        <option value="LT">Lithuania</option> 
                                        <option value="LU">Luxembourg</option> 
                                        <option value="MO">Macao</option> 
                                        <option value="MK">Macedonia</option> 
                                        <option value="MG">Madagascar</option> 
                                        <option value="MW">Malawi</option> 
                                        <option value="MY">Malaysia</option> 
                                        <option value="MV">Maldives</option> 
                                        <option value="ML">Mali</option> 
                                        <option value="MT">Malta</option> 
                                        <option value="MH">Marshall Islands</option> 
                                        <option value="MQ">Martinique</option> 
                                        <option value="MR">Mauritania</option> 
                                        <option value="MU">Mauritius</option> 
                                        <option value="YT">Mayotte</option> 
                                        <option value="MX">Mexico</option> 
                                        <option value="FM">Micronesia, Federal State of</option> 
                                        <option value="MD">Moldova, Republic of</option> 
                                        <option value="MC">Monaco</option> 
                                        <option value="MN">Mongolia</option> 
                                        <option value="MS">Montserrat</option> 
                                        <option value="MA">Morocco</option> 
                                        <option value="MZ">Mozambique</option> 
                                        <option value="MM">Myanmar</option> 
                                        <option value="NA">Namibia</option> 
                                        <option value="NR">Nauru</option> 
                                        <option value="NP">Nepal</option> 
                                        <option value="NL">Netherlands</option> 
                                        <option value="AN">Netherlands Antilles</option> 
                                        <option value="NC">New Caledonia</option> 
                                        <option value="NZ">New Zealand</option> 
                                        <option value="NI">Nicaragua</option> 
                                        <option value="NE">Niger</option> 
                                        <option value="NG">Nigeria</option> 
                                        <option value="NU">Niue</option> 
                                        <option value="NF">Norfolk Island</option> 
                                        <option value="KP">North Korea</option> 
                                        <option value="MP">Northern Mariana Islands</option> 
                                        <option value="NO">Norway</option> 
                                        <option value="OM">Oman</option> 
                                        <option value="PK">Pakistan</option> 
                                        <option value="PW">Palau</option> 
                                        <option value="PS">Palestinian Territories</option> 
                                        <option value="PA">Panama</option> 
                                        <option value="PG">Papua New Guinea</option> 
                                        <option value="PY">Paraguay</option> 
                                        <option value="PE">Peru</option> 
                                        <option value="PH">Philippines</option> 
                                        <option value="PN">Pitcairn Island</option> 
                                        <option value="PL">Poland</option> 
                                        <option value="PT">Portugal</option> 
                                        <option value="PR">Puerto Rico</option> 
                                        <option value="QA">Qatar</option> 
                                        <option value="RE">Reunion Island</option> 
                                        <option value="RO">Romania</option> 
                                        <option value="RU">Russian Federation</option> 
                                        <option value="RW">Rwanda</option> 
                                        <option value="KN">Saint Kitts and Nevis</option> 
                                        <option value="LC">Saint Lucia</option> 
                                        <option value="VC">Saint Vincent and the Grenadines</option> 
                                        <option value="SM">San Marino</option> 
                                        <option value="ST">Sao Tome and Principe</option> 
                                        <option value="SA">Saudi Arabia</option> 
                                        <option value="SN">Senegal</option> 
                                        <option value="RS">Serbia</option> 
                                        <option value="CS">Serbia & Montenegro</option> 
                                        <option value="SC">Seychelles</option> 
                                        <option value="SL">Sierra Leone</option> 
                                        <option value="SG">Singapore</option> 
                                        <option value="SK">Slovakia</option> 
                                        <option value="SI">Slovenia</option> 
                                        <option value="SB">Solomon Islands</option> 
                                        <option value="SO">Somalia</option> 
                                        <option value="ZA">South Africa</option> 
                                        <option value="GS">South Georgia and the South Sandwich Islands</option> 
                                        <option value="KR">South Korea</option> 
                                        <option value="ES">Spain</option> 
                                        <option value="LK">Sri Lanka</option> 
                                        <option value="SH">St. Helena</option> 
                                        <option value="WL">St. Lucia</option> 
                                        <option value="PM">St. Pierre & Miquelon</option> 
                                        <option value="WV">St. Vincent & The Grenadines</option> 
                                        <option value="SD">Sudan</option> 
                                        <option value="SR">Suriname</option> 
                                        <option value="SJ">Svalbard and Jan Mayen Islands</option> 
                                        <option value="SZ">Swaziland</option> 
                                        <option value="SE">Sweden</option> 
                                        <option value="CH">Switzerland</option> 
                                        <option value="SY">Syrian Arab Republic</option> 
                                        <option value="TW">Taiwan</option> 
                                        <option value="TJ">Tajikistan</option> 
                                        <option value="TZ">Tanzania</option> 
                                        <option value="TH">Thailand</option> 
                                        <option value="TG">Togo</option> 
                                        <option value="TK">Tokelau</option> 
                                        <option value="TO">Tonga</option> 
                                        <option value="TT">Trinidad and Tobago</option> 
                                        <option value="TA">Tristan da Cunha</option> 
                                        <option value="TN">Tunisia</option> 
                                        <option value="TR">Turkey</option> 
                                        <option value="TM">Turkmenistan</option> 
                                        <option value="TC">Turks and Caicos Islands</option> 
                                        <option value="TV">Tuvalu</option> 
                                        <option value="UG">Uganda</option> 
                                        <option value="UA">Ukraine</option> 
                                        <option value="AE">United Arab Emirates</option> 
                                        <option value="GB">United Kingdom</option> 
                                        <option value="UY">Uruguay</option> 
                                        <option value="UM">US Minor Outlying Islands</option> 
                                        <option value="UZ">Uzbekistan</option> 
                                        <option value="VU">Vanuatu</option> 
                                        <option value="VE">Venezuela</option> 
                                        <option value="VN">Vietnam</option> 
                                        <option value="VG">Virgin Islands (British)</option> 
                                        <option value="VI">Virgin Islands (USA)</option> 
                                        <option value="WF">Wallis and Futuna Islands</option> 
                                        <option value="EH">Western Sahara</option> 
                                        <option value="WS">Western Samoa</option> 
                                        <option value="YE">Yemen</option> 
                                        <option value="YU">Yugoslavia</option> 
                                        <option value="ZM">Zambia</option> 
                                        <option value="ZW">Zimbabwe</option> 
                                        <option value="ME">Montenegro</option> 
                                        <option value="MF">Saint Martin</option> 
                                        <option value="BL">Saint Barth</option> 
                                    </select>
                                </p>
                                */ ?>
                            
                            
                                <fieldset data-role="controlgroup" data-type="horizontal">
                                    <legend>Do you currently own, or have you ever owned a hot tub?</legend>
                                    <input type="radio" name="CustomData[CurrentOwner]" id="currentowner-no" value="No" checked="checked" />
                                    <label for="currentowner-no">No</label>
                                    <input type="radio" name="CustomData[CurrentOwner]" id="currentowner-yes" value="Yes" />
                                    <label for="currentowner-yes">Yes</label>
                                </fieldset>
                            
                            
                                <p>
                                    <label> Which product are you interested in purchasing most? </label>
                                    <select name="CustomData[ProductIdList]" id="ProductList" class="w270 select"> 
                                        <option value="0">Not Specified</option> 
                        <option value="1">Constance</option> 
                        <option value="2">Victoria</option>
                        <option value="3">Maxxus</option> 
                        <option value="4">Aspen</option> 
                        <option value="5">Optima</option> 
                        <option value="6">Cameo</option> 
                        <option value="7">Majesta</option> 
                        <option value="8">Altamar</option> 
                        <option value="9">Marin</option> 
                        <option value="10">Capri</option> 
                        <option value="11">Optima In-Ground</option> 
                        <option value="12">Cameo In-Ground</option> 
                        <option value="13">Marin In-Ground</option> 
                        <option value="14">Chelsee</option> 
                        <option value="15">Hamilton</option> 
                        <option value="16">Certa</option> 
                        <option value="17">Camden</option> 
                        <option value="18">Dover</option> 
                        <option value="19">Hartford</option> 
                        <option value="20">Hawthorne</option> 
                        <option value="21">Peyton</option> 
                        <option value="22">Edison</option> 
                        <option value="23">Denali</option> 
                        <option value="24">Tacoma</option> 
                                    </select> 
                                </p>
                                    <fieldset class="control large" data-role="controlgroup">
                                    		<legend>When do you plan to purchase a hot tub?</legend>
                                            <input name="CustomData[BuyTimeFrame]" id="buytimeframe-a" value="Not sure" type="radio"/>
                                            <label for="buytimeframe-a">Not sure</label> 
                                            <input name="CustomData[BuyTimeFrame]" id="buytimeframe-b" value="Within 1 month" type="radio"/>
                                            <label for="buytimeframe-b">Within 1 month</label> 
                                            <input name="CustomData[BuyTimeFrame]" id="buytimeframe-c" value="1-3 months" type="radio"/>
                                            <label for="buytimeframe-c">1-3 months</label> 
                                            <input name="CustomData[BuyTimeFrame]" id="buytimeframe-d" value="4-6 months" type="radio"/>
                                            <label for="buytimeframe-d">4-6 months</label> 
                                            <input name="CustomData[BuyTimeFrame]" id="buytimeframe-e" value="6+ months" type="radio"/>
                                            <label for="buytimeframe-e">6+ months</label> 
                                    </fieldset>
                                    <fieldset class="control large" data-role="controlgroup">
		                                    <legend>What is the primary reason you are considering the purchase of a hot tub?</legend>
                                            <label for="CustomData"><input name="CustomData[ProductUse]" value="Relaxation" type="radio"/>  Relaxation </label> 
                                            <label for="CustomData"><input name="CustomData[ProductUse]" value="Pain Relief/Therapy" type="radio"/>  Pain Relief/Therapy </label> 
                                            <label for="CustomData"><input name="CustomData[ProductUse]" value="Bonding/Family" type="radio"/>  Bonding/Family </label> 
                                            <label for="CustomData"><input name="CustomData[ProductUse]" value="Backyard Entertaining" type="radio"/>  Backyard Entertaining </label> 
                                    </fieldset>
                            
                                <?php /*
                                <p>
                                    <?php // Seating Capacity select ?>
                                    <label> What seating capacity are you searching for? </label>
                                    <fieldset class="control large">  
                                        <label for="CustomData"><input name="CustomData[Capacity]" value="2-3 person" type="radio"/>  2-3 Person </label> 
                                        <label for="CustomData"><input name="CustomData[Capacity]" value="3-4 person" type="radio"/>  3-4 Person </label> 
                                        <label for="CustomData"><input name="CustomData[Capacity]" value="4-5 person" type="radio"/>  4-5 Person </label> 
                                        <label for="CustomData"><input name="CustomData[Capacity]" value="5-6 person" type="radio"/>  5-6 Person </label> 
                                        <label for="CustomData"><input name="CustomData[Capacity]" value="6+ person" type="radio"/>  6+ Person </label> 
                                    </fieldset>
                                </p>
                            
                            <tr class="divider">
                                <td colspan="2"></p>
                            
                            
                                <p>
                                    <?php // Number of Jets select ?>
                                    <label> How many jets are you looking for in a hot tub? </label>
                                    <fieldset class="control large">  
                                        <label for="CustomData"><input name="CustomData[JetCount]" value="Not sure" type="radio"/>  Not Sure </label> 
                                        <label for="CustomData"><input name="CustomData[JetCount]" value="10-30" type="radio"/>  10-30 </label> 
                                        <label for="CustomData"><input name="CustomData[JetCount]" value="30-50" type="radio"/>  30-50 </label> 
                                        <label for="CustomData"><input name="CustomData[JetCount]" value="50-70" type="radio"/>  50-70 </label> 
                                        <label for="CustomData"><input name="CustomData[JetCount]" value="70+" type="radio"/>  70+ </label> 
                                    </fieldset>
                                </p>
                                <p>
                                    <?php // What type of jets select ?>
                                    <label> What type of jet are you most interested in? </label>
                                    <fieldset class="control large">  
                                        <label for="CustomData"><input name="CustomData[JetType]" value="Not sure" type="radio"/>  Not Sure </label> 
                                        <label for="CustomData"><input name="CustomData[JetType]" value="Massaging/Swirling" type="radio"/>  Massaging/Swirling </label> 
                                        <label for="CustomData"><input name="CustomData[JetType]" value="Neck Jets" type="radio"/>  Neck Jets </label> 
                                        <label for="CustomData"><input name="CustomData[JetType]" value="Foot Jets" type="radio"/>  Foot Jets </label> 
                                        <label for="CustomData"><input name="CustomData[JetType]" value="Direct Laser Jets" type="radio"/>  Direct Laser Jets </label> 
                                        <label for="CustomData"><input name="CustomData[JetType]" value="Combination" type="radio"/>  Combination </label> 
                                    </fieldset>
                                </p>
                            
                            <tr class="divider">
                                <td colspan="2"></p>
                            
                            
                                <p>
                                    <?php // Location select ?>
                                    <label> Where do you plan to install your hot tub? </label>
                                    <fieldset class="control large">  
                                        <label for="CustomData"><input name="CustomData[Location]" value="Not sure" type="radio"/>  Not Sure </label> 
                                        <label for="CustomData"><input name="CustomData[Location]" value="Inside" type="radio"/>  Inside </label> 
                                        <label for="CustomData"><input name="CustomData[Location]" value="Outside, ground" type="radio"/>  Outside, ground </label> 
                                        <label for="CustomData"><input name="CustomData[Location]" value="Outside, deck" type="radio"/>  Outside, deck </label> 
                                    </fieldset>
                                </p>
                                <p>
                                    <?php // Type select ?>
                                    <label> What type of hot tub are you looking for? </label>
                                    <fieldset class="control large">  
                                        <label for="CustomData"><input name="CustomData[Type]" value="Not sure" type="radio"/>  Not Sure </label> 
                                        <label for="CustomData"><input name="CustomData[Type]" value="Free-standing" type="radio"/>  Free-standing </label> 
                                        <label for="CustomData"><input name="CustomData[Type]" value="Built-in" type="radio"/>  Built-in </label> 
                                    </fieldset>
                                </p>
                            
                            <tr class="divider">
                                <td colspan="2"></p>
                            
                            
                                <p>
                                    <?php // Budget select ?>
                                    <label> What is your estimated budget? </label>
                                    <fieldset class="control large">  
                                        <label for="CustomData"><input name="CustomData[Budget]" value="Not sure" type="radio"/>  Not Sure </label> 
                                        <label for="CustomData"><input name="CustomData[Budget]" value="$3,000 - $3,999" type="radio"/>  $3,000 - $3,999 </label> 
                                        <label for="CustomData"><input name="CustomData[Budget]" value="$4,000 - $6,999" type="radio"/>  $4,000 - $6,999 </label> 
                                        <label for="CustomData"><input name="CustomData[Budget]" value="$7,000-$9,999" type="radio"/>  $7,000-$9,999 </label> 
                                        <label for="CustomData"><input name="CustomData[Budget]" value="$10,000-$12,999" type="radio"/>  $10,000-$12,999 </label> 
                                        <label for="CustomData"><input name="CustomData[Budget]" value="$13,000+" type="radio"/>  $13,000+ </label> 
                                    </fieldset>
                                </p>
                            
                             */ ?>
                            
                            <p>
                            <label for="ReceiveEmailCampaigns"><input class="editor choice" name="ReceiveEmailCampaigns" value="true" type="checkbox" checked="checked" />  Please send me exclusive sale alerts from Sundance&nbsp;Spas. </label>
                             </p>
                            
                            
                                <?php // LeadTypeId must be defined for all except brochure ?> 
                                <input data-val="true" data-val-number="The field LeadTypeId must be a number." data-val-required="The LeadTypeId field is required." id="LeadTypeId" name="LeadTypeId" type="hidden" value="5" />
                                <p>
                                    <input type="hidden" name="fromurl" value="http://www.sundancespas.com/get-a-quote/" />
                                    <input type="submit" class="submit bigBtn" value="GET PRICING" />
                                </p>
                        <p class="note">Your privacy is very important to us. See our <a href="http://www.sundancespas.com/about-us/privacy-policy/" target="_blank">Privacy Policy</a>.</p>
                    </form>
			</div>
			

		</div><!-- wptouch_posts_classes() -->

	<?php } ?>

<?php get_footer(); ?>