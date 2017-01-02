<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Validator;
use Redirect;
use Session;
use Auth;
use Carbon\Carbon;

class FilesController extends Controller
{
    /*public function upload() {
  	// getting all of the post data
  		$file = array('image' => Input::file('image'));
  		// setting up rules
  		$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
  		// doing the validation, passing post data, rules and the messages
  		$validator = Validator::make($file, $rules);
  		if ($validator->fails()) {
    	// send back to the page with the input data and errors
    		return Redirect::to('upload')->withInput()->withErrors($validator);
  		}
  		else {
    	// checking file is valid.
	    	if (Input::file('image')->isValid()) {
	      		$destinationPath = 'uploads'; // upload path
	      		$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
	      		$fileName = rand(11111,99999).'.'.$extension; // renameing image
	      		Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
	      		// sending back with message
	      		Session::flash('success', 'Upload gelukt'); 
	      		return Redirect::to('upload');
	    	}
    		else {
      		// sending back with error message.
      			Session::flash('error', 'uploaded file is not valid');
      			return Redirect::to('upload');
    		}
  		}
	}
*/
  public function upload(Request $request)
  {
    $this->validate($request, [
        'titel' =>'required',
        'aankoop_datum'=>'required',
        'verloop_datum'=>'required',
        'filename'=>'required'
      ],[
        'titel.required'=>'Gelieve een titel in te geven.',
        'aankoop_datum.required'=>'Gelieve een aankoopdatum in te geven.',
        'verloop_datum.required'=>'Gelieve een verloopdatum in te geven.',
        'filename.required'=>'Gelieve een file te selecteren.'
      ]);
    $file = new File($request->all());
    $file->user_id=Auth::id();
    $nieuwe_naam=$file->filename.date("Y-m-d H:i:s");
    $purchase_date=Carbon::parse($file->aankoop_datum);
    $file->aankoop_datum=$purchase_date;
    $expiration_date=Carbon::parse("$file->verloop_datum");
    $file->verloop_datum=$expiration_date;
    $hashedName=md5($nieuwe_naam).'.pdf';

    $file2 = request()->file('filename');
    //$filename = $file2->getClientOriginalName();
    $file->filename=$hashedName;
    $file2->storeAs('garantiebewijzen/' . auth::id(), $hashedName);
    $file->save();
    // fout ->$file->addFiletoDB($file, Auth::id());
    Session::flash('success_upload', 'Upload gelukt'); 
    return Redirect::to('upload');
  }
  public function checkwijzigordelete(Request $request, File $file)
  {
    if($request->has('wijzig')) {
      $this->update($request, $file);
    }
    elseif($request->has('verwijder'))
    {
      $this->delete($request, $file);
    }
  }
  public function update(Request $request, File $file)
  {
     $this->validate($request, [
        'titel' =>'required',
        'aankoop_datum'=>'required',
        'verloop_datum'=>'required'
        
      ],[
        'titel.required'=>'Gelieve een titel in te geven.',
        'aankoop_datum.required'=>'Gelieve een aankoopdatum in te geven.',
        'verloop_datum.required'=>'Gelieve een verloopdatum in te geven.'
        
      ]);
    $file->update($request->all());
    Session::flash('success_update', 'Update gelukt');
    return Redirect::to('garantiebewijzen/'.$file->id);
  }
  public function delete(Request $request, File $file)
  {
    return $file;
  }
}
