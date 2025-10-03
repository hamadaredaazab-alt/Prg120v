<?php  /* slett-klasse */
/*
/*  Programmet lager et skjema for å velge en klasse som skal slettes  
/*  Klassen slettes basert på valgt klassekode
*/
?> 

<script src="funksjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  Klassekode 
  <select name="klassekode" id="klassekode">
    <option value="">velg klassekode</option>
    <?php include("dynamiske-funksjoner.php"); "listeboksKlassekode"(); ?> 
  </select>  <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" /> 
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    $klassekode = $_POST["klassekode"];    

    if (!$klassekode) {
        print("Det er ikke valgt noen klassekode."); 
    } else {        
        include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

        // sjekk om det finnes studenter i klassen
        $sjekk = "SELECT * FROM student WHERE klassekode='$klassekode';";
        $resultat = mysqli_query($db, $sjekk);

        if (mysqli_num_rows($resultat) > 0) {
            print("Kan ikke slette klassen $klassekode fordi den har registrerte studenter.");
        } else {
            $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db, $sqlSetning) or die("ikke mulig å slette data i databasen");
            /* SQL-setning sendt til database-serveren */
    
            if (mysqli_affected_rows($db) > 0) {
                print("Følgende klasse er nå slettet: $klassekode <br />");
            } else {
                print("Ingen klasse med kode $klassekode ble funnet.");
            }
        }
    }
}
?>