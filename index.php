<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![ENDif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![ENDif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![ENDif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![ENDif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="resources/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
  <link href="resources/css/style.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $("input[name=postnummer]").keyup("change", function() {
        $this = $(this);
        /*https://api.bring.com/shippingguide/api/postalCode.html?clientUrl=localhost/postnummer/ajax2.html&pnr="*/
        $.getJSON("https://fraktguide.bring.no/fraktguide/api/postalCode.json?country=no&pnr=" + $(this).val() + "&callback=?",
          function(json) {
            $("input[name=poststed]").val((json.result));
            //  $("input[name=pnr]").val((json.result));
          });
      });
    });
  </script>

  <title>Registreringsskjema</title>


</head>

<body>

  <?php
  if (isset ($_REQUEST['register'])) {

   $xml = new DOMDocument("1.0","UTF-8");
   $xml->load("registreringsdata.xml");

   $rootTag = $xml->getElementsByTagName("document")->item(0);

   $dataTag = $xml->createElement("data");

   $kjonnTag = $xml->createElement("kjonn",$_REQUEST['kjonn']);
   $fornavnTag = $xml->createElement("fornavn",$_REQUEST['fornavn']);
   $etternavnTag = $xml->createElement("etternavn",$_REQUEST['etternavn']);
   $personnummerTag = $xml->createElement("personnummer",$_REQUEST['personnummer']);
   $adresseTag = $xml->createElement("adresse",$_REQUEST['adresse']);
   $postnummerTag = $xml->createElement("postnummer",$_REQUEST['postnummer']);
   $poststedTag = $xml->createElement("poststed",$_REQUEST['poststed']);
   $kommuneTag = $xml->createElement("kommune",$_REQUEST['kommune']);
   $telefonnummerTag = $xml->createElement("telefonnummer",$_REQUEST['telefonnummer']);
   $epostTag = $xml->createElement("epost",$_REQUEST['epost']);
   $bankkontonummerTag = $xml->createElement("bankkontonummer",$_REQUEST['bankkontonummer']);
   $statsborgerskapTag = $xml->createElement("statsborgerskap",$_REQUEST['statsborgerskap']);
   $npnnavnTag = $xml->createElement("npnnavn",$_REQUEST['npnnavn']);
   $npnrelasjonTag = $xml->createElement("npnrelasjon",$_REQUEST['npnrelasjon']);
   $npntelefonnummerTag = $xml->createElement("npntelefonnummer",$_REQUEST['npntelefonnummer']);
   $biarbeidsgiverTag = $xml->createElement("biarbeidsgiver",$_REQUEST['biarbeidsgiver']);
   $skoTag = $xml->createElement("sko",$_REQUEST['sko']);
   $tskjorteTag = $xml->createElement("tskjorte",$_REQUEST['tskjorte']);
   $genserTag = $xml->createElement("genser",$_REQUEST['genser']);
   $jakkeTag = $xml->createElement("jakke",$_REQUEST['jakke']);
   $bukseTag = $xml->createElement("bukse",$_REQUEST['bukse']);
   $firmabilTag = $xml->createElement("firmabil",$_REQUEST['firmabil']);
   $mobilaboTag = $xml->createElement("mobilabo",$_REQUEST['mobilabo']);
   $pcTag = $xml->createElement("pc",$_REQUEST['pc']);




   $dataTag->appendChild($kjonnTag);
   $dataTag->appendChild($fornavnTag);
   $dataTag->appendChild($etternavnTag);
   $dataTag->appendChild($personnummerTag);
   $dataTag->appendChild($adresseTag);
   $dataTag->appendChild($postnummerTag);
   $dataTag->appendChild($poststedTag);
   $dataTag->appendChild($kommuneTag);
   $dataTag->appendChild($telefonnummerTag);
   $dataTag->appendChild($epostTag);
   $dataTag->appendChild($bankkontonummerTag);
   $dataTag->appendChild($statsborgerskapTag);
   $dataTag->appendChild($npnnavnTag);
   $dataTag->appendChild($npnrelasjonTag);
   $dataTag->appendChild($npntelefonnummerTag);
   $dataTag->appendChild($biarbeidsgiverTag);
   $dataTag->appendChild($skoTag);
   $dataTag->appendChild($tskjorteTag);
   $dataTag->appendChild($genserTag);
   $dataTag->appendChild($jakkeTag);
   $dataTag->appendChild($bukseTag);
   $dataTag->appendChild($firmabilTag);
   $dataTag->appendChild($mobilaboTag);
   $dataTag->appendChild($pcTag);

   $rootTag->appendChild($dataTag);

   $xml->save("registreringsdata.xml");

   // Redirect to this page.
   header("Location: " . $_SERVER['REQUEST_URI']);
   exit();

  }
  ?>




  <div class="logo">
    <img src="resources/images/logo.svg" alt="Digital HR Logo" id="logo" style="  width: 300px;
      display: block;
      margin-left: auto;
      margin-right: auto;">
  </div>

  <div class="container">
    <div class="col-lg-9">

      <fieldset>
        <div>
          <img src="resources/images/personalialogo.svg" alt="Personalia Logo" id="personalialogo">
          <legend id="personalia">Personalia</legend>
          <hr />
        </div>


        <form class="form-horizontal" action="index.php" method="post" id="reg_form">

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Kjønn</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="kjonn" class="form-control selectpicker" required>
                    <option value="" disabled selected>Velg ditt kjønn</option>
                    <option value="mann">Mann</option>
                    <option value="kvinne">Kvinne</option>
                    <option value="annet">Annet</option>
                  </select>
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Fornavn</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" id="fornavn"
                name="fornavn" placeholder="Fornavn" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Etternavn</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" id="etternavn" name="etternavn" placeholder="Etternavn" required="true" autocomplete="off">
              </div>
            </div>
          </div>


          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Personnummer </label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" pattern="^[0-9]{11}$" class="form-control" name="personnummer" placeholder="Personnummer" required="true" maxlength="11" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Adresse</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" pattern="^[a-zA-ZÆØÅæøå0-9 ]+$" class="form-control" name="adresse" placeholder="Adresse" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Postnummer</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" pattern="^[0-9]{4}$" id="postnummer" class="form-control" name="postnummer" placeholder="Postnummer" required="true" maxlength="4" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Poststed</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" name="poststed" placeholder="Poststed" autocomplete="off" readonly />
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Kommune</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" name="kommune" placeholder="Kommune" required="true" autocomplete="off">
              </div>
            </div>
          </div>


          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Telefonnummer</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input type="text" pattern="^[0-9\-\+]{8,15}$" class="form-control" name="telefonnummer" placeholder="Telefonnummer" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">E-post</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" class="form-control" id="epost" name="epost" placeholder="epost@adresse.no" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Bankkontonummer</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input type="text" pattern="^[0-9]{11}$" class="form-control" name="bankkontonummer" placeholder="Bankkontonummer" maxlength="11" required="true" autocomplete="off">
              </div>
            </div>
          </div>


          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Statsborgerskap</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="statsborgerskap" class="form-control selectpicker" required>
              <!--<option value="" >Velg ditt statsborgerskap</option>-->
              <option value="AF">Afghanistan</option>
            	<option value="AX">Åland Islands</option>
            	<option value="AL">Albania</option>
            	<option value="DZ">Algeria</option>
            	<option value="AS">American Samoa</option>
            	<option value="AD">Andorra</option>
            	<option value="AO">Angola</option>
            	<option value="AI">Anguilla</option>
            	<option value="AQ">Antarctica</option>
            	<option value="AG">Antigua and Barbuda</option>
            	<option value="AR">Argentina</option>
            	<option value="AM">Armenia</option>
            	<option value="AW">Aruba</option>
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
            	<option value="BO">Bolivia, Plurinational State of</option>
            	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            	<option value="BA">Bosnia and Herzegovina</option>
            	<option value="BW">Botswana</option>
            	<option value="BV">Bouvet Island</option>
            	<option value="BR">Brazil</option>
            	<option value="IO">British Indian Ocean Territory</option>
            	<option value="BN">Brunei Darussalam</option>
            	<option value="BG">Bulgaria</option>
            	<option value="BF">Burkina Faso</option>
            	<option value="BI">Burundi</option>
            	<option value="KH">Cambodia</option>
            	<option value="CM">Cameroon</option>
            	<option value="CA">Canada</option>
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
            	<option value="CG">Congo</option>
            	<option value="CD">Congo, the Democratic Republic of the</option>
            	<option value="CK">Cook Islands</option>
            	<option value="CR">Costa Rica</option>
            	<option value="CI">Côte d'Ivoire</option>
            	<option value="HR">Croatia</option>
            	<option value="CU">Cuba</option>
            	<option value="CW">Curaçao</option>
            	<option value="CY">Cyprus</option>
            	<option value="CZ">Czech Republic</option>
            	<option value="DK">Denmark</option>
            	<option value="DJ">Djibouti</option>
            	<option value="DM">Dominica</option>
            	<option value="DO">Dominican Republic</option>
            	<option value="EC">Ecuador</option>
            	<option value="EG">Egypt</option>
            	<option value="SV">El Salvador</option>
            	<option value="GQ">Equatorial Guinea</option>
            	<option value="ER">Eritrea</option>
            	<option value="EE">Estonia</option>
            	<option value="ET">Ethiopia</option>
            	<option value="FK">Falkland Islands (Malvinas)</option>
            	<option value="FO">Faroe Islands</option>
            	<option value="FJ">Fiji</option>
            	<option value="FI">Finland</option>
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
            	<option value="HM">Heard Island and McDonald Islands</option>
            	<option value="VA">Holy See (Vatican City State)</option>
            	<option value="HN">Honduras</option>
            	<option value="HK">Hong Kong</option>
            	<option value="HU">Hungary</option>
            	<option value="IS">Iceland</option>
            	<option value="IN">India</option>
            	<option value="ID">Indonesia</option>
            	<option value="IR">Iran, Islamic Republic of</option>
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
            	<option value="KP">Korea, Democratic People's Republic of</option>
            	<option value="KR">Korea, Republic of</option>
            	<option value="KW">Kuwait</option>
            	<option value="KG">Kyrgyzstan</option>
            	<option value="LA">Lao People's Democratic Republic</option>
            	<option value="LV">Latvia</option>
            	<option value="LB">Lebanon</option>
            	<option value="LS">Lesotho</option>
            	<option value="LR">Liberia</option>
            	<option value="LY">Libya</option>
            	<option value="LI">Liechtenstein</option>
            	<option value="LT">Lithuania</option>
            	<option value="LU">Luxembourg</option>
            	<option value="MO">Macao</option>
            	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
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
            	<option value="FM">Micronesia, Federated States of</option>
            	<option value="MD">Moldova, Republic of</option>
            	<option value="MC">Monaco</option>
            	<option value="MN">Mongolia</option>
            	<option value="ME">Montenegro</option>
            	<option value="MS">Montserrat</option>
            	<option value="MA">Morocco</option>
            	<option value="MZ">Mozambique</option>
            	<option value="MM">Myanmar</option>
            	<option value="NA">Namibia</option>
            	<option value="NR">Nauru</option>
            	<option value="NP">Nepal</option>
            	<option value="NL">Netherlands</option>
            	<option value="NC">New Caledonia</option>
            	<option value="NZ">New Zealand</option>
            	<option value="NI">Nicaragua</option>
            	<option value="NE">Niger</option>
            	<option value="NG">Nigeria</option>
            	<option value="NU">Niue</option>
            	<option value="NF">Norfolk Island</option>
            	<option value="MP">Northern Mariana Islands</option>
            	<option value="NO" selected>Norway</option>
            	<option value="OM">Oman</option>
            	<option value="PK">Pakistan</option>
            	<option value="PW">Palau</option>
            	<option value="PS">Palestinian Territory, Occupied</option>
            	<option value="PA">Panama</option>
            	<option value="PG">Papua New Guinea</option>
            	<option value="PY">Paraguay</option>
            	<option value="PE">Peru</option>
            	<option value="PH">Philippines</option>
            	<option value="PN">Pitcairn</option>
            	<option value="PL">Poland</option>
            	<option value="PT">Portugal</option>
            	<option value="PR">Puerto Rico</option>
            	<option value="QA">Qatar</option>
            	<option value="RE">Réunion</option>
            	<option value="RO">Romania</option>
            	<option value="RU">Russian Federation</option>
            	<option value="RW">Rwanda</option>
            	<option value="BL">Saint Barthélemy</option>
            	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
            	<option value="KN">Saint Kitts and Nevis</option>
            	<option value="LC">Saint Lucia</option>
            	<option value="MF">Saint Martin (French part)</option>
            	<option value="PM">Saint Pierre and Miquelon</option>
            	<option value="VC">Saint Vincent and the Grenadines</option>
            	<option value="WS">Samoa</option>
            	<option value="SM">San Marino</option>
            	<option value="ST">Sao Tome and Principe</option>
            	<option value="SA">Saudi Arabia</option>
            	<option value="SN">Senegal</option>
            	<option value="RS">Serbia</option>
            	<option value="SC">Seychelles</option>
            	<option value="SL">Sierra Leone</option>
            	<option value="SG">Singapore</option>
            	<option value="SX">Sint Maarten (Dutch part)</option>
            	<option value="SK">Slovakia</option>
            	<option value="SI">Slovenia</option>
            	<option value="SB">Solomon Islands</option>
            	<option value="SO">Somalia</option>
            	<option value="ZA">South Africa</option>
            	<option value="GS">South Georgia and the South Sandwich Islands</option>
            	<option value="SS">South Sudan</option>
            	<option value="ES">Spain</option>
            	<option value="LK">Sri Lanka</option>
            	<option value="SD">Sudan</option>
            	<option value="SR">Suriname</option>
            	<option value="SJ">Svalbard and Jan Mayen</option>
            	<option value="SZ">Swaziland</option>
            	<option value="SE">Sweden</option>
            	<option value="CH">Switzerland</option>
            	<option value="SY">Syrian Arab Republic</option>
            	<option value="TW">Taiwan, Province of China</option>
            	<option value="TJ">Tajikistan</option>
            	<option value="TZ">Tanzania, United Republic of</option>
            	<option value="TH">Thailand</option>
            	<option value="TL">Timor-Leste</option>
            	<option value="TG">Togo</option>
            	<option value="TK">Tokelau</option>
            	<option value="TO">Tonga</option>
            	<option value="TT">Trinidad and Tobago</option>
            	<option value="TN">Tunisia</option>
            	<option value="TR">Turkey</option>
            	<option value="TM">Turkmenistan</option>
            	<option value="TC">Turks and Caicos Islands</option>
            	<option value="TV">Tuvalu</option>
            	<option value="UG">Uganda</option>
            	<option value="UA">Ukraine</option>
            	<option value="AE">United Arab Emirates</option>
            	<option value="GB">United Kingdom</option>
            	<option value="US">United States</option>
            	<option value="UM">United States Minor Outlying Islands</option>
            	<option value="UY">Uruguay</option>
            	<option value="UZ">Uzbekistan</option>
            	<option value="VU">Vanuatu</option>
            	<option value="VE">Venezuela, Bolivarian Republic of</option>
            	<option value="VN">Viet Nam</option>
            	<option value="VG">Virgin Islands, British</option>
            	<option value="VI">Virgin Islands, U.S.</option>
            	<option value="WF">Wallis and Futuna</option>
            	<option value="EH">Western Sahara</option>
            	<option value="YE">Yemen</option>
            	<option value="ZM">Zambia</option>
            	<option value="ZW">Zimbabwe</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Nærmeste pårørendes navn</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" pattern="^[a-zA-ZÆØÅæøå ]+$" class="form-control" name="npnnavn" placeholder="Påførendes navn" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Nærmeste pårørendes relasjon</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="npnrelasjon" class="form-control selectpicker" required>
                      <option value="" disabled selected>Velg din relasjon</option>
                      <option value="forelder">Forelder</option>
                      <option value="ektefelle">Ektefelle</option>
                      <option value="samboer">Samboer</option>
                      <option value="kjaereste">Kjæreste</option>
                      <option value="sosken">Søsken</option>
                      <option value="annet">Annet</option>
                    </select>
              </div>
            </div>
          </div>

          <!-- Text input-->

          <div class="form-group">
            <label class="col-md-4 control-label">Nærmeste pårørendes telefonnummer</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input type="text" pattern="^[0-9\-\+]{8,15}$" class="form-control" name="npntelefonnummer" placeholder="Pårørendes telefonnummer" required="true" autocomplete="off">
              </div>
            </div>
          </div>


          <!-- Radio input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Er Canon biarbeidsgiver?</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group">
                <div class="radio">
                  <div>
                    <label>
                      <input type="radio" name="biarbeidsgiver" value="ja" required>Ja</label>
                  </div>
                  <div>
                    <label>
                      <input type="radio" name="biarbeidsgiver" value="nei" required>Nei</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <legend id="tilleggsopplysninger">Tilleggsopplysninger</legend>
          <hr />

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Skostørrelse</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="sko" class="form-control selectpicker">
                      <option value="" disabled selected>Velg din skostørrelse</option>
                      <option value="34">34</option>
            				  <option value="35">35</option>
            				  <option value="36">36</option>
            				  <option value="37">37</option>
            				  <option value="38">38</option>
            				  <option value="39">39</option>
                      <option value="40">40</option>
                      <option value="41">41</option>
                      <option value="42">42</option>
                      <option value="43">43</option>
                      <option value="44">44</option>
                      <option value="45">45</option>
                      <option value="46">46</option>
                      <option value="47">47</option>
                      <option value="48">48</option>
                    </select>
              </div>
            </div>
          </div>


          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">T-skjorte</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="tskjorte" class="form-control selectpicker">
                      <option value="" disabled selected>Velg din t-skjortestørrelse</option>
                      <option value="xs">XS</option>
              			  <option value="s">S</option>
              			  <option value="m">M</option>
              			  <option value="l">L</option>
              			  <option value="xl">XL</option>
              			  <option value="xxl">XXL</option>
                    </select>
              </div>
            </div>
          </div>

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Genser</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="genser" class="form-control selectpicker">
                      <option value="" disabled selected>Velg din genserstørrelse</option>
                      <option value="xs">XS</option>
                      <option value="s">S</option>
                      <option value="m">M</option>
                      <option value="l">L</option>
                      <option value="xl">XL</option>
                      <option value="xxl">XXL</option>
                    </select>
              </div>
            </div>
          </div>

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Jakke</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="jakke" class="form-control selectpicker">
                      <option value="" disabled selected>Velg din jakkestørrelse</option>
                      <option value="xs">XS</option>
                      <option value="s">S</option>
                      <option value="m">M</option>
                      <option value="l">L</option>
                      <option value="xl">XL</option>
                      <option value="xxl">XXL</option>
                    </select>
              </div>
            </div>
          </div>

          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Bukse</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="bukse" class="form-control selectpicker">
                      <option value="" disabled selected>Velg din buksestørrelse</option>
                      <option value="xs">XS</option>
                      <option value="s">S</option>
                      <option value="m">M</option>
                      <option value="l">L</option>
                      <option value="xl">XL</option>
                      <option value="xxl">XXL</option>
                    </select>
              </div>
            </div>
          </div>

          <!-- Radio input-->

          <div class="radios">
            <label class="col-md-4 control-label">Disponener du bil?</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group">
                <div class="radio">
                  <div>
                    <label>
                      <input type="radio" name="firmabil" value="ja">Ja</label>
                  </div>
                  <div>
                    <label>
                      <input type="radio" name="firmabil" value="nei">Nei</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Radio input-->

          <div class="radios">
            <label class="col-md-4 control-label">Vil du overføre privat mobilnummer til bedrift?</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group">
                <div class="radio">
                  <div>
                    <label>
                      <input type="radio" name="mobilabo" value="ja">Ja</label>
                  </div>
                  <div>
                    <label>
                      <input type="radio" name="mobilabo" value="nei">Nei (Nytt nummer opprettes)</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Radio input-->

          <div class="radios">
            <label class="col-md-4 control-label">Foretrukket datamaskin?</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group">
                <div class="radio">
                  <div>
                    <label>
                      <input type="radio" name="pc" value="pc">PC</label>
                  </div>
                  <div>
                    <label>
                      <input type="radio" name="pc" value="mac">Mac</label>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
              <button type="submit" name="register" class="btn btn-warning">Registrer <span class="glyphicon glyphicon-send"></span></button>
            </div>
          </div>
      </fieldset>
      </form>
    </div>



  </div>

  <!-- /.container -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

  <script type="text/javascript">


    $(document).ready(function() {
      $('#reg_form').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            kjonn: {
              validators: {
                notEmpty: {
                  message: 'Vennligst velg ditt kjønn'
                }
              }
            },
            fornavn: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut fornavnet ditt'
                }
              }
            },
            etternavn: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut etternavnet ditt'
                }
              }
            },
            personnummer: {
              validators: {
                stringLength: {
                  min: 0,
                  message: 'Vennligst fyll ut personnummeret ditt'
                },
                notEmpty: {
                  message: 'Vennligst fyll ut personnummeret ditt, 11 siffer'
                }
              }
            },
            adresse: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut addressen din'
                }
              }
            },
            postnummer: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut postnummeret ditt, 4 siffer'
                }
              }
            },
            kommune: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut kommunen din'
                }
              }
            },
            telefonnummer: {
              validators: {
                notEmpty: {
                  message: 'Vennligst fyll ut telefonummeret ditt'
                },
                telefonnummer: {
                  country: 'NO',
                  message: 'Vennligst fyll ut telefonnummeret ditt'
                }
              }
            },
            epost: {
              validators: {
                notEmpty: {
                  message: 'Vennligst fyll ut eposten din'
                },
                emailAddress: {
                  message: 'Vennligst fyll ut eposten din. (epost@epost.no)'
                }
              }
            },
            bankkontonummer: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut bankkontonummeret ditt, 11 siffer'
                }
              }
            },
            statsborgerskap: {
              validators: {
                notEmpty: {
                  message: 'Vennligst velg ditt statsborgerskap'
                }
              }
            },
            npnnavn: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut navnet til nærmeste pårørende'
                }
              }
            },
            npnrelasjon: {
              validators: {
                notEmpty: {
                  message: 'Vennligst velg din relasjon til nærmeste pårørende'
                }
              }
            },
            npntelefonnummer: {
              validators: {
                stringLength: {
                  min: 0,
                },
                notEmpty: {
                  message: 'Vennligst fyll ut telefonummeret til din nærmeste pårørende'
                },
                npntelefonnummer: {
                  country: 'NO',
                  message: 'Vennligst fyll ut telefonummeret til din nærmeste pårørende'
                }
              }
            },
            biarbeidsgiver: {
              validators: {
                notEmpty: {
                  message: 'Vennligst velg ditt svar'
                }
              }
            },
          }
        })



        .on('success.form.bv', function(e) {
          $('#success_message').slideDown({
            opacity: "show"
          }, "slow") // Do something ...
          $('#reg_form').data('bootstrapValidator').resetForm();

          // Prevent form submission
          e.preventDefault();

          // Get the form instance
          var $form = $(e.target);

          // Get the BootstrapValidator instance
          var bv = $form.data('bootstrapValidator');

          // Use Ajax to submit form data
         $.post($form.attr('action'), $form.serialize(), function(result) {
            console.log(result);
         }, 'json');

        });
    });


  </script>
</body>

</html>
