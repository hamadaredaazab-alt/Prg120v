<?php /* slett-student */
/*
/* Programmet lager et skjema for å slette en student
/* Studenten slettes basert på valgt brukernavn
*/
?>
<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema">
Brukernavn på student som skal slettes:
<input type="text" id="brukernavn" name="brukernavn" required /> <br/>
<input type="submit" value="Slett student" id="slettStudentKnapp" name="slettStudentKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    $brukernavn = $_POST["brukernavn"];

    if (!$brukernavn) {
        print("Brukernavn må fylles ut");
    } else {
        include("db-tilkobling.php");

        $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
        mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data fra databasen");

        if (mysqli_affected_rows($db) > 0) {
            print("Student med brukernavn $brukernavn er slettet");
        } else {
            print("Ingen student med brukernavn $brukernavn ble funnet");
        }
    }
}
?>