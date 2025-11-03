<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangram</title>
    <link rel="stylesheet" href="styles.css">
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
    <label class="switch" onclick="toggleDarkMode()"><h6>Motyw</h6>
        <span class="slider round"></span>
    </label>
        <h1>Wybierz kategorię tangramu</h1>
        <ul class="menu-list">
            <li>
                <a href="menu_zwierzeta.php" class="menu-button">
                    <img src="assets/kot.jpg" alt="Zwierzęta">
                    <span>Zwierzęta</span>
                </a>
            </li>
            <li>
                <a href="menu_ludzie.php" class="menu-button">
                    <img src="assets/jezdziec.jpg" alt="Ludzie">
                    <span>Ludzie</span>
                </a>
            </li>
            <li>
                <a href="menu_rzeczy.php" class="menu-button">
                    <img src="assets/statek.jpg" alt="Rzeczy">
                    <span>Przedmioty</span>
                </a>
            </li>
        </ul>
    </div>
</body>

</html>

