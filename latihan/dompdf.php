<?php

require_once './../vendor/autoload.php';


$faker = Faker\Factory ::create();

use Dompdf\Dompdf;

$html="
    <table>
    <thead>
    <th>NO</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>ADDRESS</th>
    </thead>
        <tbody>   
";
for ($i = 1; $i < 99; $i++){

    $html .="<tr>";
    $html .="<td>" . $i."</td>";
    $html .="<td>" . $faker->name()."</td>";
    $html .="<td>" . $faker->email()."</td>";
    $html .="<td>" . $faker->address()."</td>";
    $html .="</tr>";
}

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$html = "INI COMPOSTER <h1> GG </h1>";
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream();

?>