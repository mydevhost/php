<?php
$db = mysql_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('test', $db) or die(mysql_error($db));

$page_title = "Movie databases";
$css_files = array('style.css', 'admin.css', 'ajax.css','table.css');


include 'header.php';
echo '<div id="content">';
?>
<h2>Movie Databases</h2>
 <table align="center" style=" ">
  <tr>
   <th colspan="2">Movies <a href="movie.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM movie';
$result = mysql_query($query, $db) or die (mysql_error($db));

$odd = true;
while ($row = mysql_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;" style="font-weight:bold">'; 
    echo $row['movie_name'];
    echo '</td><td>';
    echo ' <a href="movie.php?action=edit&id=' . $row['movie_id'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=movie&id=' . $row['movie_id'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">People <a href="people.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM people';
$result = mysql_query($query, $db) or die (mysql_error($db));

$odd = true;
while ($row = mysql_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;" style="font-weight:bold">'; 
    echo $row['people_fullname'];
    echo '</td><td>';
    echo ' <a href="people.php?action=edit&id=' . $row['people_id'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=people&id=' . $row['people_id'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
  
  
  
  
  
<?php
echo '</div>';
include 'footer.php';
?>
