<h2>Organisasjoner<small class="text-muted"> - Totalt <span id="OrganisasjonerAntall">0</span> stk</small></h2>
<br />

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm caption-top" id="TabellOrganisasjoner">
		<caption>Liste over organisasjoner</caption>
    <thead class="table-light">
	  	<tr>
	    	<th>Navn</th>
				<th>Registrert</th>
				<th>E-postadresse</th>
				<th>Telefonnummer</th>
				<th>Brukere</th>
				<th>Brikker</th>
				<th>Øvelser</th>
	  	</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="7">Ingen organisasjoner er registrert.</td>
			</tr>
		</tbody>
  </table>
</div>

<script>
	$(document).ready(function(){
    HentOrganisasjoner();
  });

	// Funksjon for å laste ned organisasjoner fra API server.
	function HentOrganisasjoner() {
		console.debug("Laster ned alle organisasjoner fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/organisasjoner',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Organisasjoner);
				$('#TabellOrganisasjoner tbody').empty();
				if (Array.isArray(data.Organisasjoner)) {
					$("#OrganisasjonerAntall").text(data.Organisasjoner.length);
					$.each(data.Organisasjoner, function (i, Organisasjon) {
						//if (Melding.DatoSendt != null) { Melding.DatoSendt = new Date(Melding.DatoSendt); }
						var rad = $('<tr></tr>');
						rad.append('<td><a href="<?php echo site_url('Organisasjoner/organisasjon/'); ?>'+Organisasjon.OrganisasjonID+'">'+(typeof Organisasjon.Navn !== 'undefined' ? Organisasjon.Navn : '&nbsp;')+'</a></td>');
						rad.append('<td>'+(typeof Organisasjon.DatoRegistrert !== 'undefined' ? Organisasjon.DatoRegistrert : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Organisasjon.EpostAdresse !== 'undefined' ? Organisasjon.EpostAdresse : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Organisasjon.Telefonnummer !== 'undefined' ? Organisasjon.Telefonnummer : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Organisasjon.BrukereAntall !== 'undefined' ? Organisasjon.BrukereAntall+' stk' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Organisasjon.BrikkerAntall !== 'undefined' ? Organisasjon.BrikkerAntall+' stk' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Organisasjon.ØvelserAntall !== 'undefined' ? Organisasjon.ØvelserAntall+' stk' : '&nbsp;')+'</td>');
						$('#TabellOrganisasjoner tbody').append(rad);
					});
				}
			}
		});
	}
</script>