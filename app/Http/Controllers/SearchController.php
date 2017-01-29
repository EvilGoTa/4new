<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 20.12.2016
 * Time: 15:57
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        if ($query) {
            $items = Project::where('title', 'LIKE', '%'.$query.'%')->get();
        } else {
            $items = [];
        }

        return view('search', [
            'query' => $request->input('q'),
            'items' => $items
        ]);
    }
}