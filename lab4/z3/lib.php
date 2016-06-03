<?php
/*************************************************************************************************************************
 * Projekat:    Lab 4, zadatak 3
 * Autor:       Nikola Vitanovic 14992
 * Date:        2016-06-03
 *************************************************************************************************************************/
require 'MySmarty.php';
require 'Knjiga.php';

define("DB_HOST","localhost");
define("DB_NAME","lab4_3");
define("DB_USER","root");
define("DB_PASS","");

function vrati_ukupan_broj_knjiga() {
    // funkcija za konektovanje na bazu podataka
    // parametri su server_baze, username, password, ime_baze
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno) {
        // u slucaju greske odstampati odgovarajucu poruku
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    }
    else {
        // $res je rezultat izvrsenja upita
        $res = $con->query("select COUNT(*) from knjiga");
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
function vrati_knjigu_po_rednom_broju($rb)
{
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno)
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    else
    {
        $row = null;
        $max = 1;
        $s = $con->prepare("SELECT * FROM knjiga LIMIT ?,?");
        $s->bind_param('ii',$rb,$max);
        $s->execute();
        $res = $s->get_result();
        $row = $res->fetch_array();
        $s->close();
        return $row;
    }
}
function brisi_knjigu($isbn)
{
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno)
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    else
    {
        $s = $con->prepare("DELETE FROM knjiga WHERE isbn = ? LIMIT 1");
        $s->bind_param('s',$isbn);
        $s->execute();
        $s->close();
    }
}
?>
