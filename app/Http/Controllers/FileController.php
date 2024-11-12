<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\FileAttachControlRequest;
use App\Http\Requests\File\FileAttachRequest;
use App\Http\Requests\File\FileDownloadRequest;
use App\Http\Requests\File\FileNewAttachSearchRequest;
use App\Http\Resources\ErrorResource;
use App\Models\File\Requesters\FileAttach;
use App\Models\File\Requesters\FileAttachControl;
use App\Models\File\Requesters\FileDownload;
use App\Models\File\Requesters\FileNewAttachSearch;
use App\Services\Interfaces\IFileService;
use App\Services\Interfaces\ITokenService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function __construct(
        protected ITokenService $tokenService,
        protected IFileService $fileService
    ) {
    }

     /**
     *  Attach A New File Endpoint
     */
    public function attachFile(FileAttachRequest $request)
    {
        $token = $request->attributes->get('token');

        $file = new FileAttach($request->toArray());

        $res = $this->fileService->attachFile($file, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

     /**
     *  Download Attach's From a Room Endpoint
     */
    public function downloadFiles(FileDownloadRequest $request)
    {
        $token = $request->attributes->get('token');

        $file = new FileDownload($request->toArray());

        $res = $this->fileService->downloadFiles($file, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response(['downloadUrl' => $res], Response::HTTP_OK);
    }

     /**
     *  Notify Me A New File Endpoint
     */
    public function notifyNewFile(Request $request)
    {
        //ta chegano poha
        var_dump($request->toArray());
        exit;

        /**
         * TODO: O que será feito com esse endpoint? Não irá enviar nada pra UB (é endpoint que eles utilizam)
         */
        // $file = new FileNotify($request->toArray());

        // $res = $this->fileService->notifyNewFile($file, $token);

        // if(is_array($res)){
        //     /**
        //      * @status 400
        //      */
        //     return new ErrorResource(
        //         "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
        //     );
        // }

        // return response(['downloadUrl' => $res], Response::HTTP_OK);
    }

    /**
     *  Get Attach Control Endpoint
     */
    public function attachControl(FileAttachControlRequest $request)
    {
        $token = $request->attributes->get('token');

        $file = new FileAttachControl($request->toArray());

        $res = $this->fileService->attachControl($file, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray(), Response::HTTP_OK);
    }

    /**
     *  Search New Attach Endpoint
     */
    public function newAttachSearch(FileNewAttachSearchRequest $request)
    {
        $token = $request->attributes->get('token');

        $file = new FileNewAttachSearch($request->toArray());

        $res = $this->fileService->newAttachSearch($file, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de consulta de anexos - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray(), Response::HTTP_OK);
    }

}
