<?php

namespace Tests\Feature\Chat;

use App\Http\Controllers\ChatController;
use App\Services\Interfaces\IChatService;
use Tests\TestCase;
use Mockery;
use App\Services\Interfaces\ITokenService;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;

class ChatControllerTest extends TestCase
{
    use WithFaker;

    protected MockInterface&ITokenService $tokenServiceMock;
    protected MockInterface&IChatService $chatServiceMock;
    protected ChatController $controller;

    protected function setUp(): void
    {
        parent::setUp();

        // Configurando os mocks para as dependências
        $this->tokenServiceMock = Mockery::mock(ITokenService::class);
        $this->chatServiceMock = Mockery::mock(IChatService::class);

        // Substituindo as implementações reais pelos mocks
        $this->app->instance(ITokenService::class, $this->tokenServiceMock);
        $this->app->instance(IChatService::class, $this->chatServiceMock);

        // Criando uma instância do controller com as dependências injetadas
        $this->controller = $this->app->make(ChatController::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
