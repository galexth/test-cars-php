<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
    }

    public function index () {
        return view('welcome');
    }

    public function move (Request $request) {
    }

    public function turn (Request $request) {
        $this->validate($request, [
            'direction' => 'required|in:left|right',
        ]);
    }

    public function place (Request $request) {
        $this->validate($request, [
            'x' => 'required',
            'y' => 'required',
            'direction' => 'required|in:north,south,west,east',
        ]);
    }
}
