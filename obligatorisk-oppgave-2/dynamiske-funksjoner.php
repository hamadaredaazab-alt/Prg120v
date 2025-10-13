<?php  /*  dynamiske funksjoner */
/*
/*  denne filen inneholder følgende dynamiske funksjoner:
/*    listeboksklassekode()
/*    sjekkbokserbruknavn()
*/


function listeboksklassekode()
{
  include("db-tilkobling.php");  /* tilkobling til database-server og valg av database utført */
      
  $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
       $klassekode = htmlspecialchars($rad["klassekode"]);
        $klassenavn = htmlspecialchars($rad["klassenavn"]);

      print("<option value='$klassekode'>$klassekode $klassenavn</option>");  /* ny verdi i listeboksen laget */
    }
}

function sjekkbokserbruknavn()
{
  include("db-tilkobling.php");  /* tilkobling til database-server og valg av database utført */
      
  $sqlSetning="SELECT * FROM student ORDER BY fornavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
    /* SQL-setning sendt til database-serveren */
      
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
       $brukernavn = htmlspecialchars($rad["brukernavn"]);
        $fornavn = htmlspecialchars($rad["fornavn"]);
        $etternavn = htmlspecialchars($rad["etternavn"]);
      print("<input type='checkbox' id='brukernavn' name='brukernavn[]' value='$brukernavn' id='bruker_$brukernavn' />
              $fornavn $etternavn ($brukernavn) <br/>");  
        /* ny sjekkboks laget */
    }
}



?>