
<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 3, zadatak 2
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
class Let
{
	public $sifra;
	public $mestopolaska;
	public $mestodolaska;
	public $vremepolaska;
	public $vremedolaska;
	public function __construct($sifra,$mestopolaska,$mestodolaska,$vremepolaska,$vremedolaska)
	{
		$this->sifra 	= $sifra;
		$this->mestopolaska 	= $mestopolaska;
		$this->mestodolaska 	= $mestodolaska;
		$this->vremepolaska 	= $vremepolaska;
		$this->vremedolaska 	= $vremedolaska;
	}
}
/*************************************************************************************************************************/
session_start(); //pokretanje sesije

if(isset($_GET['func']) && !empty($_GET['func']))
{
	//dodavanje novog leta ukoliko je u promenljivoj $_GET['func'] vrednost 'dodaj' bez navodnika
	if($_GET['func'] == 'dodaj')
	{
		//ako su ispravno sva polja poslata kroz POST zahtev dodace se novi let
		if(isset($_POST['sifra'],$_POST['mestopolaska'],$_POST['mestodolaska'],$_POST['vremepolaska_h'],$_POST['vremedolaska_h'],$_POST['vremepolaska_m'],$_POST['vremedolaska_m']) 
		&& !empty($_POST['sifra']) && !empty($_POST['mestopolaska']) && !empty($_POST['mestodolaska']))
		{
			//dodavanje novog leta
			$_SESSION['letovi'][$_POST['sifra']] = new Let($_POST['sifra'],$_POST['mestopolaska'],$_POST['mestodolaska'],$_POST['vremepolaska_h'] . ':' . $_POST['vremepolaska_m'],$_POST['vremedolaska_h'] . ':' . $_POST['vremedolaska_m']);
		}
	}
	//ukoliko je brisi u okviru promenljive $_GET['func'] onda
	else if($_GET['func'] == 'brisi')
	{
		if(isset($_GET['sifra']) && !empty($_GET['sifra']))
		{
			//brisemo promenljivu sa indexom koji se nalazi u $_GET['sifra']
			unset($_SESSION['letovi'][$_GET['sifra']]);
		}
	}
}
/*************************************************************************************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lab 3 - zadatak 2</title>
</head>
<body>
	<?php
	if(isset($_SESSION['letovi']) && !empty($_SESSION['letovi']))
	{
		//pravimo header tabele
		echo "
		<table>
		<tr>
			<th>Šifra</th>
			<th>Mesto polaska</th>
			<th>Mesto dolaska</th>
			<th>Vreme polaska</th>
			<th>Vreme dolaska</th>
			<th></th>
		</tr>";
		//prolazimo kroz svaki element iz niza letovi
		//$_SESSION['letovi'] je zapravo niz
		//Moze da mu se pristupi kao $_SESSION['letovi']['3721']->sifra
		foreach ($_SESSION['letovi'] as $let) 
		{
			echo "<tr>
			<td>{$let->sifra}</td>
			<td>{$let->mestopolaska}</td>
			<td>{$let->mestodolaska}</td>
			<td>{$let->vremepolaska}</td>
			<td>{$let->vremedolaska}</td>
			<td><a href='index.php?func=brisi&sifra={$let->sifra}'>Brisanje</a></td>
			</tr>";
		}
		//zatvaramo tabelu i stavljamo crticu
		echo "</table><hr/>";
	}
	//kreiramo dve string promenljive sati i minuti koji sadrzi ove option da bi bilo u skladu sa zadatkom
	//time generisemo "dinamcike" vrednosti za select kontrole
	$sati = $minuti = '';
	for($i = 0; $i < 24; $i++)
		$sati .= "<option>$i</option>";
	for($i = 0; $i < 60; $i++)
		$minuti .= "<option>$i</option>";
	?>
	<!--Klasicna forma fora je u tome sto je action sa ?func=dodaj sto zove onaj deo koda gore za dodavanje-->
	<form method="post" action="index.php?func=dodaj">
		<table>
			<tr>
				<td>Sifra:</td>
				<td><input type="text" name="sifra"></td>
			</tr>
			<tr>
				<td>Mesto polaska:</td>
				<td><input type="text" name="mestopolaska"></td>
			</tr>
			<tr>
				<td>Vreme polaska:</td>
				<td>
					<select name="vremepolaska_h">
						<?php echo $sati; ?>  
					</select>
					<select name="vremepolaska_m">
						<?php echo $minuti; ?>  
					</select>
				</td>
			</tr>
			<tr>
				<td>Mesto dolaska:</td>
				<td><input type="text" name="mestodolaska"></td>
			</tr>
			
			<tr>
				<td>Vreme dolaska:</td>
				<td>
				<select name="vremedolaska_h">
						<?php echo $sati; ?>  
					</select>
					<select name="vremedolaska_m">
						<?php echo $minuti; ?>  
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Dodaj"></td>
			</tr>
		</table>
	</form>
</body>
</html>