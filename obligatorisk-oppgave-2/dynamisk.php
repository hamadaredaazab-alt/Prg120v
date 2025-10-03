<?php /* dynamiske-funksjoner */
/*
/* denne filen inneholder følgende dynamiske funksjoner:
/* listeboksklassekode ()

*/
function listeboksklassekode ()
{
include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */
$sqlSetning="SELECT * FROM studium ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$klassekode=$rad["klassekode"];
$studiumkode=$rad["studiumkode"];
print("<option value='$studiumkode'>$studiumkode $studiumkode </option>"); /* ny verdi i listeboksen
laget */
}
}
function listeboksstudent ()
{
include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */
$sqlSetning="SELECT * FROM emne ORDER BY studentkode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$Brukernavn=$rad["Brukernavn"];
$Brukernavn=$rad["Brukernavn"];
$studiumkode=$rad["studiumkode"];
print("<option value='$Brukernavn'>$Brukernavn $Brukernavn </option>"); /* ny verdi i listeboksen laget
*/
}
}
?>