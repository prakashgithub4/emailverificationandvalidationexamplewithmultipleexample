<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Optional;

class MultipleformData extends Controller
{
    //

  
   
    public function index($id){
    	
      
        
       //   if($this->count<  5){

         	$html =  "<tr align='center' id='tr_".$id."'>";
	     	$html .= "<td>
	     	<input type='text' name='name[]' />
              <small></small>
	     	</td>
	        <td>
	        <input type='text' name='role[]'/>
            <small></small>
	        </td>

	        <td>
	        <input type='text' name='sub[]'/>
	         <small></small>
	        </td>
	        <td>
	        <button type='button' class='btn btn-danger' onclick='del(".$id.")'>-</button></td>
	       <tr/>";
	       echo $html;
	     
      	 	
      	
    }

   public  function save(Request $request){
     

     $data['name']=$request->input('name');
     $data['role']=$request->input('role');
     $data['sub']=$request->input('sub');
     $data['counter']=$request->input('counter');
     Optional::optional_save($data);
  
      echo "success fully added";

   }
}
