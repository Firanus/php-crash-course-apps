<html>
<body>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: adaniilidis
 * Date: 26/07/2017
 * Time: 15:04
 */
require_once "mvcModelExercise.php";

// define variables and set to empty values
$name = $last = $ssn = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $last = test_input($_POST["last"]);
    $ssn = test_input($_POST["ssn"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$dataAccess = new DataAccessClass("localhost", "root", "root");
$dataAccess->put_data($name, $last, $ssn, "my_data");

echo "<h2>Your Given details are as :</h2>";

$dataAccess->get_data($name);

?>
</body>
</html>