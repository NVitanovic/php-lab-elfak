<?php
/*************************************************************************************************************************
 * Projekat:    Lab 4, zadatak 1
 * Autor:       Nikola Vitanovic 14992
 * Date:        2016-06-03
 *************************************************************************************************************************/
require 'MySmarty.php';
require 'Knjiga.php';

define("DB_HOST","localhost");
define("DB_NAME","lab4_1");
define("DB_USER","root");
define("DB_PASS","");

function vrati_sve_knjige() {
    // funkcija za konektovanje na bazu podataka
    // parametri su server_baze, username, password, ime_baze
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno) {
        // u slucaju greske odstampati odgovarajucu poruku
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    }
    else {
        // $res je rezultat izvrsenja upita
        $res = $con->query("select * from knjiga");
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
function brisi_knjigu($isbn)
{
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($con->connect_errno)
        print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
    else
    {
        $s = $con->prepare("DELETE FROM knjiga WHERE isbn = ?");
        $s->bind_param('s',$isbn);
        $s->execute();
        $s->close();
    }
}
function dodaj_knjigu($knjiga)
{
    if(get_class($knjiga) == 'Knjiga')
    {
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($con->connect_errno)
            print ("Connection error (" . $con->connect_errno . "): $con->connect_error");
        else
        {
            $s = $con->prepare("INSERT INTO knjiga (isbn,naslov,autor,izdanje,ocena) VALUES(?,?,?,?,?)");
            $s->bind_param('sssss',$knjiga->isbn,$knjiga->naslov,$knjiga->autor,$knjiga->izdanje,$knjiga->ocena);
            $s->execute();
            $s->close();
        }
        return true;
    }
    return false;
}
?>
