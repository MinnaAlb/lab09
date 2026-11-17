<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Lab 09 - search cars by model">
  <meta name="keywords" content="PHP, MySQL, search">
  <meta name="author" content="Minna">
  <title>Search Cars - Lab 09</title>
</head>
<body>
  <h1>Search Cars</h1>
  <!-- Search form: GET is used because a search only reads data and the result URL can be bookmarked -->
  <form action="search_result.php" method="get">
    <label for="model">Car model:</label>
    <input type="text" id="model" name="model" required>
    <input type="submit" value="Search">
  </form>
</body>
</html>