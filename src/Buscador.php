<?php

namespace Inove;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{

  private $httpClient;
  private $crawler;

  public function __construct(ClientInterface $httpClient, Crawler $crawler)
  {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function buscar(string $url, string $chave): array
  {
    $resposta = $this->httpClient->request('GET', $url);
    $html = $resposta->getBody();
    $this->crawler->addHtmlContent($html);
    $elementos = $this->crawler->filter($chave);
    $cursos = [];
    foreach ($elementos as $curso) {
      $cursos[] = $curso->textContent;
    }
    return $cursos;
  }
}
