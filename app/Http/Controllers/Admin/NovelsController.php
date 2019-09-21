<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class NovelsController extends Controller
{
    public function getListNovels() {
    	$novels = DB::table('novels')
    		->join('authors', 'authors.id', '=', 'novels.author_id')
    		->select('novels.*', 'authors.author_name')
    		->paginate(2);

    	return view('admin.novels-list', compact('novels'));
    }

    public function getAddNovels() {
    	$tagsList = DB::table('tags')->get();
    	$authorsList = DB::table('authors')->orderBy('author_name', 'asc')->get();
    	return view('admin.novels-add', compact('tagsList', 'authorsList'));
    }

    public function postAddNovels(Request $request) {
        $err = [];
    	if($request->fileImage && $request->checkTags) {
            $fileName = null;
            $error = null;
            if($this->uploadImg($request->fileImage, 'images/novels/', $fileName, $error)) {
                $arr = [
                    'novel_name' => strtoupper($request->txtName),
                    'author_id' => $request->selectAuthor,
                    'novel_translator' => $request->txtTranslator,
                    'novel_description' => $request->txtDescription,
                    'novel_price' => str_replace('.', '', $request->txtPrice),
                    'novel_quantity' => $request->txtQuantity,
                    'novel_publisher' => $request->txtPublisher,
                    'novel_size' => $request->txtSize,
                    'novel_pages' => $request->txtPages,
                    'novel_language' => $request->txtLanguage,
                    'novel_image_url' => $fileName,
                    'novel_tags' => ','.implode(',', $request->checkTags).',',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                DB::table('novels')->insert($arr);
                DB::table('tags')
                    ->whereIn('id', $request->checkTags)
                    ->increment('tag_quantity');

                return back()->with('success', 'Successful!');
            }
            else $err[] = $error;
        }
        
        if(!$request->fileImage) $err[] = 'Please upload an image';
        if(!$request->checkTags) $err[] = 'Please choose a tag at least';

        if($err) return back()->withInput()->with('err', $err);
    }

    public function getAuthors() {
        $authorsList = DB::table('authors')->paginate(1);

        return view('admin.authors', compact('authorsList'));
    }

    private function uploadImg($imageObj, $path, &$fileName, &$err) {
        $rules = [ 'image' => 'image' ]; 
        $posts = [ 'image' => $imageObj ];
        
        $valid = Validator::make($posts, $rules);

        if ($valid->fails()) {
            // Có lỗi
            $err = 'Please choose image file exactly';
            return false;
        }
        else {
            // Ko có lỗi, kiểm tra nếu file đã dc upload
            if ($imageObj->isValid()) {
                // File này có thực, bắt đầu đổi tên và move
                // $fileExtension = $imageObj->getClientOriginalExtension(); // Lấy . của file
                
                // Filename rất là ra gì
                $fileName = time() . '_' . md5(rand(0,9999999)). '_' . $imageObj->getClientOriginalName();
                            
                // Thư mục upload
                $uploadPath = public_path($path); // Thư mục upload
                
                // Bắt đầu chuyển file vào thư mục
                $imageObj->move($uploadPath, $fileName);

                // Xoá file cũ
                if(file_exists(public_path(Auth::user()->image_url)) && Auth::user()->image_url != null){
                    unlink(public_path(Auth::user()->image_url));
                }
                
                return true;
            }
            else {
                // Lỗi file
                $err = 'Upload image failed!';
                return false;
            }
        }
    }
}
