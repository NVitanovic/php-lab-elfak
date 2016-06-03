<!--
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 1
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 - zadatak 1</title>
</head>
<body>
	[[if isset($knjige) && !empty($knjige)]]
	<form method="post" action="index.php?func=brisi">
		<table>
			<tr>
				<th>ISBN</th>
				<th>Naslov</th>
				<th>Autor</th>
				<th>Izdanje</th>
				<th>Ocena</th>
				<th></th>
			</tr>
			[[foreach from=$knjige item=knjiga]]
			<tr>
				<td>[[$knjiga.isbn]]</td>	
				<td>[[$knjiga.naslov]]</td>
				<td>[[$knjiga.autor]]</td>
				<td>[[$knjiga.izdanje]]</td>
				<td>[[$knjiga.ocena]]</td>
				<td><input type="submit" name="[[$knjiga.isbn]]" value="Brisanje"></td>
			</tr>
			[[/foreach]]
		</table>
	</form>
	<hr/>
	[[/if]]
	<form method="post" action="index.php?func=dodaj">
		<table>
			<tr>
				<td>ISBN:</td>
				<td><input type="text" name="isbn"></td>
			</tr>
			<tr>
				<td>Naslov:</td>
				<td><input type="text" name="naslov"></td>
			</tr>
			<tr>
				<td>Autor:</td>
				<td><input type="text" name="autor"></td>
			</tr>
			<tr>
				<td>Izdanje:</td>
				<td>
					<select name = "izdanje">
					[[for $i = 1 to 10]]
						<option>[[$i]]</option>
					[[/for]]
					</select>
				</td>
			</tr>
			<tr>
				<td>Ocena:</td>
				<td><input type="text" name="ocena"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Dodaj">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>