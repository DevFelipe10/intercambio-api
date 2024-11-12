<?php

namespace Tests\Feature\File;

use App\Http\Requests\File\FileAttachControlRequest;
use App\Http\Requests\File\FileAttachRequest;
use App\Http\Requests\File\FileDownloadRequest;
use App\Http\Requests\File\FileNewAttachSearchRequest;
use Tests\Feature\InitToken;

class FileRequestsMocks
{
    public static function attachRequest() : FileAttachRequest
    {

        $array = [
            'arquivo' => 'teste.txt',
            'idUsuario' => '00000000000-000',
            'cdUnimedExecutora' => '0666',
            'numeroTransacao' => '000000000054545',
        ];

        $request = new FileAttachRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function attachControlRequest() : FileAttachControlRequest
    {

        $array = [
            'idUsuario' => '00000000000-000',
            'cdUnimedExecutora' => '0666',
            'numeroTransacao' => '000000000054545',
        ];

        $request = new FileAttachControlRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function downloadRequest() : FileDownloadRequest
    {
        $array = [
            'idUsuario' => '00000000000-000',
            'idAnexos' => [1, 2, 3]
        ];

        $request = new FileDownloadRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function newAttachSearchRequest() : FileNewAttachSearchRequest
    {
        $array = [
            "dtInicioEnvio" => "2024-01-05T10:49:17.511Z",
            "dtFimEnvio" => "2024-10-09T10:49:17.511Z",
            "cdUnimedExec" => "0137",
            "numTrans" => "000000007749755",
            "idUsuario" => "08557428600-137"
        ];

        $request = new FileNewAttachSearchRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
}
