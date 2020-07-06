<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mainModel;
use Image;

class mainController extends Controller
{

    //photo upload handler
    function profilePhotoFileHandler(Request $request){
        // $path = $request->profilePhotoKey->store('public');
        // return $path;

        $imageFile = $request->profilePhotoKey;
        $imageFileExtension = $imageFile->getClientOriginalExtension();
        $imageFileName = date('Ymdhis.') . $imageFileExtension;

        Image::make($imageFile)
                ->resize(100, 100)
                ->save(public_path('photos/'). $imageFileName);

    return  $imageFileName;
    }


//search
function search(Request $request){
    $name = $request->get('name');
    $ownerId = $request->session()->get('userId');
    $selectData = mainModel::where('ownerId', '=', $ownerId)->orderBy('name', 'ASC')
    ->where('name', 'LIKE', "{$name}%")
    ->paginate(10);
  return view('home', ['collection'=> $selectData]);
}

//home route...
function home(Request $request){

    $ownerId = $request->session()->get('userId');

    $selectData = mainModel::where('ownerId', '=', $ownerId)->orderBy('id', 'DESC')->paginate(10); //get()
    return view('home', ['collection'=> $selectData]);     
    
}


//deleteData...
function deleteData(Request $request, $id){
    $userId = $request->session()->get('userId');
    $unlinkPhoto = mainModel::find($id);
    unlink(public_path('photos/'). $unlinkPhoto->photoPath);
    $result = mainModel::where('id', $id)->where('ownerId', '=', $userId)->delete();

    if($result == true){
        return redirect('/home')->with('status', 'Deleted Successfully');
    }
    else{
        return redirect('/home')->with('status', 'Delete Failed');
    }
}


     //edit route...
    function editPage($id){
        $result =  mainModel::find($id);
        return view('edit')->with(compact('result'));;
     }


     //edit data...
     function editData(Request $request, $id){
        $name   = $request->name;
        $roll   = $request->roll;
        $class  = $request->class;

        $imageFile  = $request->file('imageFile');
 
        if($imageFile == null){
            $userId = $request->session()->get('userId');
            $result = mainModel::where('id', $id)->where('ownerId', '=', $userId)->update(['name'=> $name, 'roll'=> $roll, 'class'=> $class]);
     
            if($result == true){
                return redirect('/home')->with('status', 'Updated Successfully');
            }
            else{
                return redirect('/home')->with('status', 'Update Failed');
            }
        }
        else{
            $unlinkPhoto = mainModel::find($id);

            $imageFileExtension = $imageFile->getClientOriginalExtension();
            $imageFileName = date('Ymdhis.') . $imageFileExtension;

            if($imageFileExtension != 'jpg' && $imageFileExtension != 'jpeg' && $imageFileExtension != 'png'){
                return redirect('/home')->with('status', 'Update Failed! File not supported');
            }else{
                unlink(public_path('photos/'). $unlinkPhoto->photoPath);

                Image::make($imageFile)
                    ->resize(100, 100)
                    ->save(public_path('photos/'). $imageFileName);

                $userId = $request->session()->get('userId');
                $result = mainModel::where('id', $id)->where('ownerId', '=', $userId)->update(['name'=> $name, 'roll'=> $roll, 'class'=> $class, 'photoPath'=> $imageFileName]);
            
                if($result == true){
                    return redirect('/home')->with('status', 'Updated Successfully');
                }
                else{
                    return redirect('/home')->with('status', 'Update Failed');
                }
            }
        }

     }


     //insert route...
    function insertPage(){
        return view('insert'); 
     }


    //insert data...
    function insertData(Request $request){
        $ownerId   = $request->session()->get('userId');
        $name      = $request->input('name');
        $roll      = $request->input('roll');
        $class     = $request->input('class');
        $photoPath = $request->input('photoPath');
        //DB::table('students')
        $result = mainModel::insert([ 'name'=>$name, 'roll'=> $roll, 'class'=>$class, 'ownerId'=>$ownerId, 'photoPath'=>$photoPath ]);
 
        if($result == true){
            return "Inserted Successfully";
        }
      
     }

//end...
}
