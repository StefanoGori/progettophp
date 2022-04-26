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
                <h3><b>Appartamenti offerti dall'Agenzia:</b></h3>
                <br>
                <ul>
                <?php
                    include '../../db/connection.php';
                    $conn=db();
                    $query="SELECT codice, indirizzo FROM appartamenti ORDER BY indirizzo";
                    $risultati=$conn->query($query);
                    $rows=array();
                    while($row=mysqli_fetch_array($risultati)){
                        $rows[]=$row;
                        $indirizzo=stripslashes($row['indirizzo']);
                        $codice=stripslashes($row['codice']);
                        echo"<li><a href=infoappartamento.php?$codice>$indirizzo</a></li>";
                    }
                ?>
                </ul>
            </div>
            <div id="aggapp">
                <a href=../proprietari.html id="linkaggapp"><b>AGGIUNGI UN APPARTAMENTO IN AFFITTO</b></a>
            </div>
        </body>
    </html>