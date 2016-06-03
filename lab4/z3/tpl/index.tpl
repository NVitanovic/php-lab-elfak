<!--
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 3
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 - zadatak 3</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>ISBN:</td>
				<td>[[$knjiga.isbn]]</td>
			</tr>
			<tr>
				<td>Naslov:</td>
				<td>[[$knjiga.naslov]]</td>
			</tr>
			<tr>
				<td>Autor:</td>
				<td>[[$knjiga.autor]]</td>
			</tr>
			<tr>
				<td>Cena:</td>
				<td>[[$knjiga.cena]] [[$knjiga.valuta]]</td>
			</tr>
			<tr>
				<td colspan="2">
					[[if isset($dugme_nazad) && !empty($dugme_nazad)]]
					<input type="submit" name="nazad" value="<< Nazad">
					[[/if]]
					<input type="submit" name="brisanje" value="Brisanje">
					[[if isset($dugme_napred) && !empty($dugme_napred)]]
					<input type="submit" name="napred" value="Napred >>">
					[[/if]]
					<input type="hidden" name="isbn" value="[[$knjiga.isbn]]">
					<input type="hidden" name="broj" value="[[$broj]]">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>