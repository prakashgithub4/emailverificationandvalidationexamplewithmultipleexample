<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected  $table='members';
    protected $fillable = ['name','email', 'phone', 'gender'];
    public $timestamp= false;

    public static function storemem($data){

    	$m = new Member;
    	$m->name=$data['name'];
    	$m->email=$data['email'];
    	$m->phone=$data['phone'];
    	$m->gender=$data['gender'];
    	$m->save();
        return $m->toArray();
    }
    public static function multipledelete($id){
         
         $member = Member::find($id);
         $member->delete();
         return $member->toArray();
    }
}
