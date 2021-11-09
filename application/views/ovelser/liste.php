<h2>Øvelser<small class="text-muted"> - Totalt <span id="ØvelserAntall">0</span> stk</small></h2>
<br />

<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover table-sm caption-top" id="TabellØvelser">
		<caption>Liste over alle registrerte øvelser</caption>
		<thead class="table-light">
			<tr>
				<th class="col">ID</th>
				<th class="col">Navn</th>
				<th class="col">Tilgangskode</th>
				<th class="col">Organisasjon</th>
				<th class="col">Opprettet av</th>
				<th class="col">Planlagt dato</th>
				<th class="col">Varighet</th>
				<th class="col">Øvingsmål</th>
				<th class="col">Dreiebok</th>
				<th class="col">Status</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function(){
    HentØvelser();
  });

	// Funksjon for å laste ned øvelser fra API server.
	function HentØvelser() {
		console.debug("Laster ned alle øvelser fra server.");
		$.ajax({
			url: 'https://api.sar-simulator.no/index.php/rest/ovelser',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data);
				$('#TabellØvelser tbody').empty();
				if (Array.isArray(data.Øvelser)) {
					$("#ØvelserAntall").text(data.Øvelser.length);
					$.each(data.Øvelser, function (i, Øvelse) {
						var rad = $('<tr></tr>');
						rad.append('<td>'+(typeof Øvelse.ØvelseID !== 'undefined' ? Øvelse.ØvelseID : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.Navn !== 'undefined' ? Øvelse.Navn : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.Tilgangskode !== 'undefined' ? Øvelse.Tilgangskode : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.OrganisasjonNavn !== 'undefined' ? Øvelse.OrganisasjonNavn : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.BrukerNavn !== 'undefined' ? Øvelse.BrukerNavn : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.DatoPlanlagt !== 'undefined' ? Øvelse.DatoPlanlagt : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.Varighet !== 'undefined' ? Øvelse.Varighet+' min' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.ØvelsesmålAntall !== 'undefined' ? Øvelse.ØvelsesmålAntall+' stk' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.DreiebokAntall !== 'undefined' ? Øvelse.DreiebokAntall+' stk' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Øvelse.Status !== 'undefined' ? Øvelse.Status : '&nbsp;')+'</td>');
						$('#TabellØvelser tbody').append(rad);
					});
				} else {
					var rad = $('<tr></tr>');
					rad.append('<td colspan="8" class="text-center">Ingen øvelser funnet.</td>');
					$('#TabellMineØvelser tbody').append(rad);
				}
			}
		});
	}
</script>