
<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 3, zadatak 1
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
class Racun
{
	public $ime;
	public $prezime;
	public $jmbg;
	public $valuta;
	public $iznos;
	public function __construct($ime,$prezime,$jmbg,$valuta,$iznos)
	{
		$this->ime 		= $ime;
		$this->prezime 	= $prezime;
		$this->jmbg 	= $jmbg;
		$this->valuta 	= $valuta;
		$this->iznos 	= $iznos;
	}
}
/*************************************************************************************************************************/
session_start(); //pokretanje sesije

if(isset($_GET['func']) && !empty($_GET['func']))
{
	//dodavanje novog racuna ukoliko je u promenljivoj $_GET['func'] vrednost 'dodaj' bez navodnika
	if($_GET['func'] == 'dodaj')
	{
		//ako su ispravno sva polja poslata kroz POST zahtev dodace se novi racun
		if(isset($_POST['ime'],$_POST['prezime'],$_POST['jmbg'],$_POST['valuta'],$_POST['iznos']) 
		&& !empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['jmbg']) 
		&& !empty($_POST['valuta']) && !empty($_POST['iznos']))
		{
			//dodavanje novog racuna
			$_SESSION['racuni'][$_POST['jmbg']] = new Racun($_POST['ime'],$_POST['prezime'],$_POST['jmbg'],$_POST['valuta'],$_POST['iznos']);
		}
	}
	//ukoliko je brisi u okviru promenljive $_GET['func'] onda
	else if($_GET['func'] == 'brisi')
	{
		if(isset($_GET['jmbg']) && !empty($_GET['jmbg']))
		{
			//brisemo promenljivu sa indexom koji se nalazi u $_GET['jmbg']
			unset($_SESSION['racuni'][$_GET['jmbg']]);
		}
	}
}
/*************************************************************************************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lab 3 - zadatak 1</title>
</head>
<body>
	<?php
	if(isset($_SESSION['racuni']) && !empty($_SESSION['racuni']))
	{
		//pravimo header tabele
		echo "
		<table>
		<tr>
			<th>Ime</th>
			<th>Prezime</th>
			<th>JMBG</th>
			<th>Valuta</th>
			<th>Iznos</th>
			<th></th>
		</tr>";
		//prolazimo kroz svaki element iz niza racuna
		//$_SESSION['racuni'] je zapravo niz
		//Moze da mu se pristupi kao $_SESSION['racuni']['3721']->ime
		foreach ($_SESSION['racuni'] as $racun) 
		{
			echo "<tr>
			<td>{$racun->ime}</td>
			<td>{$racun->prezime}</td>
			<td>{$racun->jmbg}</td>
			<td>{$racun->valuta}</td>
			<td>{$racun->iznos}</td>
			<td><a href='index.php?func=brisi&jmbg={$racun->jmbg}'>Brisanje</a></td>
			</tr>";
		}
		//zatvaramo tabelu i stavljamo crticu
		echo "</table><hr/>";
	}
	?>
	<!--Klasicna forma fora je u tome sto je action sa ?func=dodaj sto zove onaj deo koda gore za dodavanje-->
	<form method="post" action="index.php?func=dodaj">
		<table>
			<tr>
				<td>Ime:</td>
				<td><input type="text" name="ime"></td>
			</tr>
			<tr>
				<td>Prezime:</td>
				<td><input type="text" name="prezime"></td>
			</tr>
			<tr>
				<td>JMBG:</td>
				<td><input type="text" name="jmbg"></td>
			</tr>
			<tr>
				<td>Valuta:</td>
				<td>
					RSD <input type="radio" name="valuta" checked value="RSD"> 
					EUR <input type="radio" name="valuta" value="EUR"> 
					CHF <input type="radio" name="valuta" value="CHF">
					USD <input type="radio" name="valuta" value="USD">  
				</td>
			</tr>
			<tr>
				<td>Iznos:</td>
				<td><input type="text" name="iznos"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Dodaj"></td>
			</tr>
		</table>
	</form>
</body>
</html>