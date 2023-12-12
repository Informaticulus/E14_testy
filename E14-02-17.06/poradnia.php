<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poradnia</title>
    <link rel="stylesheet" href="poradnia.css">
</head>

<body>
    <section id="baner">
        <h1>PORADNIA SPECJALISTYCZNA</h1>
    </section>
    <section id="lewy">
        <h3>LEKARZE SPECJALIŚCI</h3>
        <table>
            <tr>
                <td colspan="2">Poniedziałek</td>
            </tr>
            <tr>
                <td>Anna Kowalska</td>
                <td>Otolaryngolog</td>
            </tr>
            <tr>
                <td colspan="2">Wtorek</td>
            </tr>
            <tr>
                <td>Jan Nowak</td>
                <td>kardiolog</td>
            </tr>
        </table>
        <h3>LISTA PACJENTÓW</h3>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "poradnia");
        if (mysqli_connect_errno()) {
            echo "Błąd połączenia: " . mysqli_connect_error();
            exit();
        }
        $query = "SELECT id, imie, nazwisko, choroba from pacjenci;";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo $row[0] . ' ' . $row[1] . ' ' . $row[2] . ' ' . $row[3] . '<br>';
        }
        mysqli_close($conn);
        ?>
        <br><br>
        <form action="pacjent.php" method="post">
            Podaj id:<br>
            <input type="number" name="id" id=""><br>
            <input type="submit" name="submit" value="Pokaż szczegóły">
        </form>
    </section>
    <section id="prawy">
        <h2>KARTA PACJENTA</h2>
        <p>Nie wybrano pacjenta</p>
    </section>
    <section id="stopka">
        <p>utworzone przez: 00000000000</p>
        <a href="kwerendy.txt">Kwerendy do pobrania</a>
    </section>

</body>

</html>