<html>

<head>
    <title>PHP Form Validation</title>
</head>

<body>

<?php
require_once "mvcModelExercise.php";

$dataAccess = new DataAccessClass("localhost", "root", "root");
$dataAccess->create_table("my_data");

?>

<h2>Absolute classes registration</h2>
<form method = "post" action="mvcControllerExercise.php">
    <input type="hidden" value="<?= $name?>" name="name" />
    <input type="hidden" value="<?= $last?>" name="last" />
    <input type="hidden" value="<?= $ssn?>" name="ssn" />
    <table>
        <tr>
            <td>Name:</td>
            <td><input type = "text" name = "name"></td>
        </tr>

        <tr>
            <td>Last:</td>
            <td><input type = "text" name = "last"></td>
        </tr>

        <tr>
            <td>SSN:</td>
            <td><input type = "text" name = "ssn"></td>
        </tr>

        <tr>
            <td>
                <input type = "submit" name = "submit" value = "Submit">
            </td>
        </tr>
    </table>
</form>

</body>
</html>