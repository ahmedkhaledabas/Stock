<?php

namespace App\Http\Controllers;

use App\Models\Images\UsersImages;
use Illuminate\Http\Request;

class UsersImagesController extends Controller
{
    //

    //Store image
    public function storeImage(Request $request){
        $data= new UsersImages();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
       
    }
}
