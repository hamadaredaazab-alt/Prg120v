
<?php  /*  Eksempel 2 */
/*
/*    Programmet mottar fra et HTML-skjema et fornavn og et etternavn ved POST-metoden
/*    Programmet lager et fullt navn ved å inkludere en egendefinert fuksjon 
*/

  include("funksjoner.php");  /* funksjoner inkludert */

  $fornavn=$_POST ["fornavn"];
  $etternavn=$_POST ["etternavn"];  

  $navn=fulltNavn($fornavn,$etternavn);

  print ("Navnet er $navn");  

?>