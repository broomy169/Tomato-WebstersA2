<?php
// checking if session not started then start new session
if (!isset($_SESSION)){
    session_start();
}

isset($urlVar) || $urlVar = "";
include($urlVar . "database_connect.php");

// removing generes nested session array as page loads (this page is included in bands.php)
unset($_SESSION["genres"]);

// setting up genres in session nested array as user selects multiple genres from list and send in post array on submit
if (!empty($_POST["genre"])) {
    // keeping each selected checkbox in session so after refresh checkboxes keep the selection state
    foreach ($_POST["genre"] as $checked){

        $_SESSION["genres"][$checked] = "checked";
    }
}

//displaying current genres
$sql = "SELECT * FROM Genre";

echo "<form method='post' action='bands.php'>\n";

foreach($dbh->query($sql) as $row){
echo "<label>".$row['genre_name']."</label><input type='checkbox' name='genre[]' value=\"'$row[genre_name]'\""; if(isset
    ($_SESSION["genres"]["'$row[genre_name]'"])) echo " checked='checked'"; echo ">\n";
}

echo "<input type='submit' name='submit' value='sort'>";
echo "</form>";
?>