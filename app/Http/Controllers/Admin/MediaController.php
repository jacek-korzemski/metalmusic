<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public static function index()
    {
        $media = Media::all();
        return view('admin.media')->with([
            'full' => true,
            'media' => $media
        ]);
    }

    public static function create()
    {
        return view('admin.add_media')->with([
            'full' => true
        ]);
    }

    public static function upload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:png,jpg,jpeg,bmp,jifif,webp|max:5128'
            ]);
            $mediaModel = new Media;
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $req->file('file')->storeAs('uploads/images', $fileName, 'public');
                $mediaModel->file_name = $fileName;
                $mediaModel->file_category_id = 1;
                $mediaModel->save();
                return redirect('/admin/media')
                ->with('success','Media zostały dodane')
                ->with('file', $fileName);
            }
    }
}
