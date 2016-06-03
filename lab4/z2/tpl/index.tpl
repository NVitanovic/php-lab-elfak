<!--
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 2
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 - zadatak 2</title>
</head>
<body>
	[[if isset($racuni) && !empty($racuni)]]
	<form method="post" action="index.php?func=izmena">
		<table>
			<tr>
				<th>jmbg</th>
				<th>ime</th>
				<th>prezime</th>
				<th>valuta</th>
				<th>iznos</th>
				<th></th>
			</tr>
			[[foreach from=$racuni item=racun]]
			<tr>
				<td>[[$racun.jmbg]]</td>	
				<td>[[$racun.ime]]</td>
				<td>[[$racun.prezime]]</td>
				<td>[[$racun.valuta]]</td>
				<td>[[$racun.iznos]]</td>
				<td><input type="submit" name="[[$racun.jmbg]]" value="Izmena"></td>
			</tr>
			[[/foreach]]
		</table>
	</form>
	<hr/>
	[[/if]]
	[[if isset($izmena) && !empty($izmena)]]
	<form method="post" action="index.php?func=potvrdiizmenu">
		<table>
			<tr>
				<td>JMBG:</td>
				<td>[[$izmena.jmbg]] <input type="hidden" name="jmbg" value="[[$izmena.jmbg]]"></td>
			</tr>
			<tr>
				<td>Ime:</td>
				<td><input type="text" name="ime" value="[[$izmena.ime]]"></td>
			</tr>
			<tr>
				<td>Prezime:</td>
				<td><input type="text" name="prezime" value="[[$izmena.prezime]]"></td>
			</tr>
			<tr>
				<td>Valuta:</td>
				<td>
					RSD <input type="radio" name="valuta" [[if $izmena.valuta == 'RSD']] checked [[/if]] value="RSD"> 
					EUR <input type="radio" name="valuta" [[if $izmena.valuta == 'EUR']] checked [[/if]] value="EUR"> 
					CHF <input type="radio" name="valuta" [[if $izmena.valuta == 'CHF']] checked [[/if]] value="CHF">
					USD <input type="radio" name="valuta" [[if $izmena.valuta == 'USD']] checked [[/if]] value="USD">  
				</td>
			</tr>
			<tr>
				<td>Iznos:</td>
				<td><input type="text" name="iznos" value="[[$izmena.iznos]]"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Izmeni">
				</td>
			</tr>
		</table>
	</form>
	[[/if]]
</body>
</html>