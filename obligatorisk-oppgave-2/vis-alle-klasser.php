<?php /* vis-klasser */
/*
/* Programmet henter og viser alle klasser fra databasen
*/
?>
<h3>Alle klasser</h3>

<?php
include("db-tilkobling.php");

$sqlSetning = "SELECT klassekode, klassenavn, studiumkode FROM klasse;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);

if ($antallRader == 0) {
    print("Ingen klasser er registrert");
} else {
    print("<table border='1'>");
    print("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>");
    while ($rad = mysqli_fetch_array($sqlResultat)) {
        $klassekode = $rad["klassekode"];
        $klassenavn = $rad["klassenavn"];
        $studiumkode = $rad["studiumkode"];
        print("<tr><td>$klassekode</td><td>$klassenavn</td><td>$studiumkode</td></tr>");
    }
    print("</table>");
}
?>