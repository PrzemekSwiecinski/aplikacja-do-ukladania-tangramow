<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tangramy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$sql = "SELECT id_wzoru, nazwa, zdjecie FROM wzory WHERE kategoria = 'rzeczy'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangramy</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function toggleDarkMode() {
            let body = document.body;
            body.classList.toggle('dark-mode');

            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('darkModeEnabled', 'true');
            } else {
                localStorage.removeItem('darkModeEnabled');
            }
        }

        function setDarkModeFromLocalStorage() {
            let darkModeEnabled = localStorage.getItem('darkModeEnabled');
            if (darkModeEnabled === 'true') {
                document.body.classList.add('dark-mode');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            setDarkModeFromLocalStorage();
        });
    </script>
</head>

<body>
    <div class="menu-container">
    <a href="menu_kategorie.php" class="back-button"><i class="fas fa-arrow-left"></i> Cofnij</a>
    <label class="switch" onclick="toggleDarkMode()"><h6>Motyw</h6>
        <span class="slider round"></span>
    </label>
        <h1>Wybierz tangram</h1>
        <ul class="menu-list">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><a href='tangram.php?id=" . $row["id_wzoru"] . "' class='menu-button'>
                            <img src='assets/" . $row["zdjecie"] . "' alt='" . htmlspecialchars($row["nazwa"], ENT_QUOTES | ENT_HTML5, 'UTF-8') . "'>
                            <span>" . htmlspecialchars($row["nazwa"], ENT_QUOTES | ENT_HTML5, 'UTF-8') . "</span>
                          </a></li>";
                }
            } else {
                echo "<li>Brak tangramów dla danej kategorii</li>";
            }
            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>