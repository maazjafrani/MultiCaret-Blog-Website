<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

//importing model User.php
use App\Models\User;

use Illuminate\Support\Facades\DB;

class DBRelationController extends Controller
{

    public function index(Request $request)
    {

        $searchkey = $request->input('search');
        $data = Post::with('user');
        if ($request->has("search") && $searchkey) {
            $data = $data->where('content_name', 'LIKE', "%$searchkey%")->simplePaginate(3);

        } else {
            $data = $data->simplePaginate(5);
        }

        return view('/home')->with(['posts' => $data]);
    }


}
