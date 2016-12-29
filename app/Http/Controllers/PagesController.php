<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Auth;

class PagesController extends Controller
{
    public function index()
    {
    	return view("hoofdpagina");
    }
    public function upload()
    {
    	return view("fileupload");
    }
    public function show()
    {
    	
    	$file=File::where('user_id',Auth::id())->get();
    	//return $file;
    	
    	return view("showoverzicht", compact('file'));
    }
    public function showOne(File $file)
    {
    	$file=File::where('id', $file->id)->get()->first();
    	//return $file;
    	return view('showone', compact('file'));
    }
    public function checkwijzigordelete(Request $request, File $file)
    {
        if($request->has('wijzig')) {
            return "gewijzigd";
          $this->edit($file);
        }
        elseif($request->has('verwijder'))
        {
            return "verwijdderd";
          $this->delete($request, $file);
        }
    }

    public function edit(File $file)
    {
        $file=File::where('id', $file->id)->get()->first();
        return view('editone', compact('file'));
    }
}
