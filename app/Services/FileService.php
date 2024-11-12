<?php

namespace App\Services;

use App\Models\File\Requesters\FileNewAttachSearch;
use App\Models\File\Requesters\FileAttach;
use App\Models\File\Requesters\FileAttachControl;
use App\Models\File\Requesters\FileDownload;
use App\Models\File\Requesters\FileNotify;
use App\Models\File\Responses\FileAttachControlResponse;
use App\Models\File\Responses\FileAttachResponse;
use App\Models\File\Responses\FileNewAttachSearchResponse;
use App\Models\Token;
use App\Services\Interfaces\IFileService;
use App\Services\Interfaces\ITokenService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FileService implements IFileService
{
    public function attachFile(FileAttach $attach, Token $token): array|FileAttachResponse
    {
        $url = env('URL_CHAT');

        $url .= "/upload/{$attach->cd_unimed_executora}/{$attach->numero_transacao}/{$attach->id_usuario}/anexarArquivo";

        $filePath = $attach->arquivo->getPathname();
        $fileName = $attach->arquivo->getClientOriginalName();

        $res = $this->sendRequestAttach($token, $url, $filePath, $fileName);

        if ($res->successful()) {
            return new FileAttachResponse($res->json());
        }

        return $res->json();
    }

    public function downloadFiles(FileDownload $attach, Token $token): array|string
    {
        $url = env('URL_CHAT') . "/download/baixarAnexos";

        $res = $this->sendRequestPost($token, $url, $attach->toArray());

        if ($res->successful()) {
            return $this->storeFiles($res->body());
        }

        return $res->json();
    }

    public function notifyNewFile(FileNotify $attach, Token $token): array|string
    {
        $url = env('URL_CHAT') . "/notificaAnexo/notificarAnexosNovos";

        $res = $this->sendRequestPost($token, $url, $attach->toArray());

        if ($res->successful()) {
            return $this->storeFiles($res->body());
        }

        return $res->json();
    }

    private function storeFiles($content)
    {
        $filename = 'chat/' . uniqid('chat-') . '.zip';

        Storage::disk('public')->put($filename, $content);

        $fileUrl = Storage::url($filename);

        $url = asset($fileUrl);

        return $url;
    }

    public function attachControl(FileAttachControl $chat, Token $token) : array|FileAttachControlResponse
    {
        $url = env('URL_CHAT'). '/anexo/controleAnexo';

        $url .= "/{$chat->numero_transacao}/{$chat->cd_unimed_executora}/{$chat->id_usuario}";

        $res = $this->sendRequestGet($token, $url);

        if($res->successful()){
            return new FileAttachControlResponse($res->json());
        }

        return $res->json();
    }

    public function newAttachSearch(FileNewAttachSearch $chat, Token $token) : array|FileNewAttachSearchResponse
    {
        $url = env('URL_CHAT'). '/consulta/consultarAnexosNovos';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());
        
        if($res->successful()){
            return new FileNewAttachSearchResponse($res->json());
        }

        return $res->json();
    }

    private function sendRequestAttach(Token $token, string $url, string $filePath, string $fileName)
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')
        )
            ->withToken($token->getAccess_token())
            ->attach('arquivo', file_get_contents($filePath), $fileName)
            ->post($url);
    }

    private function sendRequestPost(Token $token, string $url, array $data)
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')

        )
            ->withToken($token->getAccess_token())
            ->post($url, $data);
    }

    private function sendRequestGet(Token $token, string $url)
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')

        )
            ->withToken($token->getAccess_token())
            ->get($url);
    }

    private function sendRequestPut(Token $token, string $url, array $data)
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')

        )
            ->withToken($token->getAccess_token())
            ->put($url, $data);
    }
}
