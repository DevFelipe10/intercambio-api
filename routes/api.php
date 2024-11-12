<?php

use App\Http\Controllers\ProtocolController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('protocolo')->middleware(['token'])->group(function () {
    Route::post('/solicitar-protocolo', [ProtocolController::class, 'create']);

    Route::post('/cancelar-protocolo', [ProtocolController::class, 'cancel']);

    Route::post('/encaminhar-execucao', [ProtocolController::class, 'sendExecution']);

    Route::post('/responder-atendimento', [ProtocolController::class, 'answer']);

    Route::post('/historico-protocolo', [ProtocolController::class, 'history']);

    Route::post('/status-protocolo', [ProtocolController::class, 'status']);

    Route::post('/complementar-protocolo', [ProtocolController::class, 'complement']);
});

Route::prefix('chat')->middleware(['token'])->group(function () {
    Route::post('/criar-sala', [ChatController::class, 'create']);

    Route::post('/abrir-sala', [ChatController::class, 'open']);

    Route::post('/bloquear-desbloquear-sala', [ChatController::class, 'lockUnlock']);

    Route::post('/busca-unitaria-usuario', [ChatController::class, 'unitaryUserSearch']);

    Route::post('/recuperar-link', [ChatController::class, 'linkRecover']);

    Route::post('/encontrar-sala', [ChatController::class, 'findRoom']);

    Route::post('/listar-mensagens', [ChatController::class, 'messageHistory']);

    Route::post('/busca-multipla-usuario', [ChatController::class, 'multipleUserSearch']);

    Route::post('/enviar-mensagem', [ChatController::class, 'sendMessage']);

    Route::post('/definir-sala-pendente', [ChatController::class, 'defineRoomPendence']);

    Route::post('/busca-cria-sala', [ChatController::class, 'searchRoom']);

    Route::post('/busca-unitaria-transacao', [ChatController::class, 'unitarySearchTransaction']);

    Route::post('/adicionar-usuario-sala', [ChatController::class, 'addUser']);

    Route::post('/controle-complemento', [ChatController::class, 'complementControl']);
    
    Route::post('/alterar-status', [ChatController::class, 'changeStatus']);
    
    Route::post('/busca-multipla-transacao', [ChatController::class, 'multipleTransactionSearch']);
    
    Route::post('/painel-transacoes', [ChatController::class, 'transactionPanel']);

    Route::post('/consultar-sala-pendente', [ChatController::class, 'pendenceRoomSearch']);
});

Route::prefix('chat/arquivo')->middleware(['token'])->group(function () {
    Route::post('/enviar-arquivo', [FileController::class, 'attachFile']);

    Route::post('/baixar-arquivos', [FileController::class, 'downloadFiles']);

    Route::post('/controle-anexos', [FileController::class, 'attachControl']);

    Route::post('/consultar-anexos-novos', [FileController::class, 'newAttachSearch']);

});

Route::prefix('chat/arquivo')->middleware(AuthenticateUser::class)->group(function () {
    Route::post('/notificar-anexos-novos', [FileController::class, 'notifyNewFile']);
});

