<?php include 'grade.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Major Result Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="fonttext">
                <h1>Welcome Science Major</h1>
                <h4>Please Enter Your Score</h4>
            </div>

            <form method="POST" action="">
                <div class="Input_group">
                    <input type="number" id="scoreKhmer" name="kh" required placeholder=" " min="0" max="75">
                    <label for="scoreKhmer">Khmer (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreMath" name="ma" required placeholder=" " min="0" max="125">
                    <label for="scoreMath">Math (0-125)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreBiology" name="bi" required placeholder=" " min="0" max="75">
                    <label for="scoreBiology">Biology (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreHistory" name="hi" required placeholder=" " min="0" max="50">
                    <label for="scoreHistory">History (0-50)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreChemistry" name="ch" required placeholder=" " min="0" max="75">
                    <label for="scoreChemistry">Chemistry (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scorePhysic" name="ph" required placeholder=" " min="0" max="75">
                    <label for="scorePhysic">Physics (0-75)</label>
                </div>
                <div class="Input_group">
                    <input type="number" id="scoreEnglish" name="en" required placeholder=" " min="0" max="50">
                    <label for="scoreEnglish">English (0-50)</label>
                </div>
                
                <div class="hero_btns">
                    <button type="submit" class="btn">Calculate Grade</button>
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
                    $kh = $_POST['kh'] ?? 0;
                    $ma = $_POST['ma'] ?? 0;
                    $bi = $_POST['bi'] ?? 0;
                    $hi = $_POST['hi'] ?? 0;
                    $ph = $_POST['ph'] ?? 0;
                    $ch = $_POST['ch'] ?? 0;
                    $en = $_POST['en'] ?? 0;

                    $kh_g = Grade(($kh * 100) / 75);
                    $ma_g = Grade(($ma * 100) / 125);
                    $bi_g = Grade(($bi * 100) / 75);
                    $hi_g = Grade(($hi * 100) / 50);
                    $ph_g = Grade(($ph * 100) / 75);
                    $ch_g = Grade(($ch * 100) / 75);
                    $en_g = Grade(($en * 100) / 50); 

                    $en1 = 0; 
                    if ($en > 25) {
                        $en1 = $en - 25;
                    }

                    $total = round((($kh + $ma + $bi + $hi + $ph + $ch + $en1) * 100) / 475, 2);
                    $total_g = Grade($total);

                    echo "<div class='result-section'>";
                    echo "<h3 class='result-title'>BACII Result</h3>";
                    echo "<table class='result-table'>";
                    echo "<thead>";
                    echo "<tr><th>Subject</th><th>Score</th><th>Grade</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    echo "<tr><td>Khmer</td><td>{$kh} /75</td><td><strong>{$kh_g}</strong></td></tr>";
                    echo "<tr><td>Math</td><td>{$ma} /125</td><td><strong>{$ma_g}</strong></td></tr>";
                    echo "<tr><td>Biology</td><td>{$bi} /75</td><td><strong>{$bi_g}</strong></td></tr>";
                    echo "<tr><td>History</td><td>{$hi} /50</td><td><strong>{$hi_g}</strong></td></tr>";
                    echo "<tr><td>Physics</td><td>{$ph} /75</td><td><strong>{$ph_g}</strong></td></tr>";
                    echo "<tr><td>Chemistry</td><td>{$ch} /75</td><td><strong>{$ch_g}</strong></td></tr>";
                    echo "<tr><td>English</td><td>{$en} /50</td><td><strong>{$en_g}</strong></td></tr>";
                    echo "<tr class='total-row'><td>Total Average</td><td>{$total}%</td><td><strong>{$total_g}</strong></td></tr>";
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                }
                ?>
            </div>
</body>
</html>