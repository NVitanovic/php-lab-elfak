<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 3
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
require 'lib.php';

$smarty = new MySmarty;
$broj = 0;

if(isset($_REQUEST['broj']))
{
	$broj = $_REQUEST['broj'];
	if(isset($_REQUEST['nazad']))
		$broj--;
	if(isset($_REQUEST['napred']))
		$broj++;
}

if(isset($_REQUEST['brisanje']) && !empty($_REQUEST['brisanje']))
	brisi_knjigu($_REQUEST['isbn']);

$knjiga = vrati_knjigu_po_rednom_broju($broj);
$max_knjige = vrati_ukupan_broj_knjiga();
$max_knjige = $max_knjige[0]['COUNT(*)'] - 1;

$dugme_nazad = $broj <= 0 ? false : true;
$dugme_napred = $broj >= $max_knjige ? false : true;

//print_r($knjiga);
//exit;
$smarty->assign('dugme_napred',$dugme_napred);
$smarty->assign('dugme_nazad', $dugme_nazad);
$smarty->assign('broj', $broj);
$smarty->assign('knjiga',$knjiga);

$smarty->display('index.tpl');
