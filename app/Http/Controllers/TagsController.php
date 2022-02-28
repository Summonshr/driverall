<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListTags;
use App\Interfaces\ResourceModel;

class TagsController extends Controller
{
    public function index(ListTags $request, ResourceModel $model)
    {
        return $model->tags->pluck('name');
    }
}
