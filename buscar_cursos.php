<?php

require 'vendor\autoload.php';
//require 'src\Buscador.php';

use Inove\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/', 'verify' => false]);
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('cursos-online-programacao/php', 'span.card-curso__nome');

echo "<h1>CURSOS DA ALURA DE PHP</h1>";
foreach ($cursos as $curso) {
  echo "<p>{$curso}</p>";
}
