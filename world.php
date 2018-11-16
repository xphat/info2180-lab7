<?php



$country = $_GET['country'];
$country = filter_var(htmlentities($country), FILTER_SANITIZE_STRING);

$all = $_GET['all'];
$all = filter_var($all, FILTER_VALIDATE_BOOLEAN);





$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if ($all == true)
{
    $stmt = $conn->query("SELECT * FROM countries");
}
else if ($all == false)
{
    $stmt = $conn->query("SELECT * FROM countries where name like '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<ul>';
if (trim($country) == "" and $all == false)
{
    echo '<li>Nothing to Search For - Sorry!</li>';
}
else
{
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
}
echo '</ul>';