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

<!--  <?php
  if (isset ($_REQUEST['register'])) {

   $xml = new DOMDocument("1.0","UTF-8");
   $xml->load("registreringsdata.xml");

   $rootTag = $xml->getElementsByTagName("document")->item(0);

   $dataTag = $xml->createElement("data");

   $kjonnTag = $xml->createElement("kjonn",$_REQUEST['kjonn']);
   $fornavnTag = $xml->createElement("fornavn",$_REQUEST['fornavn']);
   $etternavnTag = $xml->createElement("etternavn",$_REQUEST['etternavn']);
   $adresseTag = $xml->createElement("adresse",$_REQUEST['adresse']);
   $postnummerTag = $xml->createElement("postnummer",$_REQUEST['postnummer']);
   $poststedTag = $xml->createElement("poststed",$_REQUEST['poststed']);
   $telefonnummerTag = $xml->createElement("telefonnummer",$_REQUEST['telefonnummer']);
   $epostTag = $xml->createElement("epost",$_REQUEST['epost']);
   $firmabilTag = $xml->createElement("firmabil",$_REQUEST['firmabil']);
   $fylkeTag = $xml->createElement("fylke",$_REQUEST['fylke']);
   $erfaringTag = $xml->createElement("erfaring",$_REQUEST['erfaring']);
   $navaerendestillingTag = $xml->createElement("navaerendestilling",$_REQUEST['navaerendestilling']);
   $navaerendearbeidsgiverTag = $xml->createElement("navaerendearbeidsgiver",$_REQUEST['navaerendearbeidsgiver']);
   $cvTag = $xml->createElement("cv",$_REQUEST['cv']);
   $fotoTag = $xml->createElement("foto",$_REQUEST['foto']);


   $dataTag->appendChild($kjonnTag);
   $dataTag->appendChild($fornavnTag);
   $dataTag->appendChild($etternavnTag);
   $dataTag->appendChild($adresseTag);
   $dataTag->appendChild($postnummerTag);
   $dataTag->appendChild($poststedTag);
   $dataTag->appendChild($telefonnummerTag);
   $dataTag->appendChild($epostTag);
   $dataTag->appendChild($firmabilTag);
   $dataTag->appendChild($fylkeTag);
   $dataTag->appendChild($erfaringTag);
   $dataTag->appendChild($navaerendestillingTag);
   $dataTag->appendChild($navaerendearbeidsgiverTag);
   $dataTag->appendChild($mobilaboTag);
   $dataTag->appendChild($pcTag);

   $rootTag->appendChild($dataTag);

   $xml->save("registreringsdata.xml");

   // Redirect to this page.
   header("Location: " . $_SERVER['REQUEST_URI']);
   exit();

  }
  ?> -->




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
          <legend id="personalia">Generell Søknad</legend>
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


          <!-- Select Basic -->

          <div class="form-group">
            <label class="col-md-4 control-label">Fylke</label>
            <div class="col-md-6 selectContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <select name="fylke" class="form-control selectpicker" required>
              <option value="" >Velg ditt fylke</option>
              <option value="Akershus">Akershus</option>
            	<option value="Aust-Agder">Aust-Agder</option>
            	<option value="Buskerud">Buskerud</option>
            	<option value="Finnmark">Finnmark</option>
            	<option value="Hedmark">Hedmark</option>
            	<option value="Hordaland">Hordaland</option>
            	<option value="Møre og Romsdal">Møre og Romsdal</option>
            	<option value="Nordland">Nordland</option>
            	<option value="Oppland">Oppland</option>
            	<option value="Oslo">Oslo</option>
            	<option value="Rogaland">Rogaland</option>
            	<option value="Sogn og Fjordane">Sogn og Fjordane</option>
            	<option value="Telemark">Telemark</option>
            	<option value="Troms">Troms</option>
            	<option value="Trøndelag">Trøndelag</option>
            	<option value="Vest-Agder">Vest-Agder</option>
            	<option value="Vestfold">Vestfold</option>
            	<option value="Østfold">Østfold</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Erfaring</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <textarea class="form-control" rows="3" name="erfaring" form="reg_form" placeholder="Erfaring" required="true" autocomplete="off"></textarea>
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Nåværende stilling</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="navaraerendestilling" name="navaraerendestilling" placeholder="Nåværende stilling" required="true" autocomplete="off">
              </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label">Nåværende arbeidsgiver</label>
            <div class="col-md-6  inputGroupContainer">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="navaraerendearbeidsgiver" name="navaraerendearbeidsgiver" placeholder="Nåværende arbeidsgiver" required="true" autocomplete="off">
              </div>
            </div>
          </div>



          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label">Last opp CV</label>
            <div class="col-md-4">
              <input type="file" accept=".pdf" id="cv" name="cv" required="true" >
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label">Last opp foto</label>
            <div class="col-md-4">
              <input type="file" accept=".png, .jpg, .jpeg"id="foto" name="foto" required="true" >
            </div>
          </div>


          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
              <button type="submit" name="register" class="btn btn-warning">Registrer   <span class="glyphicon glyphicon-send"></span></button>
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
