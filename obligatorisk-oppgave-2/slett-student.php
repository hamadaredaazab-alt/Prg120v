<?php  /* slett-student.php */
/*
/* Programmet lager et skjema for å slette en student
/* Studenten slettes basert på studentnummer skrevet manuelt
*/
?>

<h3>Slett student</h3>

<form method="post" action="slett-student.php" id="slettStudentSkjema" name="slettStudentSkjema">
    Studentnummer: 
    <input type="text" id="studentnr" name="studentnr" required /> <br/><br/>
    <input type="submit" value="Slett student" name="slettStudentKnapp" /> 
    <input type="reset" value="Nullstill" /> 
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    $studentnr = $_POST["studentnr"]; 

    if (!$studentnr) {
        print("Ingen studentnummer skrevet inn <br />");
    } else {
        include("db-tilkobling.php");

        // Sjekk om studenten finnes
        $sjekk = "SELECT * FROM student WHERE studentnr='$studentnr';";
        $resultat = mysqli_query($db, $sjekk);

        if (mysqli_num_rows($resultat) == 0) {
            print("Ingen student med nummer $studentnr ble funnet.");
        } else {
            // Slett studenten
            $sqlSetning = "DELETE FROM student WHERE studentnr='$studentnr';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette student fra databasen");

            if (mysqli_affected_rows($db) > 0) {
                print("Student med nummer $studentnr er nå slettet.");
            } else {
                print("Noe gikk galt ved sletting.");
            }
        }
    }
}
?>