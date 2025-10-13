<script src="funksjon.js"> </script>
<h3>Slett student</h3>

<form method="post" action="" id="slettstudentSkjema" name="slettstudentSkjema" onSubmit="return bekreft()">
Brukernavn på student som skal slettes:
<select name="bruknavn" id="fornavn">
   <option value=""> valg brukernavn </option> 
   
<?php include("dynamiske-funksjoner.php"); sjekkbokserbruknavne(); ?>
</select>
<input type="submit" value="Slett student" id="slettstudentKnapp" name="slettstudentKnapp" />
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