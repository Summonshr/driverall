<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Interfaces\ResourceModel;

class MediaController extends Controller
{
    public function upload(UploadRequest $request, ResourceModel $resource, $type)
    {
        dd($resource);
    }
}
