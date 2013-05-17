<?php
namespace Simplex\tests\unit;

require_once __DIR__.'/../../../vendor/autoload.php';

use atoum;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class Framework extends atoum
{
  public function testNotFoundHandling() {
    $framework = $this->getFrameworkForException(new ResourceNotFoundException());
    $response = $framework->handle(new Request());

    $this
      ->integer($response->getStatusCode())
      ->isEqualTo(404);
  }

  public function testErrorHandling() {
    $framework = $this->getFrameworkForException(new \RuntimeException());
    $response = $framework->handle(new Request());

    $this
      ->integer($response->getStatusCode())
      ->isEqualTo(500);
  }

  protected function getFrameworkForException($exception) {
    $matcher = new \mock\Symfony\Component\Routing\Matcher\UrlMatcherInterface();
    $dispatcher = new \mock\Symfony\Component\EventDispatcher\EventDispatcher();
    $this->calling($matcher)->match->throw = $exception;

    $resolver = new \mock\Symfony\Component\HttpKernel\Controller\ControllerResolverInterface();

    return new \Simplex\Framework($dispatcher, $matcher, $resolver);
  }

  public function testControllerResponse() {
    $matcher = new \mock\Symfony\Component\Routing\Matcher\UrlMatcherInterface();
    $dispatcher = new \mock\Symfony\Component\EventDispatcher\EventDispatcher();

    $this->calling($matcher)->match = function() {
      return array('_route' => 'foo',
                   'name' => 'Fabien',
                   '_controller' => function ($name) {
                     return new Response('Hello '.$name);
                   }
                   );
    };

    $resolver = new ControllerResolver();
    $framework = new \Simplex\Framework($dispatcher, $matcher, $resolver);

    $response = $framework->handle(new Request());

    $this
      ->integer($response->getStatusCode())
      ->isEqualTo(200);

    $this
      ->string($response->getContent())
      ->contains('Hello Fabien');
  }
}
