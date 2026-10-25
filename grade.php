<?php
function Grade($percentage) {
    if ($percentage >= 90) {
        return 'A';
    } elseif ($percentage >= 80) {
        return 'B';
    } elseif ($percentage >= 70) {
        return 'C';
    } elseif ($percentage >= 60) {
        return 'D';
    } elseif ($percentage >= 50) {
        return 'E';
    } else {
        return 'F';
    }
}
?>