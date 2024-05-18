<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css">
    <style>
        .book-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        .book-cover {
            width: 120px;
            height: auto;
            margin-right: 20px;
            border-radius: 5px;
        }

        .book-details {
            flex: 1;
        }

        .book-title {
            font-weight: bold;
        }

        .no-results {
            text-align: center;
            margin-top: 20px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<?php
session_start();

// Check if the username is set in the session
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    // If the username is not set, redirect the user back to the login page
    header("Location: loginADMIN.php");
    exit();
}
?>

<body class="text-start" style="font-size: 30px; border-bottom-color: rgb(0,0,0);">
    <a class="btn btn-primary btn-customized open-menu" role="button"><i class="fa fa-navicon"></i>&nbsp;Menu</a>
    <header></header>
    <nav class="navbar navbar-light navbar-expand-md bg-danger">
        <div class="container-fluid">
            <img src="assets/img/Batangas_State_Logo.png" width="95" height="70">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#" style="line-height: 27px;">BatState-U<br>Library</a></li>
                <li class="nav-item"><a class="nav-link" href="#"></a></li>
                <li class="nav-item"><a class="nav-link" href="#"></a></li>
            </ul>
            <div class="collapse navbar-collapse" id="navcol-1"></div>
        </div>
</nav>
    <div class="sidebar">
    <div class="dismiss"><i class="fa fa-caret-left"></i></div>
    <div class="BatState-U"><a class="navbar-brand" href="loginADMIN.php" >MENU</a></div>
    <nav class="navbar navbar-dark navbar-expand" >
    <div class="container-fluid">
            <ul class="navbar-nav flex-column me-auto" >
            <li class="nav-items"><a class="nav-link" href="#hit"><?php echo $username; ?></a></li>
            <li class="nav-item"><a class="nav-link" href="main.php">Search Book</a></li>
                    <li class="nav-item"><a class="nav-link" href="logs.php">Logs</a></li>
                    <li class="nav-item"><a class="nav-link" href="mainaddbook.php">Add Books</a>
                    <li class="nav-item"><a class="nav-link" href="addstaff.php">Add Staff</a></li>
                    <li class="nav-item"><a class="nav-link" href="adduser.php">Add User</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Logout</a>
        </ul>
        </div>
    </nav>
</div>



<div class="overlay"></div>
</div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>

    <div class="container">
        <main>
        <form method="POST" action="">
        <div class="search">
  <body>
    <div class="container mt-4">

        <h1>Book Finder</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group mb-3">
                <input type="hidden" name="api_key" value="AIzaSyDAfCFdtzkJy7wxCLZzmiZ1T_pViOqxTEM">
                <input type="text" class="form-control" name="input" placeholder="Enter search keywords">
                <button class="btn btn-primary" type="submit" name="submit">Search</button>
            </div>
            <select class="form-select mb-3" name="filter">
            <option value="" selected>Any Type</option>
            <option value="books">Books</option>
            <option value="magazines">Magazines</option>
            
</select>
        </form>
<div class="results">
  <table class="table">
            <?php
            $host = 'localhost';
            $database = 'db_nt3102';
            $username = 'root';
            $password = "";

            $connection = new mysqli($host, $username, $password, $database);
            if (isset($_POST['submit']) && isset($_POST['input'])) {
              $search = urlencode($_POST['input']);
              $filter = isset($_POST['filter']) ? $_POST['filter'] : "";

                $apiKey = 'AIzaSyDAfCFdtzkJy7wxCLZzmiZ1T_pViOqxTEM';
                $url = "https://www.googleapis.com/books/v1/volumes?q={$search}&maxResults=40&key={$apiKey}"; 

                if (!empty($filter)) {
                  if ($filter === 'books') {
                      $url .= "&printType=books";
                  } elseif ($filter === 'magazines') {
                      $url .= "&printType=magazines";
                  } 
              }

                try {


      $ch = curl_init();
      if ($ch === false) {
          throw new Exception('Failed to initialize cURL session');
      }

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Skip SSL verification for simplicity

      $response = curl_exec($ch);

      if (curl_errno($ch)) {
          throw new Exception(curl_error($ch), curl_errno($ch));
      }

      $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      if ($httpStatusCode !== 200) {
          throw new Exception("Unexpected HTTP code: {$httpStatusCode}");
      }

      curl_close($ch);

      $responseData = json_decode($response, true);
      if (json_last_error() !== JSON_ERROR_NONE) {
          throw new Exception('Failed to decode JSON response: ' . json_last_error_msg());
      }
      if (isset($responseData['items']) && count($responseData['items']) > 0) {
                        $startIndex = isset($_GET['startIndex']) ? (int)$_GET['startIndex'] : 0;
                        $endIndex = min($startIndex + 10, count($responseData['items'])); // Show 10 items per page

                        echo "<div class='search-results'>";
                        for ($i = $startIndex; $i < $endIndex; $i++) {
                            $item = $responseData['items'][$i];
                            $bookTitle = $item['volumeInfo']['title'];
                            $authors = isset($item['volumeInfo']['authors']) ? implode(', ', $item['volumeInfo']['authors']) : 'Unknown Author';
                            $isbn = isset($item['volumeInfo']['industryIdentifiers']) ? $item['volumeInfo']['industryIdentifiers'][0]['identifier'] : 'No ISBN';
                            $bookCover = isset($item['volumeInfo']['imageLinks']['thumbnail']) ? $item['volumeInfo']['imageLinks']['thumbnail'] : 'placeholder-image.jpg';

                            echo "<div class='book-container'>";
                            echo "<img class='book-cover' src='{$bookCover}' alt='Cover of {$bookTitle}'>";
                            echo "<div class='book-details'>";
                            echo "<h3 class='book-title'>{$bookTitle}</h3>";
                            echo "<p class='author'>by {$authors}</p>";
                            echo "<p class='isbn'>ISBN: {$isbn}</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";

                      } else {
                        echo "<p class='no-results'>No Type of books found matching your search.</p>";
                    }
                  } catch (Exception $e) {
                    $errorResponse = curl_error($ch); // Capture the error response
                    echo  'Error: ' . $e->getMessage() . ' (Details: ' . $errorResponse . ')';
                    
                }
            }
            $connection->close();
            ?>