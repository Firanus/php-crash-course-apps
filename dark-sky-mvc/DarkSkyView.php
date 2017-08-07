<?php
require_once 'DarkSkyController.php';
$controller = new DarkSkyController();

?>

<html>
<head></head>
<body>
    <table>
        <tr>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Summary</th>
            <th>Time</th>
        </tr>
        <?php
            $tableResults = $controller->getWeatherTable();
            $tableRows = '';
            foreach ($tableResults as $value){
                $tableRows .= '<tr>' .
                    '<td>'.$value['latitude'].'</td>' .
                    '<td>'.$value['longitude'].'</td>' .
                    '<td>'.$value['summary'].'</td>' .
                    '<td>'.$value['time'].'</td>' .
                    '</tr>';
            }
            echo $tableRows;
        ?>
    </table>
</body>
</html>
