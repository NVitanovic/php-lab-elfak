<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 2
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
class Racun
{
	public $jmbg;
	public $ime;
	public $prezime;
	public $valuta;
	public $iznos;

	public function __construct($jmbg,$ime,$prezime,$valuta,$iznos)
	{
		$this->jmbg 	= $jmbg;
		$this->ime 	= $ime;
		$this->prezime 	= $prezime;
		$this->valuta 	= $valuta;
		$this->iznos 	= $iznos;
	}
}