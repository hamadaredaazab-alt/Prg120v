
<script src="funksjon.js"> </script>

<?php /* slett-klasse */

    include("dynamiske-funksjoner.php"); 
?>
<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema">
Klassekode på klassen som skal slettes:
<select name="klassekode" id="klassekode">
   <option value=""> valg klassekode </option> 
<?php include("dynamiske-funksjoner.php"); listeboksklassekode(); ?>
</select>
<input type="text" id="klassekode" name="klassekode" required /> <br/>
<input type="submit" value="Slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    $klassekode = $_POST["klassekode"];

    if (!$klassekode) {
        print("Klassekode må fylles ut");
    } else {
        include("db-tilkobling.php");

        // Først sjekk om det finnes studenter i klassen
        $sjekk = "SELECT * FROM student WHERE klassekode='$klassekode';";
        $resultat = mysqli_query($db, $sjekk);
        if (mysqli_num_rows($resultat) > 0) {
            print("Kan ikke slette klassen $klassekode fordi den har registrerte studenter.");
        } else {
            $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data fra databasen");

            if (mysqli_affected_rows($db) > 0) {
                print("Klassen med kode $klassekode er slettet");
            } else {
                print("Ingen klasse med kode $klassekode ble funnet");
            }
        }
    }
}
?>
