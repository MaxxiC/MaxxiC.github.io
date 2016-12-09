<?php

$arrayUser = array("Nome" => $_POST["Nom"],
				   "Cognome" => $_POST["Cng"],
				   "Indirizzo" => $_POST["Indr"],
				   "CodFisca" => $_POST["CodF"]);
				   
$NConcertoScelto = $_POST["NomeConcerto"];
$NBiglietti = $_POST["Nbtt"];



echo("
<html>
<head>
<title>Prova di Conti M - 07/12/16</title>
</head>
<body>

<form name=\"miaForm\" action=\"PagPHP.php\" method=\"POST\">

<h1 align=\"center\">Acquista Biglietti Online</h1>
<p align=\"center\">

<table border=\"2\">

<tr>
<td>Cognome</td>
<td>Nome</td>
<td>Indirizzo</td>
<td>Codice Fiscale</td>
</tr>

<tr>
<td><input type=\"text\" name=\"Cng\" value=\"$arrayUser[Cognome]\" ></input></td>
<td><input type=\"text\" name=\"Nom\" value=\"$arrayUser[Nome]\" ></input></td>
<td><input type=\"text\" name=\"Indr\" value=\"$arrayUser[Indirizzo]\" ></input></td>
<td><input type=\"text\" name=\"CodF\" value=\"$arrayUser[CodFisca]\" ></input></td>
</tr>

</table>

Seleziona il concerto:
<select name=\"NomeConcerto\">
 <option value=1>The 1975 - 30 euro</option>
 <option value=2>The Killers - 50 euro</option>
 <option value=3>Bethowen - 777 euro</option>
 <option value=4>Salmo - 1984 euro</option>
 <option value=5>Oasis - 70 euro</option>
 <option value=6>The Beatles - 120 euro</option>
 <option value=7>Rovazzi - 1 euro</option>
</select>
<br>
Quanti biglietti vuoi comprare:

<select name=\"Nbtt\">
 <option value=1>1</option>
 <option value=2>2</option>
 <option value=3>3</option>
 <option value=4>4</option>
 <option value=5>5</option>
 <option value=6>6</option>
 <option value=7>7</option>
 <option value=8>8</option>
 <option value=9>9</option>
</select>
<input type=\"submit\" value=\"CALCOLO PREZZO\">
</p>

</form>
");





$arrayConc = array("1" => "The 1975",
				   "2" => "The Killers",
				   "3" => "Bethowen",
				   "4" => "Salmo",
				   "5" => "Oasis",
				   "6" => "The Beatles",
				   "7" => "Rovazzi");

$arrayConc = array("1" => 30,
				   "2" => 50,
				   "3" => 777,
				   "4" => 1984,
				   "5" => 70,
				   "6" => 120,
				   "7" => 1);

$Prezzotot = $NBiglietti * $arrayConc[$NConcertoScelto];

echo("<br> <p align=\"center\"> Sono stati selezionati $NBiglietti biglietti per $arrayUser[Nome] $arrayUser[Cognome] per un totale di $Prezzotot EURO  </p>");

$PrezzoTre = ($Prezzotot * 20)/100;
$PrezzoDue = ($Prezzotot * 18)/100;
$PrezzoUno = ($Prezzotot * 13)/100;
$scritta = "Siccome il prezzo supera la cifra di";
$scritta2 = "e' stato applicato uno sconto del";
$scritta3 = "<br> Prezzo Totale Finale: ";
$PrezzoFinale = 0;

if($Prezzotot > 199)
{
$PrezzoFinale = $Prezzotot - $PrezzoTre;
echo("<p align=\"center\"> $scritta 200 euro $scritta2 20% ($PrezzoTre euro) $scritta3 $PrezzoFinale EURO</p>");
}
else{
	if($Prezzotot > 99){
	$PrezzoFinale = $Prezzotot - $PrezzoDue;
	echo("<p align=\"center\"> $scritta 100 euro $scritta2 18% ($PrezzoDue euro) $scritta3 $PrezzoFinale EURO</p>");}
	else{
		if($Prezzotot > 49){
		$PrezzoFinale = $Prezzotot - $PrezzoUno;
		echo("<p align=\"center\"> $scritta 50 euro $scritta2 13% ($PrezzoUno euro) $scritta3  $scritta3 $PrezzoFinale EURO</p>");}
	}
}



$collegamento = fopen("Dati.txt",'w');
$stri = "Nome: $arrayUser[Nome] \r\nCognome: $arrayUser[Cognome] \r\nIndirizzo: $arrayUser[Indirizzo] \r\nCodice Fiscale: $arrayUser[CodFisca]
\r\nNome Concerto: $arrayConc[$NConcertoScelto] \r\nNumero Biglietti: $NBiglietti \r\nPrezzo Totale: $PrezzoFinale";
fwrite($collegamento, $stri);
fclose($collegamento);

echo("<p align=\"center\"> (Si ti e' utile si creato un file con tutti i dati, di nome Dati.txt) </p> </body> </html>");

?>