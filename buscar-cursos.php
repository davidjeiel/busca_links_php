<?php
    use LinkMap\Links;

    require 'vendor/autoload.php';

    $site     = readline('Informe o site desejado:');
    $uri      = (string)$site;
    $links    = new Links();
    $listaLinks = $links->Buscar($uri);

    foreach ($listaLinks as $link) {
        echo $link . PHP_EOL;
    }