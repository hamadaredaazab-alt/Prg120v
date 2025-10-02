<?php /* vis-studenter */
/*
/* Programmet henter og viser alle studenter fra databasen
*/
?>
<h3>Alle studenter</h3>

<?php
include("db-tilkobling.php");

$sqlSetning = "SELECT brukernavn, fornavn, etternavn, klassekode FROM student;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);

if ($antallRader == 0) {
    print("Ingen studenter er registrert");
} else {
    print("<table border='1'>");
    print("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>");
    while ($rad = mysqli_fetch_array($sqlResultat)) {
        $brukernavn = $rad["brukernavn"];
        $fornavn = $rad["fornavn"];
        $etternavn = $rad["etternavn"];
        $klassekode = $rad["klassekode"];
        print("<tr><td>$brukernavn</td><td>$fornavn</td><td>$etternavn</td><td>$klassekode</td></tr>");
    }
    print("</table>");
}
?>