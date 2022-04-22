<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //
    public function index() {
        $todos = Todo::get();
        return response()->json($todos);
    }
}
