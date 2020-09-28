<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace Test;

use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Test\Request\AddPetRequest;
use Test\Request\CountPetsRequest;
use Test\Request\DeletePetRequest;
use Test\Request\FindPetByIdRequest;
use Test\Request\FindPetsRequest;
use Test\Request\Mapper\RequestMapperInterface;
use Test\Request\RequestInterface;
use Test\Response\ResponseHandler;
use Test\Schema\Mapper\PetCollectionMapper;
use Test\Schema\Mapper\PetMapper;
use Test\Schema\Pet;
use Test\Schema\PetCollection;

class SwaggerPetstoreClient
{
    /** @var ClientInterface */
    private $client;

    /** @var ContainerInterface */
    private $container;

    /**
     * @param ClientInterface    $client
     * @param ContainerInterface $container
     */
    public function __construct(ClientInterface $client, ContainerInterface $container)
    {
        $this->client    = $client;
        $this->container = $container;
    }

    /**
     * @param FindPetsRequest $request
     *
     * @return PetCollection
     */
    public function findPets(FindPetsRequest $request): PetCollection
    {
        return $this->container->get(PetCollectionMapper::class)->toSchema($this->container->get(ResponseHandler::class)->handle($this->sendRequest($request)));
    }

    /**
     * @param AddPetRequest $request
     *
     * @return Pet
     */
    public function addPet(AddPetRequest $request): Pet
    {
        return $this->container->get(PetMapper::class)->toSchema($this->container->get(ResponseHandler::class)->handle($this->sendRequest($request)));
    }

    /**
     * @param CountPetsRequest $request
     */
    public function countPets(CountPetsRequest $request): void
    {
        $this->container->get(ResponseHandler::class)->handle($this->sendRequest($request));
    }

    /**
     * @param FindPetByIdRequest $request
     *
     * @return Pet
     */
    public function findPetById(FindPetByIdRequest $request): Pet
    {
        return $this->container->get(PetMapper::class)->toSchema($this->container->get(ResponseHandler::class)->handle($this->sendRequest($request)));
    }

    /**
     * @param DeletePetRequest $request
     */
    public function deletePet(DeletePetRequest $request): void
    {
        $this->container->get(ResponseHandler::class)->handle($this->sendRequest($request));
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->client->sendRequest($this->container->get(RequestMapperInterface::class)->map($request));
    }
}
