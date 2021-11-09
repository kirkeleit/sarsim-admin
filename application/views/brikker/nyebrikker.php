<form onsubmit="OpprettBrikker();">
<div class="card">
  <h6 class="card-header bg-secondary text-white">OPPRETT NYE BRIKKER</h6>
  
  <div class="card-body">
    <div class="mb-3">
			<label class="form-label" for="OrganisasjonID"><b>Organisasjon:</b></label>
			<select class="form-select" id="OrganisasjonID" name="OrganisasjonID" required>
			</select>
		</div>
    <br />

    <div class="mb-3">
      <label class="form-label" for="Antall"><b>Antall:</b></label>
      <input type="number" class="form-control" id="Antall" name="Antall" value="5" min="1" max="20" required>
    </div>
  	<br />

  </div>
  
  <div class="card-footer">
    <input type="submit" class="btn btn-primary" value="Opprett brikker" id="BtnOpprettBrikker" />
  </div>
</div>
</form>

<script>
  $(document).ready(function(){
    HentOrganisasjoner();
	});

	function OpprettBrikker() {
		event.preventDefault();
    console.debug("Oppretter "+$('#Antall').val()+" stk nye brikker.");
		$('#BtnOpprettBrikker').prop('disabled', true);
		$('#BtnOpprettBrikker').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
	  $.ajax({
		  url: 'https://api.sar-simulator.no/index.php/rest/brikker_bulk',
		  type: 'POST',
      headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
      data: {
  	      'OrganisasjonID': $("#OrganisasjonID").val(),
    	    'Antall': $("#Antall").val()
        },
		  dataType: 'json',
		  success: function(data) {
			  console.debug(data);
        window.location.href = "<?php echo site_url('Brikker/liste'); ?>";
		  },
			complete: function(xhr, status) {
				$('#BtnOpprettBrikker').prop('disabled', false);
			}
		});
		return true;
	}

	// Funksjon for å laste ned organisasjoner fra API server.
	function HentOrganisasjoner() {
		console.debug("Laster ned alle organisasjoner fra API server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/organisasjoner',
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data);
				$('#OrganisasjonID').empty();
				$('#OrganisasjonID').append($('<option>', {
					value: '',
					text : ''
				}));
				if (Array.isArray(data.Organisasjoner)) {
					$.each(data.Organisasjoner, function (i, Organisasjon) {
						$('#OrganisasjonID').append($('<option>', { 
							value: Organisasjon.OrganisasjonID,
							text : Organisasjon.Navn
						}));
					});
				}
			}
		});
	}
</script>