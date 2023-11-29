<?php
$conn = mysqli_connect("localhost", "root", "", "biblioteka");
$imie = strval("Alojzy");
$nazwisko = strval("Nowak");
$rok = strval(1993);
$haslo = strtolower(substr($imie, 0, 2) . substr($rok, 2, 2) . substr($nazwisko, 0, 2));
$query = "INSERT INTO czytelnicy VALUES(null, '$imie', '$nazwisko', '$haslo');";
echo $query;
mysqli_query($conn, $query);
mysqli_close($conn);
