<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 2
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
require 'lib.php';

$smarty = new MySmarty;

if(isset($_GET['func']) && !empty($_GET['func']))
{
	if($_GET['func'] == 'potvrdiizmenu')
	{
		if(isset($_POST['jmbg'],$_POST['ime'],$_POST['prezime'],$_POST['valuta'],$_POST['iznos']) 
		&& !empty($_POST['jmbg']) && !empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['valuta']))
		{
			$k = new Racun($_POST['jmbg'],$_POST['ime'],$_POST['prezime'],$_POST['valuta'],$_POST['iznos']);
			izmeni_racun($k);
		}
	}
	else if($_GET['func'] == 'izmena')
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			foreach ($_POST as $key => $value) 
			{
				$smarty->assign('izmena',vrati_racun($key)); 
			}
		}
	}
}

$racuni = vrati_sve_racune();
$smarty->assign('racuni',$racuni);

$smarty->display('index.tpl');
