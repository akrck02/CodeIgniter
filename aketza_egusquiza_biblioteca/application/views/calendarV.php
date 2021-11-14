<br>
<?php

$dateObj = new DateTime();
$maxDay = $dateObj->format('t');

$params = [];
for ($day = 1; $day <= $maxDay; $day++) {
    $params[$day] = site_url() . "/calendar/" . $dateObj->format('Y') . "-" . $dateObj->format('m') . "-$day";
}

echo $this->calendar->generate($dateObj->format('Y'), $dateObj->format('m'), $params);

if (isset($date) and is_array($books) and count($books) > 0) {
    $lendDate = new DateTime($date);
    echo "<h3>Libros prestados el " . $lendDate->format('d-M-Y') . "</h3>";

    foreach ($books as $book) {
        echo "<li>$book</li>";
    }
}

?>