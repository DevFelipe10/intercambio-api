<?php

namespace Tests\Feature\File;

use App\Http\Resources\ErrorResource;
use Illuminate\Http\Response;

class PostFileTest extends FileControllerTest
{
    public function testAttachFile_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = FileRequestsMocks::attachRequest();

        $protocolRequestResponse = FileResponsesMocks::attachFileResponse();

        $this->fileServiceMock
            ->shouldReceive('attachFile')
            ->once()
            ->andReturn($protocolRequestResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->attachFile($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAttachFile_BadRequestResult(): void
    {
        $request = FileRequestsMocks::attachRequest();

        $this->fileServiceMock
            ->shouldReceive('attachFile')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->attachFile($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testAttachControl_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = FileRequestsMocks::attachControlRequest();

        $file = FileResponsesMocks::attachControlResponse();

        $this->fileServiceMock
            ->shouldReceive('attachControl')
            ->once()
            ->andReturn($file);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->attachControl($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAttachControl_BadResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = FileRequestsMocks::attachControlRequest();

        $this->fileServiceMock
            ->shouldReceive('attachControl')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->attachControl($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testDownloadFile_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = FileRequestsMocks::downloadRequest();

        $file = FileResponsesMocks::downloadResponse();

        $this->fileServiceMock
            ->shouldReceive('downloadFiles')
            ->once()
            ->andReturn($file);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->downloadFiles($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDownloadFile_BadResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = FileRequestsMocks::downloadRequest();

        $this->fileServiceMock
            ->shouldReceive('downloadFiles')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->downloadFiles($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testNewAttachSearch_OkResult(): void
    {
        $request = FileRequestsMocks::newAttachSearchRequest();

        $file = FileResponsesMocks::newAttachSearchResponse();

        $this->fileServiceMock
            ->shouldReceive('newAttachSearch')
            ->once()
            ->andReturn($file);

        $response = $this->controller->newAttachSearch($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testNewAttachSearch_BadResult(): void
    {
        $request = FileRequestsMocks::newAttachSearchRequest();

        $this->fileServiceMock
            ->shouldReceive('newAttachSearch')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->newAttachSearch($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }
}
