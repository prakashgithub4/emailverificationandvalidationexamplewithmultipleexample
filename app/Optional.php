<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    //
    protected $table = "optinals";
    protected $fillable =['name', 'roll', 'subject'];
    public $timestamp;


      public static function optional_save($data){
         
        for($i=0; $i<count($data['name']);$i++){
           
       	   $optioanl =  new Optional;
       	   $optioanl->name =$data['name'][$i];
       	   $optioanl->roll =$data['role'][$i];
       	   $optioanl->subject =$data['sub'][$i];
       	   $optioanl->save();

       } 
      // print_r($data['name']); exit;

      }

}
