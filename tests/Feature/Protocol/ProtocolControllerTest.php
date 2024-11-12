<?php

namespace Tests\Feature\Protocol;

use App\Http\Controllers\ProtocolController;
use App\Http\Requests\Protocol\ProtocolCreateRequest;
use App\Models\Protocolo\Responses\ProtocolRequestResponse;
use App\Models\Token;
use Tests\TestCase;
use Mockery;
use App\Services\Interfaces\IProtocolService;
use App\Services\Interfaces\ITokenService;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;

class ProtocolControllerTest extends TestCase
{
    use WithFaker;

    protected MockInterface&ITokenService $tokenServiceMock;
    protected MockInterface&IProtocolService $protocolServiceMock;
    protected ProtocolController $controller;

    protected function setUp(): void
    {
        parent::setUp();

        // Configurando os mocks para as dependências
        $this->tokenServiceMock = Mockery::mock(ITokenService::class);
        $this->protocolServiceMock = Mockery::mock(IProtocolService::class);

        // Substituindo as implementações reais pelos mocks
        $this->app->instance(ITokenService::class, $this->tokenServiceMock);
        $this->app->instance(IProtocolService::class, $this->protocolServiceMock);

        // Criando uma instância do controller com as dependências injetadas
        $this->controller = $this->app->make(ProtocolController::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
