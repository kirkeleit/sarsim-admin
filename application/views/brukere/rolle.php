<form onsubmit="LagreRolle();">
<div class="card">
	<h6 class="card-header bg-secondary text-white">ROLLE</h6>

	<div class="card-body">
		<div class="mb-3">
			<label class="form-label" for="Navn"><b>Navn:</b></label>
			<input type="text" class="form-control" id="Navn" name="Navn" required>
		</div>
		<br />
	
		<div class="mb-3">
			<label class="form-label" for="Beskrivelse"><b>Beskrivelse:</b></label>
			<textarea class="form-control" id="Beskrivelse" name="Beskrivelse" rows="3"></textarea>
		</div>
		<br />

		<div class="form-check">
 			<input class="form-check-input" type="checkbox" value="" id="StandardRolle">
 			<label class="form-check-label" for="StandardRolle">Bruk som standard rolle på nye brukere</label>
		</div>
	</div>

	<div class="card-body">
		<fieldset>
			<legend class="h4">Pålogging til systemet</legend>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="100" id="Tilgang100">
  			<label class="form-check-label" for="Tilgang100">admin.sar-simulator.no (100)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="110" id="Tilgang110">
  			<label class="form-check-label" for="Tilgang110">planlegger.sar-simulator.no (110)</label>
			</div>
		</fieldset>
		<br />
		<fieldset>
			<legend class="h4">Organisasjoner</legend>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="200" id="Tilgang200">
  			<label class="form-check-label" for="Tilgang200">Lese organisasjoner (200)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="220" id="Tilgang220">
  			<label class="form-check-label" for="Tilgang220">Endre egen organisasjon (220)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="230" id="Tilgang230">
  			<label class="form-check-label" for="Tilgang230">Endre alle organisasjoner (230)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="250" id="Tilgang250">
  			<label class="form-check-label" for="Tilgang250">Opprette organisasjoner (250)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="290" id="Tilgang290">
  			<label class="form-check-label" for="Tilgang290">Slette organisasjoner (290)</label>
			</div>
		</fieldset>
		<br />
		<fieldset>
			<legend class="h4">Brukere</legend>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="300" id="Tilgang300">
  			<label class="form-check-label" for="Tilgang300">Lese brukere (300)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="330" id="Tilgang330">
  			<label class="form-check-label" for="Tilgang330">Endre brukere (330)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="350" id="Tilgang350">
  			<label class="form-check-label" for="Tilgang350">Opprette brukere (350)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="390" id="Tilgang390">
  			<label class="form-check-label" for="Tilgang390">Slette brukere (390)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="301" id="Tilgang301">
  			<label class="form-check-label" for="Tilgang301">Lese roller (301)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="331" id="Tilgang331">
  			<label class="form-check-label" for="Tilgang331">Endre roller (331)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="351" id="Tilgang351">
  			<label class="form-check-label" for="Tilgang351">Opprette roller (351)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="391" id="Tilgang391">
  			<label class="form-check-label" for="Tilgang391">Slette roller (391)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="302" id="Tilgang302">
  			<label class="form-check-label" for="Tilgang302">Lese e-poster (302)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="352" id="Tilgang352">
  			<label class="form-check-label" for="Tilgang352">Sende e-poster (352)</label>
			</div>
		</fieldset>
		<br />
		<fieldset>
			<legend class="h4">Øvelser</legend>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="400" id="Tilgang400">
  			<label class="form-check-label" for="Tilgang400">Lese øvelser (400)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="430" id="Tilgang430">
  			<label class="form-check-label" for="Tilgang430">Endre øvelser (430)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="450" id="Tilgang450">
  			<label class="form-check-label" for="Tilgang450">Opprette øvelser (450)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="490" id="Tilgang490">
  			<label class="form-check-label" for="Tilgang490">Slette øvelser (490)</label>
			</div>
		</fieldset>
		<br />
		<fieldset>
			<legend class="h4">Brikker</legend>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="500" id="Tilgang500">
  			<label class="form-check-label" for="Tilgang500">Lese brikker (500)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="530" id="Tilgang530">
  			<label class="form-check-label" for="Tilgang530">Endre brikker (530)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="550" id="Tilgang550">
  			<label class="form-check-label" for="Tilgang550">Opprette brikker (550)</label>
			</div>
			<div class="form-check">
  			<input class="form-check-input" type="checkbox" name="Tilganger[]" value="590" id="Tilgang590">
  			<label class="form-check-label" for="Tilgang590">Slette brikker (590)</label>
			</div>
		</fieldset>
	</div>
  
	<div class="card-footer">
    <input type="submit" class="btn btn-primary" value="Lagre" id="BtnLagreRolle" />
		<input type="button" class="btn btn-danger" style="display:none;" value="Slett" id="BtnSlettRolle" onclick="SlettRolle();" />
  </div>
