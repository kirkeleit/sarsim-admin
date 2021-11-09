<h2>Eposter<small class="text-muted"> - Totalt <span id="EposterAntall">0</span> stk</small></h2>
<br />

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm caption-top" id="TabellMeldinger">
		<caption>Liste over sendte e-postmeldinger</caption>
    <thead class="table-light">
	  	<tr>
	    	<th>ID</th>
				<th>Registrert</th>
				<th>Sendt</th>
				<th>Emne</th>
	  	</tr>
		</thead>
		<tbody>
		</tbody>
  </table>
</div>

<script>
	$(document).ready(function(){
    HentMeldinger();
  });

	// Funksjon for å laste ned e-poster fra API server.
	function HentMeldinger() {
		console.log("Laster ned alle meldinger fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/eposter',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			dataType: 'json',
			success: function(data) {
				$('#TabellMeldinger tbody').empty();
				if (Array.isArray(data.Eposter)) {
					$("#EposterAntall").text(data.Eposter.length);
					$.each(data.Eposter, function (i, Melding) {
						var rad = $('<tr></tr>');
						rad.append('<td><a href="<?php echo site_url('eposter/melding/'); ?>'+Melding.MeldingID+'">'+(typeof Melding.MeldingID !== 'undefined' ? Melding.MeldingID : '&nbsp;')+'</a></td>');
						rad.append('<td>'+(typeof Melding.DatoRegistrert !== 'undefined' ? Melding.DatoRegistrert : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Melding.DatoSendt !== 'null' ? Melding.DatoSendt : '&nbsp;')+'</td>');
						rad.append('<td>'+(Melding.Emnefelt !== null ? Melding.Emnefelt : '&nbsp;')+'</td>');
						$('#TabellMeldinger tbody').append(rad);
					});
				}
			}
		});
	}
</script>