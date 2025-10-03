<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Studenten slettes basert på valgt brukernavn
*/
?> 

<script src="funksjoner.js"></script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Brukernavn  
  <select name="brukernavn" id="brukernavn">
    <option value="">velg brukernavn</option>
    <?php include("dynamiske-funksjoner.php"); "listeboksStudent"(); ?> 
  </select>  <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    $brukernavn = $_POST["brukernavn"];    

    if (!$brukernavn) {
        print("Det er ikke valgt noen student."); 
    } else {        
        include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

        $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
        mysqli_query($db, $sqlSetning) or die("ikke mulig å slette data i databasen");
        /* SQL-setning sendt til database-serveren */
    
        if (mysqli_affected_rows($db) > 0) {
            print("Følgende student er nå slettet: $brukernavn <br />");
        } else {
            print("Ingen student med brukernavn $brukernavn ble funnet.");
        }
    }
}
?>