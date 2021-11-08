<h2>Brikker<small class="text-muted"> - Totalt <span id="BrikkerAntall">0</span> stk</small></h2>
<br />

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm caption-top" id="TabellBrikker">
		<caption>Liste over registrerte brikker</caption>
    <thead class="table-light">
	    <tr>
	      <th>ID</th>
				<th>Organisasjon</th>
				<th>Registrert</th>
				<th>Øvelser</th>
				<th>Innsjekkinger</th>
	    </tr>
	  </thead>
	  <tbody>
	  </tbody>
  </table>
</div>
<br />

<script>
	$(document).ready(function(){
    HentBrikker();
  });

	// Funksjon for å laste ned brikker fra API server.
	function HentBrikker() {
		console.debug("Laster ned alle brikker.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brikker',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.log(data.Brikker);
				$('#TabellBrikker tbody').empty();
				if (Array.isArray(data.Brikker)) {
					$("#BrikkerAntall").text(data.Brikker.length);
					$.each(data.Brikker, function (i, Brikke) {
						if (typeof Brikke.DatoRegistrert != 'undefined') { Brikke.DatoRegistrert = new Date(Brikke.DatoRegistrert); }
						var rad = $('<tr></tr>');
						rad.append('<td><a href="<?php echo site_url('Brikker/brikke/'); ?>'+Brikke.BrikkeID+'">'+(typeof Brikke.BrikkeID !== 'undefined' ? Brikke.BrikkeID : '&nbsp;')+'</a></td>');
						rad.append('<td>'+(typeof Brikke.OrganisasjonNavn !== 'undefined' ? Brikke.OrganisasjonNavn : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Brikke.DatoRegistrert !== 'undefined' ? Brikke.DatoRegistrert.toLocaleDateString() : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Brikke.ØvelserAntall !== 'undefined' ? Brikke.ØvelserAntall+' stk' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Brikke.InnsjekkingerAntall !== 'undefined' ? Brikke.InnsjekkingerAntall+' stk' : '&nbsp;')+'</td>');
						$('#TabellBrikker tbody').append(rad);
					});
				}
			}
		});
	}
</script>