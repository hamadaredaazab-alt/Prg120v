<!DOCTYPE html>
<html>
<head>
  <title>Oppgave 1</title>
</head>
<body>
  <h3>Oppgave 1</h3>

  <form method="post" action="" id="oppgave1" name="oppgave1">
    Hva er 3 ganger 3? 
    <input type="text" id="svar" name="svar" required /> <br />
    
    <input type="submit" value="Fortsett" id="fortsett" name="fortsett" />
    <input type="reset" value="Nullstill" name="nullstill" id="nullstill" /> <br />
  </form>

  <?php
  // Sjekk om skjemaet er sendt inn
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Hent og trim brukersvaret
      $svar = trim($_POST["svar"]);
      $svarTall = (int)$svar;

      // Sjekk om svaret er riktig
      if ($svarTall === 9) {
          echo "<p style='color: green;'>Riktig. 3 ganger 3 er 9.</p>";
      } else {
          echo "<p style='color: red;'>Feil. 3 ganger 3 er ikke $svar. 3 ganger 3 er 9.</p>";
      }
  }
  ?>
</body>
</html>
