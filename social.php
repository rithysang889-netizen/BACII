<?php include 'grade.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Science Major</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Welcome Social Science Major</h1>
            <h4>Please, Enter Your Score</h4>

            <form method="POST" action="">
                <div class="Input_group">
                    <input type="number" id="scoreKhmer" name="kh" required placeholder=" " min="0" max="125">
                    <label for="scoreKhmer">Khmer (0-125)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreHistory" name="hi" required placeholder=" " min="0" max="75">
                    <label for="scoreHistory">History (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreGeography" name="geo" required placeholder=" " min="0" max="75">
                    <label for="scoreGeography">Geography (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreMoral" name="mo" required placeholder=" " min="0" max="75">
                    <label for="scoreMoral">Moral-Civics (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreEnviromental" name="ea" required placeholder=" " min="0" max="50">
                    <label for="scoreEnviromental">Enviromental Science (0-50)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreMath" name="ma" required placeholder=" " min="0" max="75">
                    <label for="scoreMath">Math (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreEnglish" name="en" required placeholder=" " min="0" max="50">
                    <label for="scoreEnglish">English (0-50)</label>
                </div>
                
                <div class="hero_btns">
                    <button type="submit" class="btn">Grade</button>
                </div>
                <div class="hero_btns">
                    <a href="index.php" class="btn">BACK</a>
                </div>
            </form>
        </div>
    </div>
            <div id="searchresult">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $kh  = $_POST['kh']  ?? 0;
                    $hi  = $_POST['hi']  ?? 0;
                    $geo = $_POST['geo'] ?? 0;
                    $mo  = $_POST['mo']  ?? 0;
                    $ea  = $_POST['ea']  ?? 0;
                    $ma  = $_POST['ma']  ?? 0;
                    $en  = $_POST['en']  ?? 0;

                    $kh_g  = Grade(($kh * 100) / 125);
                    $hi_g  = Grade(($hi * 100) / 75);
                    $geo_g = Grade(($geo * 100) / 75);
                    $mo_g  = Grade(($mo * 100) / 75);
                    $ea_g  = Grade(($ea * 100) / 50);
                    $ma_g  = Grade(($ma * 100) / 75);
                    $en_g  = Grade(($en * 100) / 50); 

                    $en1 = 0; 
                    if ($en > 25) {
                        $en1 = $en - 25;
                    }

                    $total = round((($kh + $hi + $geo + $mo + $ea + $ma + $en1) * 100) / 475, 2);
                    $total_g = Grade($total);

                    echo "<div class='result-section'>";
                    echo "<h3 class='result-title'>BACII Result</h3>";
                    echo "<table class='result-table'>";
                    echo "<thead>";
                    echo "<tr><th>Subject</th><th>Score</th><th>Grade</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    echo "<tr><td>Khmer</td><td>{$kh} / 125</td><td><strong>{$kh_g}</strong></td></tr>";
                    echo "<tr><td>History</td><td>{$hi} / 75</td><td><strong>{$hi_g}</strong></td></tr>";
                    echo "<tr><td>Geography</td><td>{$geo} / 75</td><td><strong>{$geo_g}</strong></td></tr>";
                    echo "<tr><td>Moral-Civics</td><td>{$mo} / 75</td><td><strong>{$mo_g}</strong></td></tr>";
                    echo "<tr><td>Enviromental Science</td><td>{$ea} / 75</td><td><strong>{$ea_g}</strong></td></tr>";
                    echo "<tr><td>Math</td><td>{$ma} / 75</td><td><strong>{$ma_g}</strong></td></tr>";
                    echo "<tr><td>English</td><td>{$en} / 50</td><td><strong>{$en_g}</strong></td></tr>";
                    echo "<tr class='total-row'><td>Total Average</td><td>{$total}%</td><td><strong>{$total_g}</strong></td></tr>";
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                }
                ?>
            </div>
</body>
</html>