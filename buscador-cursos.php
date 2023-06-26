#!/usr/bin/env php

<?php

require 'vendor/autoload.php';
use GuzzleHttp\Client;
use learn_composer\Buscador\BuscadorDeCoisas;
use Symfony\Component\DomCrawler\Crawler;
println("lkasjdfj");
Teste::teste();
exit();

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);



$crawler = new Crawler();

$buscador = new BuscadorDeCoisas($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');


foreach ($cursos as $curso) {
	echo $curso. PHP_EOL;
}


