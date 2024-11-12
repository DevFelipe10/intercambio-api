<?php

namespace Tests\Feature\Chat;

use App\Http\Resources\ErrorResource;
use Illuminate\Http\Response;

class PostChatTest extends ChatControllerTest
{
    public function testCreateRoom_OkResult(): void
    {
        $request = ChatRequestsMocks::createRoom();

        $chatResponse = ChatResponsesMocks::chatCreateRoomAndComplementControlResponse();

        $this->chatServiceMock
            ->shouldReceive('createRoom')
            ->once()
            ->andReturn($chatResponse);

        $response = $this->controller->create($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAttachFile_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::createRoom();

        $this->chatServiceMock
            ->shouldReceive('createRoom')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->create($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testOpenRoom_OkResult(): void
    {
        $request = ChatRequestsMocks::chatOpen();

        $chatResponse = ChatResponsesMocks::chatOpenResponse();

        $this->chatServiceMock
            ->shouldReceive('openRoom')
            ->once()
            ->andReturn($chatResponse);

        $response = $this->controller->open($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatOpen_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatOpen();

        $this->chatServiceMock
            ->shouldReceive('openRoom')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->open($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatLockUnlock_OkResult(): void
    {
        $request = ChatRequestsMocks::chatLockUnlock();

        $this->chatServiceMock
            ->shouldReceive('lockUnlock')
            ->once()
            ->andReturn(200);

        $response = $this->controller->lockUnlock($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(204, $response->getStatusCode());
    }

    public function testChatLockUnlock_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatLockUnlock();

        $this->chatServiceMock
            ->shouldReceive('lockUnlock')
            ->once()
            ->andReturn(400);

        $response = $this->controller->lockUnlock($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatUnitaryUserSearch_OkResult(): void
    {
        $request = ChatRequestsMocks::chatUserAndRoomSearchAndComplementControl();

        $response = ChatResponsesMocks::chatUnitaryUserSearchResponse();

        $this->chatServiceMock
            ->shouldReceive('unitaryUserSearch')
            ->once()
            ->andReturn($response);

        $response = $this->controller->unitaryUserSearch($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatUnitaryUserSearch_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatUserAndRoomSearchAndComplementControl();

        $this->chatServiceMock
            ->shouldReceive('unitaryUserSearch')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->unitaryUserSearch($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatLinkRecover_OkResult(): void
    {
        $request = ChatRequestsMocks::chatLinkAndPending();

        $response = ChatResponsesMocks::chatlinkRecoverResponse();

        $this->chatServiceMock
            ->shouldReceive('linkRecover')
            ->once()
            ->andReturn($response);

        $response = $this->controller->linkRecover($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatLinkRecover_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatLinkAndPending();

        $this->chatServiceMock
            ->shouldReceive('linkRecover')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->linkRecover($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatFindRoom_OkResult(): void
    {
        $request = ChatRequestsMocks::chatFindRoom();

        $response = ChatResponsesMocks::chatFindRoomResponse();

        $this->chatServiceMock
            ->shouldReceive('findRoom')
            ->once()
            ->andReturn($response);

        $response = $this->controller->findRoom($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatFindRoom_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatFindRoom();

        $this->chatServiceMock
            ->shouldReceive('findRoom')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->findRoom($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatMessageHistory_OkResult(): void
    {
        $request = ChatRequestsMocks::chatMessageHistory();

        $response = ChatResponsesMocks::chatMessageHistoryResponse();

        $this->chatServiceMock
            ->shouldReceive('messageHistory')
            ->once()
            ->andReturn($response);

        $response = $this->controller->messageHistory($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatMessageHistory_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatMessageHistory();

        $this->chatServiceMock
            ->shouldReceive('messageHistory')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->messageHistory($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatMultipleUserSearch_OkResult(): void
    {
        $request = ChatRequestsMocks::chatMultipleUserSearch();

        $response = ChatResponsesMocks::chatMultipleUserSearchResponse();

        $this->chatServiceMock
            ->shouldReceive('multipleUserSearch')
            ->once()
            ->andReturn($response);

        $response = $this->controller->multipleUserSearch($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatMultipleUserSearch_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatMultipleUserSearch();

        $this->chatServiceMock
            ->shouldReceive('multipleUserSearch')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->multipleUserSearch($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatDefinePendence_OkResult(): void
    {
        $request = ChatRequestsMocks::chatLinkAndPending();

        $response = ChatResponsesMocks::chatPendingResponse();

        $this->chatServiceMock
            ->shouldReceive('defineRoomPendence')
            ->once()
            ->andReturn($response);

        $response = $this->controller->defineRoomPendence($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatDefinePendence_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatLinkAndPending();

        $this->chatServiceMock
            ->shouldReceive('defineRoomPendence')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->defineRoomPendence($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChatSearchRoom_OkResult(): void
    {
        $request = ChatRequestsMocks::chatUserAndRoomSearchAndComplementControl();

        $response = ChatResponsesMocks::chatCreateRoomAndComplementControlResponse();

        $this->chatServiceMock
            ->shouldReceive('searchRoom')
            ->once()
            ->andReturn($response);

        $response = $this->controller->searchRoom($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChatSearchRoom_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatUserAndRoomSearchAndComplementControl();

        $this->chatServiceMock
            ->shouldReceive('searchRoom')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->searchRoom($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testUnitaryTransactionSearch_OkResult(): void
    {
        $request = ChatRequestsMocks::chatUnitaryTransactionSearch();

        $response = ChatResponsesMocks::chatUnitaryTransactionSearchResponse();

        $this->chatServiceMock
            ->shouldReceive('unitarySearchTransaction')
            ->once()
            ->andReturn($response);

        $response = $this->controller->unitarySearchTransaction($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUnitaryTransactionSearch_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatUnitaryTransactionSearch();

        $this->chatServiceMock
            ->shouldReceive('unitarySearchTransaction')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->unitarySearchTransaction($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testAddUser_OkResult(): void
    {
        $request = ChatRequestsMocks::chatAddUser();

        $response = ChatResponsesMocks::chatAddUserAndChangeStatusResponse();

        $this->chatServiceMock
            ->shouldReceive('addUser')
            ->once()
            ->andReturn($response);

        $response = $this->controller->addUser($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testAddUser_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatAddUser();

        $this->chatServiceMock
            ->shouldReceive('addUser')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->addUser($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testSendMessage_OkResult(): void
    {
        $request = ChatRequestsMocks::chatSendMessage();

        $response = ChatResponsesMocks::chatSendMessageResponse();

        $this->chatServiceMock
            ->shouldReceive('sendMessage')
            ->once()
            ->andReturn($response);

        $response = $this->controller->sendMessage($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testSendMessage_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatUserAndRoomSearchAndComplementControl();

        $this->chatServiceMock
            ->shouldReceive('complementControl')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->complementControl($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testComplementControl_OkResult(): void
    {
        $request = ChatRequestsMocks::chatUserAndRoomSearchAndComplementControl();

        $response = ChatResponsesMocks::chatCreateRoomAndComplementControlResponse();

        $this->chatServiceMock
            ->shouldReceive('complementControl')
            ->once()
            ->andReturn($response);

        $response = $this->controller->complementControl($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testComplementControl_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatSendMessage();

        $this->chatServiceMock
            ->shouldReceive('sendMessage')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->sendMessage($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testChangeStatus_OkResult(): void
    {
        $request = ChatRequestsMocks::chatChangeStatus();

        $response = ChatResponsesMocks::chatAddUserAndChangeStatusResponse();

        $this->chatServiceMock
            ->shouldReceive('changeStatus')
            ->once()
            ->andReturn($response);

        $response = $this->controller->changeStatus($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testChangeStatus_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::chatChangeStatus();

        $this->chatServiceMock
            ->shouldReceive('changeStatus')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->changeStatus($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }

    public function testPendenceRoomSearch_OkResult(): void
    {
        $request = ChatRequestsMocks::pendenceRoom();

        $response = ChatResponsesMocks::chatPendenceRoomResponse();

        $this->chatServiceMock
            ->shouldReceive('pendenceRoomSearch')
            ->once()
            ->andReturn($response);

        $response = $this->controller->pendenceRoomSearch($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testPendenceRoomSearch_BadRequestResult(): void
    {
        $request = ChatRequestsMocks::pendenceRoom();

        $this->chatServiceMock
            ->shouldReceive('pendenceRoomSearch')
            ->once()
            ->andReturn(['mensagem' => 'alguma_mensagem']);

        $response = $this->controller->pendenceRoomSearch($request);

        $this->assertInstanceOf(ErrorResource::class, $response);
        $this->assertEquals(400, $response->response()->status());
    }
}