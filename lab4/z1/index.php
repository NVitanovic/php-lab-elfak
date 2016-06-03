<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 1
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
require 'lib.php';

if(isset($_GET['func']) && !empty($_GET['func']))
{
	if($_GET['func'] == 'dodaj')
	{
		if(isset($_POST['isbn'],$_POST['naslov'],$_POST['autor'],$_POST['izdanje'],$_POST['ocena']) 
		&& !empty($_POST['isbn']) && !empty($_POST['naslov']) && !empty($_POST['autor']) && !empty($_POST['izdanje']) && !empty($_POST['ocena']))
		{
			$k = new Knjiga($_POST['isbn'],$_POST['naslov'],$_POST['autor'],$_POST['izdanje'],$_POST['ocena']);
			dodaj_knjigu($k);
		}
	}
	else if($_GET['func'] == 'brisi')
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			foreach ($_POST as $key => $value) 
				brisi_knjigu($key);
		}
	}
}

$smarty = new MySmarty;

$knjige = vrati_sve_knjige();
$smarty->assign('knjige',$knjige);

$smarty->display('index.tpl');
