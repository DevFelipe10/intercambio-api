<?php

namespace App\Services\Interfaces;

use App\Models\File\Requesters\FileNewAttachSearch;
use App\Models\File\Requesters\FileAttach;
use App\Models\File\Requesters\FileAttachControl;
use App\Models\File\Requesters\FileDownload;
use App\Models\File\Requesters\FileNotify;
use App\Models\File\Responses\FileAttachControlResponse;
use App\Models\File\Responses\FileAttachResponse;
use App\Models\File\Responses\FileNewAttachSearchResponse;
use App\Models\Token;

interface IFileService
{
    public function attachFile(FileAttach $attach, Token $token): array|FileAttachResponse;

    public function downloadFiles(FileDownload $attach, Token $token): array|string;

    public function notifyNewFile(FileNotify $attach, Token $token): array|string;

    public function attachControl(FileAttachControl $chat, Token $token) : array|FileAttachControlResponse;

    public function newAttachSearch(FileNewAttachSearch $chat, Token $token) : array|FileNewAttachSearchResponse;
}
