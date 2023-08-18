<?php 

    namespace LinkMap;
    use GuzzleHttp\Client;
    use Symfony\Component\DomCrawler\Crawler;

    class Links
    {
        public function Buscar(string $url) : array
        {
            $client   = new Client(['verify'  => false]);
            $resposta = $client->request('GET', $url);
            $html     = $resposta->getBody();
            $crawler  = new Crawler();                
            $crawler->addHtmlContent($html);        
            $elementosLinks = $crawler->filter('a[href]');
            $elementos = [];
            foreach($elementosLinks as $elemento)
            {
                if( !empty($elemento) ){
                    $elementos[] = trim($elemento->textContent);
                }
            }
            return $elementos;
        }
    }