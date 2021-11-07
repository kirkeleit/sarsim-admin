<h2>Brukere<small class="text-muted"> - Totalt <span id="BrukereAntall">0</span> stk</small></h2>
<br />

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm caption-top" id="TabellBrukere">
		<caption>Liste over brukere</caption>
    <thead class="table-light">
	  	<tr>
	    	<th>Navn</th>
				<th>Organisasjon</th>
				<th>E-postadresse</th>
				<th>Mobilnummer</th>
				<th>Rolle</th>
				<th>Sist aktivitet</th>
	  	</tr>
		</thead>
		<tbody>
		</tbody>
  </table>
</div>

<script>
	$(document).ready(function(){
    HentBrukere();
  });

	// Funksjon for å laste ned brukere fra API server.
	function HentBrukere() {
		console.debug("Laster ned alle brukere.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brukere',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Brukere);
				$('#TabellBrukere tbody').empty();
				if (Array.isArray(data.Brukere)) {
					$("#BrukereAntall").text(data.Brukere.length);
					$.each(data.Brukere, function (i, Bruker) {
						if (Bruker.DatoSistLogginn != null) { Bruker.DatoSistLogginn = new Date(Bruker.DatoSistLogginn); }
						var rad = $('<tr></tr>');
						rad.append('<td><a href="https://admin.sar-simulator.no/index.php/Brukere/bruker/'+Bruker.BrukerID+'">'+(typeof Bruker.Fornavn !== 'undefined' ? Bruker.Fornavn : '&nbsp;')+' '+(typeof Bruker.Etternavn !== 'undefined' ? Bruker.Etternavn : '&nbsp;')+'</a></td>');
						rad.append('<td>'+(typeof Bruker.OrganisasjonNavn !== 'undefined' ? Bruker.OrganisasjonNavn : '&nbsp;')+'</td>');
						rad.append('<td class="'+(Bruker.EpostVerifisert === "0" ? 'table-danger' : '')+'">'+(typeof Bruker.EpostAdresse !== 'undefined' ? Bruker.EpostAdresse : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Bruker.Mobilnummer !== 'undefined' ? Bruker.Mobilnummer : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Bruker.RolleNavn !== 'undefined' ? Bruker.RolleNavn : '&nbsp;')+'</td>');
						rad.append('<td>'+(Bruker.DatoSistLogginn !== null ? Bruker.DatoSistLogginn.toLocaleDateString() : '&nbsp;')+'</td>');
						$('#TabellBrukere tbody').append(rad);
					});
				}
			}
		});
	}
</script>