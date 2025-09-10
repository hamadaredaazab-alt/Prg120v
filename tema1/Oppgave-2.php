<?php
/* Oppgave-2
   Programmet mottar fra et HTML-skjema et navn og en alder via POST-metoden.
   Programmet skriver ut en "god dag"-melding med personens navn og alder.
*/

// Sjekk at skjemaet er sendt inn via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Hent data fra skjemaet
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $alder = $_POST["alder"];

    // Skriv ut hilsen
    echo "God dag $fornavn $etternavn, du er $alder &aring;r og like sprek.<br />";
} else {
    echo "Ingen data ble sendt inn.";
}
?>
