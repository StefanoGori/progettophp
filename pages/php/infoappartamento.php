<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="../../css/style.css">
        </head>
        <body>
            <div>
                <img id="logo" src="../../images/logo.png">
                <h1 id="nomeA"><b>Teramo immobile srl</b></h1>
                <br>
                <br>
                <br>
                <hr>
                <?php
                print_r($_GET);
                    include "../../db/connection.php";
                    $conn=db();
                    $query="SELECT a.*, 'q.nome' FROM appartamenti AS a INNER JOIN quartieri AS q ON 'q.codice'='a.codicequartiere' WHERE codice='{$_GET['codice']}'";
                    $risultati=$conn->query($query);
                    $rows=array();
                    while($row=mysqli_fetch_array($risultati)){
                        $rows[]=$row;
                        $codice=stripslashes($row['codice']);
                        $indirizzo=stripslashes($row['indirizzo']);
                        $prezzogiorno=stripslashes($row['prezzogiorno']);
                        $numerocamere=stripslashes($row['numerocamere']);
                        $postiletto=stripslashes($row['postiletto']);
                        $usocucina=stripslashes($row['usocucina']);
                        $parcheggio=stripslashes($row['parcheggio']);
                        $note=stripslashes($row['note']);
                        $nomequartiere=stripslashes($row['nome']);
                    }
                    echo"$codice, $indirizzo, $prezzogiorno, $numerocamere, $postiletto, $usocucina, $parcheggio, $note, $nomequartiere";
                ?>
            </div>
        </body>
    </html>