<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 3, zadatak 3
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
require 'dodatak.php';
class Fajl
{
	public $naziv;
	public $velicina;
	public $tip;
	public $brisanje;

	public function __construct($naziv,$velicina,$tip,$brisanje)
	{
		$this->naziv = $naziv;
		$this->velicina = $velicina;
		$this->tip = $tip;
		$this->brisanje = $brisanje == true?true:false;
	}
}
/*************************************************************************************************************************/
session_start(); //pokretanje sesije

if(isset($_GET['func']) && !empty($_GET['func']))
{
	//dodavanje novog fajla ukoliko je u promenljivoj $_GET['func'] vrednost 'dodaj' bez navodnika
	if($_GET['func'] == 'dodaj')
	{
		if(isset($_FILES['fajl']))
			$_SESSION['fajlovi'][$_FILES['fajl']['name']] = new Fajl($_FILES['fajl']['name'], $_FILES['fajl']['size'], mime_content_type($_FILES['fajl']['name']), isset($_POST['brisanje'])?true:false);
	}
	else if($_GET['func'] == 'brisi')
	{
		if(!$_SESSION['fajlovi'][$_GET['naziv']]->brisanje)
			unset($_SESSION['fajlovi'][$_GET['naziv']]);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lab 3 - zadatak 3</title>
</head>
<body>
<?php
	if(isset($_SESSION['fajlovi']) && !empty($_SESSION['fajlovi']))
	{
		//pravimo header tabele
		echo "
		<table>
		<tr>
			<th>Naziv</th>
			<th>Velicina</th>
			<th>Tip</th>
			<th></th>
		</tr>";
		//prolazimo kroz svaki element iz niza fajlovi
		//$_SESSION['fajlovi'] je zapravo niz
		//Moze da mu se pristupi kao $_SESSION['fajlovi']['3721']->velicina
		foreach ($_SESSION['fajlovi'] as $fajl) 
		{
			echo "<tr>
			<td>{$fajl->naziv}</td>
			<td>{$fajl->velicina}</td>
			<td>{$fajl->tip}</td>
			<td>";
			if(!$fajl->brisanje)
			echo "<a href='index.php?func=brisi&naziv={$fajl->naziv}'>Brisanje</a>";
			echo "</td>
			</tr>";
		}
		//zatvaramo tabelu i stavljamo crticu
		echo "</table><hr/>";
	}
?>
<form method="post" action="index.php?func=dodaj" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Fajl za upload:</td>
				<td><input type="file" name="fajl"></td>
			</tr>
			<tr>
				<td>Zabraniti brisanje:</td>
				<td><input type="checkbox" name="brisanje"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Dodaj"></td>
			</tr>
		</table>
	</form>
</body>
</html>