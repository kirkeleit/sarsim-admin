<h2>Roller<small class="text-muted"> - Totalt <span id="RollerAntall">0</span> stk</small></h2>
<br />

<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm caption-top" id="TabellRoller">
		<caption>Liste over brukerroller</caption>
    <thead class="table-light">
	  	<tr>
	    	<th>Navn</th>
				<th>Endret</th>
				<th>Brukere</th>
				<th>Standard</th>
	  	</tr>
		</thead>
		<tbody>
		</tbody>
  </table>
</div>

<script>
	$(document).ready(function(){
    HentRoller();
  });

	// Funksjon for å laste ned roller fra API server.
	function HentRoller() {
		console.debug("Laster ned alle roller");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brukerroller',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Roller);
				$('#TabellRoller tbody').empty();
				if (Array.isArray(data.Roller)) {
					$("#RollerAntall").text(data.Roller.length);
					$.each(data.Roller, function (i, Rolle) {
						var rad = $('<tr></tr>');
						rad.append('<td><a href="<?php echo site_url('Brukere/rolle/'); ?>'+Rolle.RolleID+'">'+(typeof Rolle.Navn !== 'undefined' ? Rolle.Navn : '&nbsp;')+'</a></td>');
						rad.append('<td>'+(Rolle.DatoEndret !== null ? Rolle.DatoEndret : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Rolle.AntallBrukere !== 'undefined' ? Rolle.AntallBrukere+' stk' : '&nbsp;')+'</td>');
						rad.append('<td>'+(typeof Rolle.StandardRolle !== 'undefined' ? (Rolle.StandardRolle == 1 ? 'X' : '&nbsp;') : '&nbsp;')+'</td>');
						$('#TabellRoller tbody').append(rad);
					});
				}
			}
		});
	}
</script>