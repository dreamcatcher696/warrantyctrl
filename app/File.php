<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function addFiletoDB(File $file, $userId)
    {	
    	$file->user_id=$userId;
    	return $this->save($file);
    }//
    protected $fillable=['titel', 'aankoop_datum', 'verloop_datum', 'beschrijving', 'filename'];
}
