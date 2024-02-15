<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MajorController extends Controller
{

    function index()
    {

        $majors = Major::get(['id', 'image', 'title']);
        return view("dashboard.majors.index", compact("majors"));
    }



    function create()
    {
        return view("dashboard.majors.create");
    }


    function store(Request $request)
    {


        $data =  $request->validate(
            [
                "title" => "required|min:3|max:50|unique:majors,title",
                "image" => "required|image|mimes:png,jpg,jpeg"
            ]
        );
        $image = $this->uploadImage($request->image, "majors/");

//  Major::create([])

        $major = new Major();
        $major->title = $request->title;
        $major->image = $image;
        $major->save();
        return redirect()->route('majors.create');
    }


    function edit(Major $major)
    {
        return view("dashboard.majors.edit", compact("major"));
    }


    function update(Request $request, Major $major)
    {

        $request->validate(
            [
                "title" => "required|min:3|max:50|unique:majors,title,".$major->id,
                "image" => "nullable|image|mimes:png,jpg,jpeg"
            ]
        );

        // if($request->hasFile('image') ){
        //     $this->deleteImage($major->image,'majors/');
        //     $image=$this->uploadImage($request->image, "majors/");
        // }else{
        //     $image=$major->image;
        // }
         $image = $request->hasFile('image') ? $this->uploadImage($request->image, "majors/",$major->image) : $major->image;
        $updated =  $major->update(
            [
                'title' => $request->title,
                "image" => $image,
                'name'=>'dd'
            ]
        );


        if ($updated) {
            return back()
            ->with('success','major has been uploaded.');
        } else {
            return back()
            ->with('error','failed');
        }
        
    }


    function destroy(Major $major){
        if ($major->delete()) {
            return back()
            ->with('success','deleted');
        } else {
            return back()
            ->with('error','failed');
        }
    }
    function uploadImage($image, $path,$old= null)
    {
         if($old){
           $this->deleteImage($old,$path);
         }

        
         if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $imageName = $image->getClientOriginalName();

        File::put($path . $imageName, file_get_contents($image));
        return $imageName;
   
      
    }


    function deleteImage($image, $path)
    {
        $path=public_path($path.$image);
        if(File::exists($path) && !File::isDirectory($path)){
            File::delete($path);
        }
    }



}
