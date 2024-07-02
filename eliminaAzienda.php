<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Collegamento al tuo file CSS -->
    <link rel="stylesheet" href="CSS/stylehome.css">
    <img src="img/logo.png" width="250" height="100">
</head>
<body>
    <center>
    <h1>Elimina Azienda</h1> <br> 
            <table border="1">
            <tr>
                <th>Id Azienda</th>
                <th>Nome</th>
                <th>Indirizzo</th>
                <th>Provincia</th>
                <th>Codice Postale</th>
                <th>Elimina</th>
                <th>Modifica</th>
            </tr>
            <?php
                session_start(); 
                include "connessione.php";
                $query="select * from AZIENDA";
                $result=$connessione->query($query);
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['ID']."</td>";
                    echo "<td>".$row['NOME']."</td>";
                    echo "<td>".$row['INDIRIZZO']."</td>";
                    echo "<td>".$row['PROVINCIA']."</td>";
                    echo "<td>".$row['CODICE_POSTALE']."</td>";
                    echo "<td>";
                    echo "<form method='POST' action='eliminaAziendacontroller.php'>";
                    echo "<input type='hidden' name='id_azienda' value='".$row['ID']."'>";
                    echo "<button type='submit'>Elimina</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='modificaAzienda.php'>";
                    echo "<input type='hidden' name='id_azienda' value='".$row['ID']."'>";
                    echo "<button type='submit'>Modifica</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
            <br>
            <a href="profile.php">Torna alla home</a>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>