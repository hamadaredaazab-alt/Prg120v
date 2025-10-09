<?php /* slett-flere-poststeder */ ?>
<script src="funksjoner.js"></script>

<h3>Slett poststeder</h3>

<form method="post" action="" id="slettPoststedSkjema" name="slettPoststedSkjema" onSubmit="return bekreft()">
  Poststed <br />
  <?php 
    include("dynamiske-funksjoner.php"); 
    sjekkbokserPostnr(); 
  ?> 
  <br/>
  <input type="submit" value="Slett poststed" name="slettPoststedKnapp" id="slettPoststedKnapp" /> 
</form>

<?php
if (isset($_POST["slettPoststedKnapp"])) {
    $postnr = isset($_POST["postnr"]) ? $_POST["postnr"] : [];
    $antall = count($postnr);

    if ($antall === 0) {
        echo "Ingen poststeder ble valgt <br />";
    } else {
        include("db-tilkobling.php");

        $stmt = $db->prepare("DELETE FROM poststed WHERE postnr = ?");
        foreach ($postnr as $nr) {
            $stmt->bind_param("s", $nr);
            $stmt->execute();
        }

        echo "De valgte poststedene er nå slettet <br />";
    }
}
?>