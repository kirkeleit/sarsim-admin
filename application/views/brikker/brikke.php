<form onsubmit="LagreBrikke();">
<div class="card">
  <h6 class="card-header text-white bg-secondary">BRIKKE</h6>

  <div class="card-body">
    <div class="mb-3">
      <label class="form-label"><b>ID:</b></label>
      <input type="text" class="form-control" id="BrikkeID" value="<?php echo $BrikkeID; ?>" readonly>
    </div>
  	<br />

    <div class="mb-3">
      <label class="form-label"><b>OrganisasjonNavn:</b></label>
      <input type="text" class="form-control" id="OrganisasjonNavn" readonly>
    </div>
  	<br />
	
  	<div class="mb-3">
      <label class="form-label" for="Notater"><b>Notater:</b></label>
      <input type="text" class="form-control" id="Notater" name="Notater">
    </div>
	  <br />
  </div>

  <div class="card-body">
    <div class="accordion" id="qrCodeAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="qrCodeTitle">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qrCodeImage" aria-expanded="false" aria-controls="qrCodeImage">
          QR kode
          </button>
        </h2>
        <div id="qrCodeImage" class="accordion-collapse collapse" aria-labelledby="#qrCodeTitle" data-bs-parent="#qrCodeAccordion">
          <div class="accordion-body text-center">
            <img src="https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=<?php echo urlencode("https://brikke.sar-simulator.no/?id=".$BrikkeID); ?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="card-footer">
    <input type="submit" class="btn btn-primary" value="Lagre" id="BtnLagreBrikke" />
    <input type="button" class="btn btn-danger" style="display:none;" value="Slett" id="BtnSlettBrikke" onclick="SlettBrikke();"/>
  </div>
</div>
</form>
<br />

<div id="Kart" style="width:100%;height:400px;"></div>
<br />

<script>
	$(document).ready(function() {
    HentBrikke();
  });

	// Funksjon for å laste ned brikke fra API server.
	function HentBrikke() {
		console.debug("Laster ned brikke '"+$('#BrikkeID').val()+"' fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brikker/'+$('#BrikkeID').val(),
			type: 'GET',
      headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
        console.debug(data.Brikke);
        $('#OrganisasjonNavn').val(data.Brikke.OrganisasjonNavn);
        $('#Notater').val(data.Brikke.Notater);
        $('#BtnSlettBrikke').show();
			}
		});
	}

  function LagreBrikke() {
    event.preventDefault();
    console.debug("Lagrer brikke '"+$('#BrikkeID').val()+"' på server.");
    $('#BtnLagreBrikke').prop('disabled', true);
		$('#BtnLagreBrikke').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brikker/'+$('#BrikkeID').val(),
			type: 'PATCH',
      headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			data: {
        'Notater': $('#Notater').val()
      },
			dataType: 'json',
			success: function(data) {
				console.debug(data);
        window.location.href = "<?php echo site_url('brikker/brikke/'); ?>"+$('#BrikkeID').val();
			},
			complete: function(xhr, status) {
				$('#BtnLagreBrikke').html('Lagre');
				$('#BtnLagreBrikke').prop('disabled', false);
			}
		});
    return true;
  }

  function SlettBrikke() {
    if (confirm("Er du sikker på at du vil slette brikken?")) {
      console.debug("Sletter brikke '"+$('#BrikkeID').val()+"' på server.");
      $('#BtnSlettBrikke').prop('disabled', true);
			$('#BtnSlettBrikke').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
      $.ajax({
			  url:'https://api.sar-simulator.no/index.php/rest/brikker/'+$('#BrikkeID').val(),
			  type: 'DELETE',
        headers: {
				  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			  },
			  success: function(data) {
				  console.debug(data);
          window.location.href = "<?php echo site_url('brikker/liste/'); ?>";
			  },
				complete: function(xhr, status) {
					$('#BtnSlettBrikke').html('Slett');
					$('#BtnSlettBrikke').prop('disabled', false);
				}
		  });
    }
  }
</script>