</div>
</form>

<script>
	let RolleID = '<?php echo (isset($RolleID) ? $RolleID : ''); ?>';

	$(document).ready(function() {
		if (RolleID !== '') {
    	HentRolle();
		}
  });

	// Funksjon for å laste ned rolle fra API server.
	function HentRolle() {
		console.debug("Laster ned rolle '"+RolleID+"' fra server.");
		$.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brukerroller/'+RolleID,
			type: 'GET',
			headers: {
				'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			},
			success: function(data) {
				console.debug(data.Rolle);
				$('#Navn').val(data.Rolle.Navn);
    		$('#Notater').val(data.Rolle.Notater);
				(data.Rolle.StandardRolle === "1" ? $("#StandardRolle").prop('checked',true) : $("#StandardRolle").prop('checked',false) );
				$('#BtnSlettRolle').show();
				data.Rolle.Tilganger.forEach(function(Tilgang) {
					$('#Tilgang'+Tilgang).prop('checked', true);
				});
			}
		});
	}

  function LagreRolle() {
		event.preventDefault();
		if (RolleID != '') {
      console.debug("Lagrer rolle '"+RolleID+"' på server.");
    } else {
      console.debug("Oppretter ny rolle på server.");
    }

		var Tilganger = [];
		console.debug(Tilganger);
		$("input[name='Tilganger[]']:checked").each(function () {
    	Tilganger.push(parseInt($(this).val()));
		});
		console.debug(Tilganger);

		$('#BtnLagreRolle').prop('disabled', true);
		$('#BtnLagreRolle').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $.ajax({
			url:'https://api.sar-simulator.no/index.php/rest/brukerroller/'+(RolleID != '' ? RolleID : ''),
			type: (RolleID != '' ? 'PATCH' : 'POST'),
       headers: {
			  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
		  },
			data: {
				'Navn': $('#Navn').val(),
        'Beskrivelse': $('#Beskrivelse').val(),
				'StandardRolle': ($("#StandardRolle").is(":checked") ? '1' : '0'),
				'Tilganger': Tilganger,
      },
			dataType: 'json',
			success: function(data) {
				console.debug(data);
				window.location.href = "<?php echo site_url('brukere/rolle/'); ?>"+data.Rolle.RolleID;
			},
			complete: function(xhr, status) {
				$('#BtnLagreRolle').html('Lagre');
				$('#BtnLagreRolle').prop('disabled', false);
			}
		});
  }

  function SlettRolle() {
		if (confirm("Er du sikker på at du vil slette rollen?")) {
      console.debug("Sletter rolle '"+RolleID+"' på server.");
      $('#BtnSlettRolle').prop('disabled', true);
			$('#BtnSlettRolle').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    	$.ajax({
				url:'https://api.sar-simulator.no/index.php/rest/brukerroller/'+RolleID,
				type: 'DELETE',
        headers: {
				  'Authorization': 'Bearer '+sessionStorage.getItem('AccessToken')
			  },
				success: function(data) {
					console.debug(data);
        	window.location.href = "<?php echo site_url('brukere/roller'); ?>";
				},
				complete: function(xhr, status) {
					$('#BtnSlettRolle').html('Slett');
					$('#BtnSlettRolle').prop('disabled', false);
				}
			});
		}
  }
</script>