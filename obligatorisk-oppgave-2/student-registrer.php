<?php /* registrer-student */
/*
/* Programmet lager et html-skjema for å registrere en student
/* Programmet registrerer data (brukernavn, fornavn, etternavn, klassekode) i databasen
*/
?>
<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>

klasse<select name="klassekode" id="klassekode">

<?php print("<option value=''>velg klasse </option>");
include("dynamiske-funksjoner.php"); 
sjekkbokserbruknavne(); ?>
</select> <br/>

<input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
        print("Alle felt må fylles ut");
    } else {
        include("db-tilkobling.php");

        // Sjekk om brukernavn allerede finnes
        $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader != 0) {
            print("Studenten er registrert fra før");
        } else {
            $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
                           VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere data i databasen");

            print("Følgende student er nå registrert: $brukernavn $fornavn $etternavn ($klassekode)");
        }
    }
}
?>