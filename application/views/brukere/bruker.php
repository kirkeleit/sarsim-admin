<h2>Bruker</h2>
<br />

<form onsubmit="LagreBruker();">
<div class="card">
	<h6 class="card-header bg-secondary text-white">Bruker</h6>

	<div class="card-body">
		<div class="mb-3">
			<label class="form-label" for="OrganisasjonID"><b>Organisasjon:</b></label>
			<select class="form-select" id="OrganisasjonID" name="OrganisasjonID" required>
			</select>
		</div>
		<br />

		<div class="mb-3">
			<label class="form-label" for="Fornavn"><b>Fornavn:</b></label>
			<input type="text" class="form-control" id="Fornavn" name="Fornavn" required>
		</div>
		<br />
	
		<div class="mb-3">
			<label class="form-label" for="Etternavn"><b>Etternavn:</b></label>
			<input type="text" class="form-control" id="Etternavn" name="Etternavn" required>
		</div>
		<br />

		<div class="mb-3">
			<label class="form-label" for="EpostAdresse"><b>E-postadresse:</b></label>
			<input type="email" class="form-control" id="EpostAdresse" name="EpostAdresse" required>
		</div>
		<br />
	
		<div class="mb-3">
			<label class="form-label" for="Mobilnummer"><b>Mobilnummer:</b></label>
			<input type="tel" class="form-control" id="Mobilnummer" name="Mobilnummer" maxlength="8">
		</div>
		<br />
	
		<!--<div class="mb-3">
			<label class="form-label" for="Passord"><b>Passord:</b></label>
			<input type="password" class="form-control" id="Passord" name="Passord">
		</div>
		<div class="mb-3">
			<label class="form-label" for="BekreftPassord"><b>Bekreft passord:</b></label>
			<input type="password" class="form-control" id="BekreftPassord" name="BekreftPassord">
		</div>
		<br />-->

		<div class="mb-3">
			<label class="form-label" for="Notater"><b>Notater:</b></label>
			<textarea class="form-control" id="Notater" name="Notater" rows="3"></textarea>
		</div>
	</div>
  
	<div class="card-footer">
    <input type="submit" class="btn btn-primary" value="Lagre" id="BrukerLagre" />
		<input type="button" class="btn btn-danger" value="Slett" id="BrukerSlett" onclick="SlettBruker();" />
		<!--<input type="button" class="btn btn-primary" value="Send velkomst e-post" name="SkjemaSendVelkomstEpost" id="SkjemaSendVelkomstEpost" />-->
		<!--<input type="submit" class="btn btn-primary" value="Send e-post verifisering" name="SkjemaSendVerifiseringsEpost" />-->
		<input type="button" class="btn btn-secondary" value="Bytt passord (sender e-post)" name="SkjemaSendPassordEpost" id="SkjemaSendPassordEpost" onclick="SendEndrePassordEpost();" />
  </div>
</div>
</form>

<script>
	let BrukerID = '<?php echo (isset($BrukerID) ? $BrukerID : ''); ?>';

	$(document).ready(function() {
		HentOrganisasjoner();
  });

	// Funksjon for å laste ned bruker fra API server.
	function HentBruker() {
		console.debug("Laster ned bruker '"+BrukerID+"' fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brukere/'+BrukerID,
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Bruker);
				$('#OrganisasjonID').val(data.Bruker.OrganisasjonID).change();
				$('#Fornavn').val(data.Bruker.Fornavn);
				$('#Etternavn').val(data.Bruker.Etternavn);
				$('#Mobilnummer').val(data.Bruker.Mobilnummer);
				$('#EpostAdresse').val(data.Bruker.EpostAdresse);
    		$('#Notater').val(data.Bruker.Notater);
			}
		});
	}

  function LagreBruker() {
		event.preventDefault();
		if (BrukerID != '') {
      console.debug("Lagrer bruker '"+BrukerID+"' på server.");
    } else {
      console.debug("Oppretter ny bruker på server.");
    }
		$('#BrukerLagre').prop('disabled', true);
		$('#BrukerLagre').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brukere/'+(BrukerID != '' ? BrukerID : ''),
			type: (BrukerID != '' ? 'PATCH' : 'POST'),
       headers: {
			  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
		  },
			data: {
				'OrganisasjonID': $('#OrganisasjonID').val(),
				'Fornavn': $('#Fornavn').val(),
				'Etternavn': $('#Etternavn').val(),
				'EpostAdresse': $('#EpostAdresse').val(),
				'Mobilnummer': $('#Mobilnummer').val(),
        'Notater': $('#Notater').val()
      },
			dataType: 'json',
			success: function(data) {
				console.debug(data);
				BrukerID = data.Bruker.BrukerID;
			},
			complete: function(xhr, status) {
				$('#BrukerLagre').html('Lagre');
				$('#BrukerLagre').prop('disabled', false);
			}
		});
  }

  function SlettBruker() {
		if (confirm("Er du sikker på at du vil slette brukeren?")) {
      console.debug("Sletter bruker '"+BrukerID+"' på server.");
      $('#BrukerSlett').prop('disabled', true);
			$('#BrukerSlett').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    	$.ajax({
				url:'https://api.sar-simulator.no/index.php/rest/brukere/'+BrukerID,
				type: 'DELETE',
        headers: {
				  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			  },
				success: function(data) {
					console.debug(data);
        	window.location.href = "https://admin.sar-simulator.no/index.php/Brukere/liste";
				},
				complete: function(xhr, status) {
					$('#BrukerSlett').html('Slett');
					$('#BrukerSlett').prop('disabled', false);
				}
			});
		}
  }

	// Funksjon for å laste ned organisasjoner fra API server.
	function HentOrganisasjoner() {
		console.log("Laster ned alle organisasjoner.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/organisasjoner',
			type: 'GET',
      headers: {
			  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
		  },
			success: function(data) {
				console.log(data.Organisasjoner);
    		$('#OrganisasjonID').empty();
				$('#OrganisasjonID').append($('<option>', { 
					value: '',
					text : ''
				}));
				if (Array.isArray(data.Organisasjoner)) {
					$.each(data.Organisasjoner, function (i, Organisasjon) {
						$('#OrganisasjonID').append($('<option>', { 
							value: Organisasjon.OrganisasjonID,
							text : Organisasjon.Navn
						}));
					});
				}
				if (BrukerID !== '') {
    			HentBruker();
				}
			}
		});
	}

	function SendEndrePassordEpost() {
		console.debug("Ber bruker om å bytte passord på adresse '"+$('#EpostAdresse').val()+"'.");
		$.ajax({
			url: 'https://api.sar-simulator.no/index.php/rest/passord/',
			type: 'POST',
			data: { 'EpostAdresse': $('#EpostAdresse').val() },
			dataType: 'json',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Bruker);
			}
		});
	}
</script>