<div class="card">
	<h6 class="card-header bg-secondary text-white">E-POSTMELDING</h6>

	<div class="card-body">
		<div class="mb-3">
			<label class="form-label" for="MeldingID"><b>ID:</b></label>
			<input type="text" class="form-control-plaintext" id="MeldingID" readonly>
		</div>
		<br />

		<div class="mb-3">
			<label class="form-label" for="DatoRegistrert"><b>Registrert:</b></label>
			<input type="text" class="form-control-plaintext" id="DatoRegistrert" readonly>
		</div>
		<br />
	
		<div class="mb-3">
			<label class="form-label" for="DatoSendt"><b>Sendt:</b></label>
			<input type="text" class="form-control-plaintext" id="DatoSendt" readonly>
		</div>
		<br />

		<div class="mb-3">
			<label class="form-label" for="Emnefelt"><b>Emnefelt:</b></label>
			<input type="text" class="form-control-plaintext" id="Emnefelt" readonly>
		</div>
		<br />
	
		<div class="mb-3">
			<label class="form-label" for="Debug"><b>Debug:</b></label>
			<input type="text" class="form-control-plaintext" id="Debug" readonly>
		</div>
		<br />

		<div class="mb-3">
			<label class="form-label" for="SMTPResult"><b>SMTP Resultat:</b></label>
			<textarea class="form-control-plaintext" id="SMTPResult" rows="7"></textarea>
		</div>
	</div>
</div>

<script>
	let MeldingID = '<?php echo (isset($MeldingID) ? $MeldingID : ''); ?>';

	$(document).ready(function() {
		HentMelding();
  });

	// Funksjon for å laste ned melding fra API server.
	function HentMelding() {
		console.log("Laster ned melding med ID '"+MeldingID+"' fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/eposter/'+MeldingID,
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				$('#MeldingID').val(data.Epost.MeldingID).change();
				$('#DatoRegistrert').val(data.Epost.DatoRegistrert);
				$('#DatoSendt').val(data.Epost.DatoSendt);
				$('#Emnefelt').val(data.Epost.Emnefelt);
				$('#Debug').val(data.Epost.Debug);
    		$('#SMTPResult').val(data.Epost.SMTPResult);
			}
		});
	}
</script>