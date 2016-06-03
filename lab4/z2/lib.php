<?php
/*************************************************************************************************************************
 * Projekat:    Lab 4, zadatak 2
 * Autor:       Nikola Vitanovic 14992
 * Date:        2016-06-03
 *************************************************************************************************************************/
require 'MySmarty.php';
require 'Racun.php';

define("DB_HOST","localhost");
define("DB_NAME","lab4_2");
define("DB_USER","root");
define("DB_PASS","");

function vrati_sve_racune() {
    // funkcija za konektovanje na bazu podataka
    // parametri su server_baze, username, password, ime_baze
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno) {
        // u slucaju greske odstampati odgovarajucu poruku
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    }
    else {
        // $res je rezultat izvrsenja upita
        $res = $con->query("select * from racun");
        if ($res) {
            $niz = array();
            // fetch_assoc() pribavlja jedan po jedan red iz rezulata 
			// u redosledu u kom ga je vratio db server
            while ($row = $res->fetch_assoc()) {
				array_push($niz, $row);
            }
            // zatvaranje objekta koji cuva rezultat
            $res->close();
            return $niz;
        }
        else
        {
            print ("Query failed");
        }
    }
}
function vrati_racun($jmbg)
{
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno)
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    else
    {
        $row = null;
        $s = $con->prepare("SELECT * FROM racun WHERE jmbg = ? LIMIT 1");
        $s->bind_param('s',$jmbg);
        $s->execute();
        $res = $s->get_result();
        $row = $res->fetch_array();
        $s->close();
        return $row;
    }
}
function izmeni_racun($racun)
{
    if(get_class($racun) == 'Racun')
    {
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($con->connect_errno)
            print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
        else
        {
            $s = $con->prepare("UPDATE racun SET ime = ?, prezime = ?, valuta = ?, iznos = ? WHERE jmbg = ?");
            $s->bind_param('sssss',$racun->ime,$racun->prezime,$racun->valuta,$racun->iznos,$racun->jmbg);
            $s->execute();
            $s->close();
        }
        return true;
    }
    return false;
}
?>
