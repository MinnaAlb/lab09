<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Lab 09 - display cars from MySQL using PHP">
  <meta name="keywords" content="PHP, MySQL, cars">
  <meta name="author" content="Minna">
  <title>Used Cars - Lab 09</title>
  <style>
  /* Borders for the car listing table */
  table { border-collapse: collapse; }
  th, td { border: 1px solid #333333; padding: 0.4rem; }
</style>
</head>
<body>
  <h1>Used Car Dealership</h1>
<?php
  // Load the database connection details from settings.php
  require_once "settings.php";

  // Step 1: Connect to the database
  $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

  if ($dbconn) {
    // Step 2: Create the SQL query
    $query = "SELECT * FROM cars";

    // Step 3: Execute the SQL query
    $result = mysqli_query($dbconn, $query);

    // Step 4: Check that the query worked
        if ($result && mysqli_num_rows($result) > 0) {
      // Build the HTML table: header row first, then one row per car
      echo "<table>\n";
      echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>\n";

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["car_id"] . "</td>";
        echo "<td>" . $row["make"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>$" . $row["price"] . "</td>";
        echo "<td>" . $row["yom"] . "</td>";
        echo "</tr>\n";
      }

      echo "</table>\n";
    } else {
      echo "<p>There are no cars to display.</p>";
    }

    // Step 5: Close the connection
    mysqli_close($dbconn);
  } else {
    echo "<p>Unable to connect to the db.</p>";
  }
?>
</body>
</html>