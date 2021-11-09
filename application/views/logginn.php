<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SAR Simulator [Admin DEV]</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
      .login-form {
        width: 340px;
        margin: 50px auto;
  	    font-size: 15px;
      }
      .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
      }
      .login-form h2 {
        margin: 0 0 15px;
      }
      .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
      }
      .btn {        
        font-size: 15px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="login-form">
      <form id="Skjema" onsubmit="Autentiser();">
      <h2 class="text-center">Pålogging til<br />SAR-Simulator.no</h2>
        <div id="ErrorMessages">&nbsp;</div>
        <div class="form-group">
          <input type="email" class="form-control form-control-lg" id="EpostAdresse" name="EpostAdresse" placeholder="E-postadresse" required="required" autocomplete="username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-lg" id="Passord" name="Passord" placeholder="Passord" required="required" autocomplete="current-password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block" id="LoggPå">Logg inn</button>
        </div>
      </form>
    </div>

<script>
  $(document).ready(function() {
    sessionStorage.clear();
  });

  function Autentiser() {
    event.preventDefault();
    $("#alertdiv").remove();
    console.debug("Autentiserer bruker.");
		$('#LoggPå').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
		$('#LoggPå').prop('disabled', true);
		$.ajax({
			url: 'https://api.sar-simulator.no/index.php/rest/authenticate',
			type: 'POST',
			data: {
        'EpostAdresse': $('#EpostAdresse').val(),
        'Passord': $('#Passord').val()
      },
			dataType: 'json',
			success: function(data) {
				console.debug(data);
        sessionStorage.setItem('AccessToken', data.Bruker.AccessToken);
        $("#LoggPå").removeClass('btn-primary');
				$('#LoggPå').addClass('btn-success');
        $('#ErrorMessages').append('<div id="alertdiv" class="alert alert-success fade show" role="alert">Pålogging vellykket!</div>');
        setTimeout(function() {
				  location.href = '<?php echo site_url('ovelser/liste'); ?>';
        }, 2000);
			},
			error: function(xhr, ajaxOptions, thrownError) {
        $('#LoggPå').html('Logg inn');
        $("#LoggPå").removeClass('btn-primary');
				$('#LoggPå').addClass('btn-danger');
        setTimeout(function() {
          $('#Passord').val('');
					$("#LoggPå").removeClass('btn-danger');
          $('#LoggPå').addClass('btn-primary');
				}, 2000);
        if (xhr.status == 401) {
          $('#ErrorMessages').append('<div id="alertdiv" class="alert alert-danger fade show" role="alert">Feil brukernavn eller passord.</div>');
        } else if (xhr.status == 403) {
          $('#ErrorMessages').append('<div id="alertdiv" class="alert alert-danger fade show" role="alert">Du har ikke tilgang til denne siden.</div>');
        } else if (xhr.status == 429) {
          $('#ErrorMessages').append('<div id="alertdiv" class="alert alert-danger fade show" role="alert">For mange påloggingsforsøk. Prøv igjen senere.</div>');
        } else {
          $('#ErrorMessages').append('<div id="alertdiv" class="alert alert-danger fade show" role="alert">En ukjent feil oppstod. Prøv igjen.</div>');
        }
			},
			complete: function() {
				$('#LoggPå').prop('disabled', false);
			}
		});
  }
</script>

</body>
</html>