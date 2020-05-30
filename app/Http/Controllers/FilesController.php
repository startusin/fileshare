<?php

namespace App\Http\Controllers;

use App\Helpers\FilesHelper;
use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public $helper;

    public function __construct()
    {
        $this->helper = new FilesHelper();
    }

    public function store(Request $request){
        $file = $request->file('resource');

        if (!$file) {
            return back()->WithErrors('Cant load file');
        }

        $ext = $file->extension();
        $filename = substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 6);
        $path = $this->helper->gen('file_name');

        Storage::disk('local')->putFileAs($path . '/', $file, $filename . '.' . $ext);
        Resource::create([
            'user_id' => Auth::user()->id,
            'file_name' => $path . '/' . $filename . '.' . $ext,
            'public_link' => $this->helper->gen('public_link'),
            'rules' => ' '
        ]);

        return redirect('/files');
    }

    public function download($path, $subpath){
        $res = Resource::where('public_link', $path . '/' . $subpath)->first();
        return response()->download(storage_path('/app/' . $res->file_name));
    }

    public function info($path, $subpath){
        return view('pages.fileinfo', ['path' => $path, 'subpath' => $subpath]);
    }

    public function fileList(){
        return view('pages.filelist');
    }

    public function upload(){
        return view('pages.upload');
    }
}
