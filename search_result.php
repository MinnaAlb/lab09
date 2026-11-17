<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Lab 09 - car search results">
  <meta name="keywords" content="PHP, MySQL, search">
  <meta name="author" content="Minna">
  <title>Search Results - Lab 09</title>
  <style>
    /* Borders and spacing for the results table */
    table { border-collapse: collapse; }
    th, td { border: 1px solid #333333; padding: 5px; }
  </style>
</head>
<body>
  <h1>Search Results</h1>
<?php
  // Load the database connection details
  require_once "settings.php";
  $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

  if (!$conn) {
    echo "<p>Unable to connect to the db.</p>";
  } else {
    if (isset($_GET['model'])) {
      // Escape the user's input so it can't break the SQL query
      $model = mysqli_real_escape_string($conn, $_GET['model']);

      // Find any car whose model contains the search text
      $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['car_id'] . "</td>";
          echo "<td>" . $row['make'] . "</td>";
          echo "<td>" . $row['model'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['yom'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "<p>🚫 No matching cars found.</p>";
      }
    } else {
      echo "<p>Please enter a model to search.</p>";
    }
    mysqli_close($conn);
  }
?>
  <p><a href="search_form.php">Search again</a></p>
</body>
</html>