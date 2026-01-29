<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/today.css">
    <title>Document</title>
</head>
<body>
    <h1>PHP</h1>
    <p>Date d’aujourd’hui: <?= $dateJour ?></p>

    <table>
            <tr>
                <?php 
                    foreach ($joursFr as $jour) { 
                        if ($jour == $jourEnCours) {
                            echo '<td id=today>' . $jour . '</td>';
                        } else {
                            echo '<td>' . $jour . '</td>';
                        }
                    } 
                ?>
            </tr>
        </table>

</body>
</html>