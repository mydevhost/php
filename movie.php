<?php
$db = mysql_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('test', $db) or die(mysql_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            movie_name, movie_type, movie_year, movie_leadactor, movie_director
        FROM
            movie
        WHERE
            movie_id = ' . $_GET['id'];
    $result = mysql_query($query, $db) or die(mysql_error($db));
    extract(mysql_fetch_assoc($result));
} else {
    //set values to blank
    $movie_name = '';
    $movie_type = 0;
    $movie_year = date('Y');
    $movie_leadactor = 0;
    $movie_director = 0;
}
?>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=movie"
   method="post">
   <table class="form">
    <tr>
     <td>Movie Name</td>
     <td><input type="text" name="movie_name"
      value="<?php echo $movie_name; ?>"/></td>
    </tr><tr>
     <td>Movie Type</td>
     <td><select name="movie_type">
<?php
// select the movie type information
$query = 'SELECT
        movietype_id, movietype_label
    FROM
        movietype
    ORDER BY
        movietype_label';
$result = mysql_query($query, $db) or die(mysql_error($db));

// populate the select options with the results
while ($row = mysql_fetch_assoc($result)) {
    foreach ($row as $value) {
        if ($row['movietype_id'] == $movie_type) {
            echo '<option value="' . $row['movietype_id'] .
                '" selected="selected">';
        } else {
            echo '<option value="' . $row['movietype_id'] . '">';
        }
        echo $row['movietype_label'] . '</option>';
    }
}
?>
      </select></td>
    </tr><tr>
     <td>Movie Year</td>
     <td><select name="movie_year">
<?php
// populate the select options with years
for ($yr = date("Y"); $yr >= 1970; $yr--) {
    if ($yr == $movie_year) {
        echo '<option value="' . $yr . '" selected="selected">' . $yr .
            '</option>';
    } else {
        echo '<option value="' . $yr . '">' . $yr . '</option>';
    }
}
?>
      </select></td>
    </tr><tr>
     <td>Lead Actor</td>
     <td><select name="movie_leadactor">
<?php
// select actor records
$query = 'SELECT
        people_id, people_fullname
    FROM
        people
    WHERE
        people_isactor = 1
    ORDER BY
        people_fullname';
$result = mysql_query($query, $db) or die(mysql_error($db));

// populate the select options with the results
while ($row = mysql_fetch_assoc($result)) {
    foreach ($row as $value) {
        if ($row['people_id'] == $movie_leadactor) {
            echo '<option value="' . $row['people_id'] .
                '" selected="selected">';
        } else {
            echo '<option value="' . $row['people_id'] . '">';
        }
        echo $row['people_fullname'] . '</option>';
    }
}
?>
      </select></td>
    </tr><tr>
     <td>Director</td>
     <td><select name="movie_director">
<?php
// select director records
$query = 'SELECT
        people_id, people_fullname
    FROM
        people
    WHERE
        people_isdirector = 1
    ORDER BY
        people_fullname';
$result = mysql_query($query, $db) or die(mysql_error($db));

// populate the select options with the results
while ($row = mysql_fetch_assoc($result)) {
    foreach ($row as $value) {
        if ($row['people_id'] == $movie_director) {
            echo '<option value="' . $row['people_id'] .
                '" selected="selected">';
        } else {
            echo '<option value="' . $row['people_id'] . '">';
        }
        echo $row['people_fullname'] . '</option>';
    }
}
?>
      </select></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="movie_id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
