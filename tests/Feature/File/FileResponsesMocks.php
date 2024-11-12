<?php

namespace Tests\Feature\File;

use App\Models\File\Responses\FileAttachControlResponse;
use App\Models\File\Responses\FileAttachResponse;
use App\Models\File\Responses\FileNewAttachSearchResponse;

class FileResponsesMocks
{
    public static function attachFileResponse(): FileAttachResponse
    {
        $array = [
            'idAnexos' => "123",
            'status' => [
                'descricao' => "Isso eh um anexo",
                'httpStatusCode' => 200,
            ]
        ];

        return new FileAttachResponse($array);
    }

    public static function attachControlResponse(): FileAttachControlResponse
    {
        $array = [
            'procedimentoMedico' => [
                [
                    'grupoServico' => 'teste',
                    'tipo' => 1,
                    'cbhpm' => "dcbhpm",
                    'amb' => "amb",
                    'descricao' => "description",
                    'valor' => 10,
                    'numeroAuxiliares' => 1,
                    'porteAnestesico' => "porte",
                    'documentacaoObrigatoria' => 'doc'
                ]
            ],
            'qtdAnexosSala' => 2,
            'mensagem' => "message",
        ];

        return new FileAttachControlResponse($array);
    }

    public static function newAttachSearchResponse(): FileNewAttachSearchResponse
    {
        $array = [
            'status' => [
                "descricao" => "Sucesso",
                "httpStatusCode" => 200
            ],
            'anexos' => [
                [
                    'idAnexo' => "123123",
                    'dtEnvio' => "2024-01-05T10:49:17.511Z",
                    'nmArquivo' => "nome_arq",
                    'nmUsuario' => "nome_usr",
                    'cdUnimedUsuario' => "0000",
                    'cdUnimedExecutora' => "0000",
                    'numTrans' => "000000000000000"
                ]
            ]
        ];

        return new FileNewAttachSearchResponse($array);
    }

    public static function downloadResponse(): string
    {
        return 'https://linkezeramyboss';
    }
}
