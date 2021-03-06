<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\{
    Request
};
use Symfony\Component\Routing\{
    RequestContext,
    Matcher\UrlMatcher
};
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

$request = Request::createFromGlobals();
$routes  = include __DIR__ . '/../src/routes.php';

$context   = new RequestContext();
$matcher   = new UrlMatcher($routes, $context);
$resolver  = new ControllerResolver();
$framework = new Phramework\Framework($matcher, $resolver);
$response  = $framework->handle($request);

$response->send();