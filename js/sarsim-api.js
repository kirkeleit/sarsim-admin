
function SARSIMStatus() {
	console.debug("Ping Pong");
	$.ajax({
		url:'https://api.sar-simulator.no/index.php/rest/ping',
		type: 'GET',
		headers: {
			'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
		},
		success: function(data) {
			console.log(data);
			if (data.Resultat === "OK") {
				sessionStorage.setItem('BrukerID',data.Bruker.BrukerID);
				sessionStorage.setItem('OrganisasjonID',data.Bruker.OrganisasjonID);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.debug(window.location.hostname);
			window.location = "https://admin.sar-simulator.no/index.php/Brukere/logginn";
		}
	});
}