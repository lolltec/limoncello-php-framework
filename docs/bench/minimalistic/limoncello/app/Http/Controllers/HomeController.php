<?php namespace App\Http\Controllers;

use Limoncello\Contracts\Routing\RouteInterface;
use Limoncello\Flute\Contracts\Http\Controller\ControllerIndexInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\TextResponse;

/**
 * @package App
 */
class HomeController
{
    /** @var callable */
    const INDEX_HANDLER = [self::class, ControllerIndexInterface::METHOD_INDEX];

    /** @var array */
    const PARAMETERS = [RouteInterface::PARAM_REQUEST_FACTORY => null];

    /**
     * @return ResponseInterface
     */
    public static function index(): ResponseInterface
    {
        return new TextResponse('I\'ve got some Limoncello.');
    }
}
