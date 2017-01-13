<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


$db = null;
try
{
    $db = new PDO('mysql:host=localhost;dbname=mobiflow',
                  'user', 'pass');
}
catch (Exception $e)
{
    echo '{"result": "fail", "errors": ["'. $e->getMessage() .'"]}';
    return;
}

$sql = file_get_contents("table.sql");
$stmt = $db->prepare($sql);
if($stmt->execute())
{
    echo '{"result": "ok"}';
}
else
{
    echo '{"result": "fail", "errors": ['. $stmt->errorInfo() .'"]}';
}
$stmt->closeCursor();
