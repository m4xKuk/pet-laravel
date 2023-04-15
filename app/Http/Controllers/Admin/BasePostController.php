<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\PostService;
use Illuminate\Http\Request;

class BasePostController extends Controller
{
    public $services;

    public function __construct()
    {
        $this->services = new PostService();
    }
}
