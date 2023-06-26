<?php

namespace Alura\BuscadorDeCursos\Tests;

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\DomCrawler\Crawler;

class TestBuscadorDeCursos extends TestCase
{
    private ;
    private  = 'url-teste';

    protected function setUp(): void
    {
         = <<<FIM
        <html>
            <body>
                <span class=card-curso__nome>Curso Teste 1</span>
                <span class=card-curso__nome>Curso Teste 2</span>
                <span class=card-curso__nome>Curso Teste 3</span>
            </body>
        </html>
        FIM;


         = ->createMock(StreamInterface::class);
        
            ->expects(->once())
            ->method('__toString')
            ->willReturn();

         = ->createMock(ResponseInterface::class);
        
            ->expects(->once())
            ->method('getBody')
            ->willReturn();

         = 
            ->createMock(ClientInterface::class);
        
            ->expects(->once())
            ->method('request')
            ->with('GET', ->url)
            ->willReturn();

        ->httpClientMock = ;
    }

    public function testBuscadorDeveRetornarCursos()
    {
         = new Crawler();
         = new Buscador(->httpClientMock, );
         = ->buscar(->url);

        ->assertCount(3, );
        ->assertEquals('Curso Teste 1', );
        ->assertEquals('Curso Teste 2', );
        ->assertEquals('Curso Teste 3', );
    }
}
