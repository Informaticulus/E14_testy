<?php
$conn = mysqli_connect("localhost", "root", "", "biblioteka");

if (mysqli_connect_errno()) {
    echo "Błąd połączenia: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </section>
    <section id="lewy">
        <h2>Dodaj czytelnika</h2>
        <form action="" method="post">
            imię:<input type="text" name="imie" id=""><br>
            nazwisko:<input type="text" name="nazwisko" id=""><br>
            rok urodzenia:<input type="number" name="rok" id=""><br>
            <input type="submit" name="submit" value="DODAJ">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            unset($_POST['submit']);
            $imie = strval($_POST['imie']);
            $nazwisko = strval($_POST['nazwisko']);
            $rok = strval($_POST['rok']);
            $haslo = strtolower(substr($imie, 0, 2) . substr($rok, 2, 2) . substr($nazwisko, 0, 2));
            $query = "INSERT INTO czytelnicy VALUES(null,'$imie', '$nazwisko', '$haslo');";
            mysqli_query($conn, $query);
            echo "Czytelnik " . $imie . " " . $nazwisko . " został dodany do bazy danych";
        }
        ?>
    </section>
    <section id="srodkowy">
        <img src="../Ark/biblioteka.png" alt="biblioteka">
        <h4>ul. Czytelnicza 25</br>
            12-120 Książkowice<br>
            tel. 123123123<br>
            email: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a></h4>
    </section>
    <section id="prawy">
        <h3>Nasi czytelnicy</h3>
        <ul>
            <?php
            $query = "SELECT imie, nazwisko FROM czytelnicy;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<li>' . $row[0] . " " . $row[1] . '</li>';
            }
            mysqli_close($conn);
            ?>
        </ul>
    </section>
    <section id="stopka">
        <p>Projekt witryny: 00000000000</p>
    </section>
</body>

</html>