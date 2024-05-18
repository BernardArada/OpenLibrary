<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Search Books</h2>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter search query" name="query">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <?php
        if (isset($_GET['query'])) {
            $query = urlencode($_GET['query']);
            $url = "https://openlibrary.org/search.json?q=$query";
        
            $response = file_get_contents($url);
            $books = json_decode($response, true);
        
            if (isset($books['docs']) && count($books['docs']) > 0) {
                echo "<h3>Search Results</h3>";
                echo "<div class='row'>";
                foreach ($books['docs'] as $book) {
                    echo "<div class='col-md-4 mb-3'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . htmlspecialchars($book['title']) . "</h5>";
                    echo "<p class='card-text'>Author: " . htmlspecialchars(implode(', ', $book['author_name'] ?? [])) . "</p>";
                    echo "<p class='card-text'>First Published Year: " . htmlspecialchars($book['first_publish_year'] ?? 'N/A') . "</p>";
                    echo "</div></div></div>";
                }
                echo "</div>";
            } else {
                echo "<p>No results found for '" . htmlspecialchars($_GET['query']) . "'</p>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>