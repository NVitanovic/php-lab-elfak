<?php
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 1
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
class Knjiga
{
	public $isbn;
	public $naslov;
	public $autor;
	public $izdanje;
	public $ocena;

	public function __construct($isbn,$naslov,$autor,$izdanje,$ocena)
	{
		$this->isbn 	= $isbn;
		$this->naslov 	= $naslov;
		$this->autor 	= $autor;
		$this->izdanje 	= $izdanje;
		$this->ocena 	= $ocena;
	}
}