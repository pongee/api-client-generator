<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace Test\Request\Mapper;

use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use Test\Request\RequestInterface;
use Test\Serializer\BodySerializer;

class GuzzleRequestMapper implements RequestMapperInterface
{
    /** @var BodySerializer */
    private $bodySerializer;

    /**
     * @param BodySerializer $bodySerializer
     */
    public function __construct(BodySerializer $bodySerializer)
    {
        $this->bodySerializer = $bodySerializer;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ServerRequestInterface
     */
    public function map(RequestInterface $request): ServerRequestInterface
    {
        $body        = $this->bodySerializer->serializeRequest($request);
        $psr7Request = new ServerRequest($request->getMethod(), $request->getRoute(), $request->getHeaders(), $body, '1.1', []);
        $psr7Request->withQueryParams($request->getQueryParameters());
        $psr7Request->withCookieParams($request->getCookies());

        return $psr7Request;
    }
}
