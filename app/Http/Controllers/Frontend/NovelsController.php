<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NovelsController extends Controller
{
	public function index() {
		$novelsList = DB::table('novels')
            ->where('novel_status', 1)
            ->orderBy('id', 'desc')
			->paginate(4);

		$tags = $this->getAllNovelsTags();

        $tagFocused = null;

		return view('frontend.novels', compact('novelsList', 'tags', 'tagFocused'));
	}

    public function getNovelDetails($novelId) {
    	$target = DB::table('novels')
    		->join('authors', 'authors.id', '=', 'novels.author_id')
    		->where('novels.id', '=', $novelId)
    		->select('novels.*', 'authors.author_name')
    		->first();

    	$tagsArr = explode(',', $target->novel_tags);
    	$tags = DB::table('tags')
    		->whereIn('id', $tagsArr)
    		->get();

    	$sameAuthorList = $this->getSameAuthorNovelsList($target->author_id, $target->id);

    	return view('frontend.novel-details', compact('target', 'tags', 'sameAuthorList'));
    }

    public function getNovelsByTag($tagId) {
        $novelsList = DB::table('novels')
            ->where('novel_status', 1)
            ->whereRaw("novel_tags LIKE '%,".$tagId.",%'")
            ->orderBy('id', 'desc')
            ->paginate(4);

        $tags = $this->getAllNovelsTags();

        $tagFocused = $tagId;

        return view('frontend.novels', compact('novelsList', 'tags', 'tagFocused'));
    }

    private function getSameAuthorNovelsList($authId, $curNovelId) {
    	$rs = DB::table('novels')
    		->join('authors', 'authors.id', '=', 'novels.author_id')
            ->where('novels.novel_status', 1)
    		->where('authors.id', '=', $authId)
    		->where('novels.id', '!=', $curNovelId)
    		->select('novels.*', 'authors.author_name')
    		->get();
    	if(count($rs) > 0) return $rs;
    	else return null;
    }

    private function getAllNovelsTags() {
        return DB::table('tags')->get();
    }
}
