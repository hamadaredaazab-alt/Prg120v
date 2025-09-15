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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $svar = trim($_POST["svar"]);
      $svarTall = (int)$svar;

      if ($svarTall === 9) {
          echo "Riktig. 3 ganger 3 er 9 <br/>";
      } else {
          echo "Feil. 3 ganger 3 er ikke $svar. 3 ganger 3 er 9 <br/>";
      }
  }
  ?>
</body>
</html>
