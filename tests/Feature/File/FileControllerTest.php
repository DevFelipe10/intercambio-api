<?php

namespace Tests\Feature\File;

use App\Http\Controllers\FileController;
use App\Services\Interfaces\IFileService;
use Tests\TestCase;
use Mockery;
use App\Services\Interfaces\ITokenService;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;

class FileControllerTest extends TestCase
{
    use WithFaker;

    protected MockInterface&ITokenService $tokenServiceMock;
    protected MockInterface&IFileService $fileServiceMock;
    protected FileController $controller;

    protected function setUp(): void
    {
        parent::setUp();

        // Configurando os mocks para as dependências
        $this->tokenServiceMock = Mockery::mock(ITokenService::class);
        $this->fileServiceMock = Mockery::mock(IFileService::class);

        // Substituindo as implementações reais pelos mocks
        $this->app->instance(ITokenService::class, $this->tokenServiceMock);
        $this->app->instance(IFileService::class, $this->fileServiceMock);

        // Criando uma instância do controller com as dependências injetadas
        $this->controller = $this->app->make(FileController::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
