<?php

namespace Tests\Feature\Protocol;

use App\Http\Resources\ErrorResource;
use App\Models\Token;
use Illuminate\Http\Response;

class PostProtocolTest extends ProtocolControllerTest
{
    public function testCreateProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::createRequest();

        $protocolRequestResponse = ProtocolResponsesMocks::createResponse();

        $this->protocolServiceMock
            ->shouldReceive('createProtocol')
            ->andReturn($protocolRequestResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->create($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateProtocol_BadRequestResult(): void
    {
        //ARRANGE
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::createRequest();

        $this->protocolServiceMock
            ->shouldReceive('createProtocol')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        //ACT
        // Chamando o método do controller que queremos testar
        $response = $this->controller->create($request);

        //ASSERT
        // Verificando se o resultado está correto
        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testCancelProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::cancelRequest();

        $protocolCancelResponse = ProtocolResponsesMocks::cancelResponse();

        $this->protocolServiceMock
            ->shouldReceive('cancelService')
            ->andReturn($protocolCancelResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->cancel($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCancelProtocol_BadRequestResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::cancelRequest();

        $this->protocolServiceMock
            ->shouldReceive('cancelService')
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->cancel($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testAnswerProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::answerRequest();

        $protocolAnswerResponse = ProtocolResponsesMocks::answerComplementResponse();

        $this->protocolServiceMock
            ->shouldReceive('answerService')
            ->andReturn($protocolAnswerResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->answer($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAnswerProtocol_BadRequestResult(): void
    {
        $request = ProtocolRequestsMocks::answerRequest();

        $this->protocolServiceMock
            ->shouldReceive('answerService')
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->answer($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testComplementProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::complementProtocolRequest();

        $protocolComplementResponse = ProtocolResponsesMocks::answerComplementResponse();

        $this->protocolServiceMock
            ->shouldReceive('complementProtocol')
            ->andReturn($protocolComplementResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->complement($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testComplementProtocol_BadRequestResult(): void
    {
        $request = ProtocolRequestsMocks::complementProtocolRequest();

        $this->protocolServiceMock
            ->shouldReceive('complementProtocol')
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->complement($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testHistoryProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::historyRequest();

        $protocolResponse = ProtocolResponsesMocks::historyResponse();

        $this->protocolServiceMock
            ->shouldReceive('getProtocolHistory')
            ->andReturn($protocolResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->history($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testHistoryProtocol_BadRequestResult(): void
    {
        $request = ProtocolRequestsMocks::historyRequest();

        $this->protocolServiceMock
            ->shouldReceive('getProtocolHistory')
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->history($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testStatusProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::statusRequest();

        $protocolResponse = ProtocolResponsesMocks::statusResponse();

        $this->protocolServiceMock
            ->shouldReceive('getProtocolStatus')
            ->andReturn($protocolResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->status($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStatusProtocol_BadRequestResult(): void
    {
        $request = ProtocolRequestsMocks::statusRequest();

        $this->protocolServiceMock
            ->shouldReceive('getProtocolStatus')
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->status($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testSendExecutionProtocol_OkResult(): void
    {
        // Criando uma instância de StorePostRequest com dados de teste
        $request = ProtocolRequestsMocks::sendExecutionRequest();

        $protocolResponse = ProtocolResponsesMocks::sendExecutionResponse();

        $this->protocolServiceMock
            ->shouldReceive('sendExecution')
            ->andReturn($protocolResponse);

        // Chamando o método do controller que queremos testar
        $response = $this->controller->sendExecution($request);

        // Verificando se o resultado está correto
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testSendExecutionProtocol_BadRequestResult(): void
    {
        $request = ProtocolRequestsMocks::sendExecutionRequest();

        $this->protocolServiceMock
            ->shouldReceive('sendExecution')
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->sendExecution($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }
}
