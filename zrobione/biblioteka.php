<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="baner">
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    
    <main id="main">
        <section id="lewy">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <?php
                    $conn = new mysqli('localhost','root','','biblioteka');
                    $zap1="SELECT imie, nazwisko
                    FROM autorzy
                    GROUP BY nazwisko asc;";
                    $result=$conn->query($zap1);

                    echo "<ol>";
                    while($row=$result->fetch_assoc()){
                        $imie=$row['imie'];
                        $nazwisko=$row['nazwisko'];
                        echo "<li>$imie,$nazwisko</li>";
                    }
                    echo "</ol>";
                ?>
            </ol>
        </section>

        <section id="srodkowy">
            <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
            <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a></p>
            <img src="biblioteka.png" alt="książki">
        </section>

        <section id="prawy">
            <div id="prawy-gorny">
                <h3>Dodaj czytelnika</h3>
                <form action="biblioteka.php" method="post">
                    <label>imię: <input type="text" name="imie"></label><br>
                    <label>nazwisko: <input type="text" name="nazwisko"></label><br>
                    <label>symbol: <input type="number" name="symbol"></label><br>
                    <button type="submit">DODAJ</button>
                </form>
            </div>
            <div id="prawy-dolny">
                    <?php
                     $imie=$_POST['imie'];
                     $nazwisko=$_POST['nazwisko'];
                     $zap2="INSERT INTO czytelnicy (imie,nazwisko)
                     VALUES ('$imie','$nazwisko');";

                     echo "Czytelnik $imie, $nazwisko został dodany do bazy danych";
                     $result=$conn->query($zap2);
             
                     $conn->close();
                 ?>
            </div>
        </section>
    </main>
    <footer id="stopka">
        <p>Projekt strony: 123123</p>
    </footer>
</body>
</html>