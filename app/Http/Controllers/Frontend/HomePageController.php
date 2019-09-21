<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        $novelsCarousel = DB::table('novels')
            ->join('authors', 'novels.author_id', '=', 'authors.id')
            ->where('novels.novel_status', 1)
            ->select('novels.*', 'authors.author_name')
            ->orderBy('novels.id', 'desc')
            ->take(5)
            ->get();
        $novelsList = DB::table('novels')
            ->where('novel_status', 1)
            ->orderBy('novels.id', 'desc')
            ->skip(5)
            ->take(6)
            ->get();
        return view('frontend.homepage', compact('novelsCarousel', 'novelsList'));
    }

    
}
