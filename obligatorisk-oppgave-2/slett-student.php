<?php  /* slett-student.php */
/*
/* Programmet lager et skjema for å slette en student
/* Studenten slettes basert på studentnummer skrevet manuelt
*/

 include("dynamiske-funksjoner.php"); // henter funksjonen
?>
<script src="funksjon.js"> </script>
<h3>Slett student</h3>

<form method="post" action="slett-student.php" id="slettStudentSkjema" name="slettStudentSkjema">
    Brukernavn: 
    <input type="text" id="Brukernavn" name="Brukernavn" required /> <br/><br/>
    <input type="submit" value="Slett student" name="slettStudentKnapp" /> 
    <input type="reset" value="Nullstill" /> 
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    $Brukernavn = $_POST["Brukernavn"]; 

    if (!$Brukernavn) {
        print("Ingen Brukernavn skrevet inn <br />");
    } else {
        include("db-tilkobling.php");

        // Sjekk om studenten finnes
        $sjekk = "SELECT * FROM student WHERE Brukernavn='$Brukernavn';";
        $resultat = mysqli_query($db, $sjekk);

        if (mysqli_num_rows($resultat) == 0) {
            print("Ingen student med Brukernavn $Brukernavn ble funnet.");
        } else {
            // Slett studenten
            $sqlSetning = "DELETE FROM student WHERE Brukernavn='$Brukernavn';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette student fra databasen");

            if (mysqli_affected_rows($db) > 0) {
                print("Student med Brukernavn $Brukernavn er nå slettet.");
            } else {
                print("Noe gikk galt ved sletting.");
            }
        }
    }
}
?>