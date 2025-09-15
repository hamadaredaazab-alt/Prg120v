<!DOCTYPE html>
<html>
<head>
  <title>oppgave 1</title>
</head>
<body>
  <h3>oppgave 1</h3>
    
  <form method="post" action="oppgaver2/oppgave1.php" id="oppgave1" name="oppgave1">
    Hva er 3 ganger 3 ? <input type="text" id="svar" name="svar" required  /> <br />
    <input type="submit" value="Fortsett" id="fortsett" name="fortsett" />
    <input type="reset" value="Nullstill" name="nullstill" id="nullstill" /> <br />
  </form>
</body>
</html>
<?php /* Oppgave 1 */
/*
/* Programmet mottar fra et HTML-skjema et svar på spørsmålet "Hva er 3 ganger 3 ?"
/* Programmet sjekker om svaret er riktig og skriver ut en melding avhengig av om svaret er riktig eller feil
*/
$svar=$_POST ["svar"];
if ($svar == 9) /* avgitt svar er riktig */
{
print("Riktig. 3 ganger 3 er 9 <br/>");
}
else /* avgitt svar er feil */
{
print("Feil. 3 ganger 3 er ikke $svar. 3 ganger 3 er 9 <br/>");
}
?>