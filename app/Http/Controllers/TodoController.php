<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){

        $todo = Todo::all();
        return view('index', ['todo' => $todo]);
    }

    public function create(Request $request){

        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

        public function update(Request $request){

        Todo::where('id', $request->id)->update(['content' => $request->content]);
        return redirect('/');
    }

        public function delete(Request $request){

        Todo::find($request->id)->delete();
        return redirect('/');
    }
}