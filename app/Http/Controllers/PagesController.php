<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Auth;
use Session;
use Redirect;
use Storage;
use Carbon\Carbon;


class PagesController extends Controller
{
    public function index()
    {
        return view("homepage");
    	/*return view("hoofdpagina");*/
    }
    public function upload()
    {
    	return view("fileupload");
    }
    public function show()
    {
    	
    	$file=File::where('user_id',Auth::id())->get();
    	return view("showoverzicht", compact('file'));
    }
    public function showOne(File $file)
    {
    	$file=File::where('id', $file->id)->get()->first();
        $file->aankoop_datum=Carbon::parse($file->aankoop_datum)->format("d/m/Y");
        $file->verloop_datum=Carbon::parse($file->verloop_datum)->format("d/m/Y");
    	if($file->user_id != Auth::id())
        {
            abort(404);
        }
    	return view('showone', compact('file'));
    }
    public function checkwijzigordelete(Request $request, File $file)
    {
        if($file->user_id != Auth::id())
        {
            abort(404);
        }
        if($request->has('wijzig')) {
            //return "gewijzigd";
          return $this->edit($file);
        }
        elseif($request->has('verwijder'))
        {
            //return "verwijdderd";
          return $this->verwijder($file);
        }
    }

    public function edit(File $file)
    {
        $file=File::where('id', $file->id)->get()->first();
        return view('editone', compact('file'));
    }
    public function verwijder(File $file)
    {
        $file=File::where('id', $file->id)->get()->first();
        $file->delete();
        Storage::delete('garantiebewijzen/'.$file->user_id.'/'.$file->filename);
        session::flash('success_delete', 'succesvol verwijderd');
        return Redirect::to('/show');
    }
    public function redirectFromLogin()
    {
        Session::flash('success_login', 'login gelukt');
        return Redirect::to('/show');
    }
}
