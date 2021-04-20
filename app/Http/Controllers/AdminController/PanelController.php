<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PanelController extends Controller
{
    /*public function __construct()
    {
        $this->middleware(CheckPermission::class . ':view-dashboard')
            ->only('index');
    }*/
    public function index()
    {
        /*if (Gate::denies('view-dashboard')) {
            abort(403);
        }*/

        return view('admin.index');
    }
}
