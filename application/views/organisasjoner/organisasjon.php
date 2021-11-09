<h2>Organisasjon</h2>
<br />

<form onsubmit="LagreOrganisasjon();">
<div class="card">
  <h6 class="card-header bg-secondary text-white">Organisasjon</h6>
  
  <div class="card-body">
    <div class="mb-3">
      <label class="form-label" for="Navn"><b>Navn:</b></label>
      <input type="text" class="form-control" id="Navn" name="Navn" required>
    </div>
    <br />

    <div class="mb-3">
      <label class="form-label" for="Kortnavn"><b>Kortnavn:</b></label>
      <input type="text" class="form-control" id="Kortnavn" name="Kortnavn" maxlength="16">
    </div>
    <br />

    <div class="mb-3">
      <label class="form-label" for="EpostAdresse"><b>E-postadresse:</b></label>
      <input type="text" class="form-control" id="EpostAdresse" name="EpostAdresse" maxlength="90">
    </div>
    <br />

    <div class="mb-3">
      <label class="form-label" for="Telefonnummer"><b>Telefonnummer:</b></label>
      <input type="text" class="form-control" id="Telefonnummer" name="Telefonnummer" maxlength="8">
    </div>
    <br />
   
    <div class="mb-3">
		  <label class="form-label" for="Notater"><b>Notater:</b></label>
			<textarea class="form-control" id="Notater" name="Notater" rows="3"></textarea>
  	</div>
  </div>
  
  <div class="card-footer" id="Knapperad">
    <input type="submit" class="btn btn-primary" value="Lagre" id="BtnLagreOrganisasjon" />
    <input type="button" class="btn btn-danger" value="Slett" style="display:none;" id="BtnSlettOrganisasjon" onclick="SlettOrganisasjon();" />
  </div>
</div>
</form>
<br />

<script>
  let OrganisasjonID = '<?php echo (isset($OrganisasjonID) ? $OrganisasjonID : ''); ?>';

  $(document).ready(function(){
    if (OrganisasjonID !== '') {
      HentOrganisasjon();
    }
  });

	// Funksjon for å laste ned organisasjon fra API server.
	function HentOrganisasjon() {
		console.debug("Laster ned organisasjon '"+OrganisasjonID+"' fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/organisasjoner/'+OrganisasjonID,
			type: 'GET',
      headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Organisasjon);
        $('#Navn').val(data.Organisasjon.Navn);
        $('#Kortnavn').val(data.Organisasjon.Kortnavn);
        $('#EpostAdresse').val(data.Organisasjon.EpostAdresse);
        $('#Telefonnummer').val(data.Organisasjon.Telefonnummer);
        $('#Notater').val(data.Organisasjon.Notater);
        $('#BtnSlettOrganisasjon').show();
        if (data.Tilgang.Endre == true) {
          $("#OrganisasjonLagre").prop('disabled', false);
        } else {
          $("#OrganisasjonLagre").prop('disabled', true);
        }
        if (data.Tilgang.Slette == true) {
          $("#OrganisasjonSlett").prop('disabled', false);
        } else {
          $("#OrganisasjonSlett").prop('disabled', true);
        }
			}
		});
	}

  function LagreOrganisasjon() {
    event.preventDefault();
    if (OrganisasjonID != '') {
      console.debug("Lagrer organisasjon '"+OrganisasjonID+"' på server.");
    } else {
      console.debug("Oppretter ny organisasjon på server.");
    }
    $('#BtnLagreOrganisasjon').prop('disabled', true);
		$('#BtnLagreOrganisasjon').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $.ajax({
			url: 'https://api.sar-simulator.no/index.php/rest/organisasjoner/'+(OrganisasjonID != '' ? OrganisasjonID : ''),
			type: (OrganisasjonID != '' ? 'PATCH' : 'POST'),
      headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			data: {
        'Navn': $('#Navn').val(),
        'Kortnavn': $('#Kortnavn').val(),
        'EpostAdresse': $('#EpostAdresse').val(),
        'Telefonnummer': $('#Telefonnummer').val(),
        'Notater': $('#Notater').val()
      },
			dataType: 'json',
			success: function(data) {
				console.debug(data);
        OrganisasjonID = data.Organisasjon.OrganisasjonID;
        window.location.href = "<?php echo site_url('organisasjoner/organisasjon/'); ?>"+OrganisasjonID;
			},
			complete: function(xhr, status) {
				$('#BtnLagreOrganisasjon').html('Lagre');
				$('#BtnLagreOrganisasjon').prop('disabled', false);
			}
		});
    return true;
  }

  function SlettOrganisasjon() {
    if (confirm("Er du sikker på at du vil slette organisasjonen?")) {
      console.debug("Sletter organisasjon '"+OrganisasjonID+"' på server.");
      $('#BtnSlettOrganisasjon').prop('disabled', true);
			$('#BtnSlettOrganisasjon').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
      $.ajax({
			  url:'https://api.sar-simulator.no/index.php/rest/organisasjoner/'+OrganisasjonID,
			  type: 'DELETE',
        headers: {
				  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			  },
			  success: function(data) {
				  console.debug(data);
          window.location.href = "<?php echo site_url('organisasjoner/liste/'); ?>";
			  },
				complete: function(xhr, status) {
					$('#BtnSlettOrganisasjon').html('Slett');
					$('#BtnSlettOrganisasjon').prop('disabled', false);
				}
		  });
    }
  }
</script>