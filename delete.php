<?php
$db = mysql_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('test', $db) or die(mysql_error($db));
?>

<html>
<head>
<title>th</title>
<style>
.alert {font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size:12px;}
.alert {border-radius:4px;padding: 8px 35px 8px 14px;margin-bottom: 18px;text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);}
.alert {background-color: #D9EDF7;border:solid 1px #BCE8F1;color: #3A87AD; margin:auto;}
.alert a{color: #3A87AD; font-weight:bold;}
</style>
</head>
<body>
<?php
$db = mysql_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('test', $db) or die(mysql_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'movie':
        echo '<p class="alert">Are you sure you want to delete this movie?<br/>';
        break;
    case 'people':
        echo '<p class="alert">Are you sure you want to delete this person?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="#" class="no">no</a></p>';
} else {
    switch ($_GET['type']) {
    case 'people':
        $query = 'UPDATE movie SET
                movie_leadactor = 0 
            WHERE
                movie_leadactor = ' . $_GET['id'];
        $result = mysql_query($query, $db) or die(mysql_error($db));

        $query = 'DELETE FROM people 
            WHERE
                people_id = ' . $_GET['id'];
        $result = mysql_query($query, $db) or die(mysql_error($db));
?>
<p align="center" style="text-align: center;" class="alert">Your person has been deleted.
<a href="index.php">Return to Index</a></p>
<?php
        break;
    case 'movie':
        $query = 'DELETE FROM movie 
            WHERE
                movie_id = ' . $_GET['id'];
        $result = mysql_query($query, $db) or die(mysql_error($db));
?>
<p align="center" style="text-align: center;" class="alert">Your movie has been deleted.
<a href="index.php">Return to Index</a></p>
<?php
        break;
    }
}
?>
</body>
</html>
