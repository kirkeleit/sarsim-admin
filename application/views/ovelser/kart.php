<h2>Øvelseskart</h2>
<br />
<div class="card">
	<div class="card-header">Øvelseskart</div>
  <div class="card-body">
    <div id="Kart" style="width:100%;height:600px;"></div>
  </div>
</div>

<script>
  let Kart;

	function myMap() {
		var StandardPosisjon = new google.maps.LatLng(60.475174568061824,8.536376562500028);

		var mapProp= {
			center: StandardPosisjon,
			zoom: 5,
			streetViewControl: false,
			disableDoubleClickZoom: false,
			mapTypeId: google.maps.MapTypeId.HYBRID,
		};

		Kart = new google.maps.Map(document.getElementById("Kart"),mapProp);

    HentØvelser();
	}

  // Funksjon for å laste ned øvelser fra API server.
	function HentØvelser() {
		console.debug("Laster ned alle øvelser fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/ovelser',
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
						var marker = new google.maps.Marker({
          		title: Øvelse.Navn+" ("+Øvelse.OrganisasjonNavn+")",
          		position: new google.maps.LatLng(Øvelse.KartBreddegrad,Øvelse.KartLengdegrad),
          		map: Kart
        		});
					});
				}
			}
		});
	}

	// Funksjon for å laste inn mine øvelser inn i kart på siden.
	function LastØvelser(Øvelser) {
		console.log("Laster inn øvelser på siden.");
		console.log(Øvelser);
		
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJpzO2eklGoDDsUWybbRCxeqWIqtVyDdQ&callback=myMap"></script>