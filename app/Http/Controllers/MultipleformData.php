<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
