<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//extension_loaded('php_fileinfo.dll');

class appController extends Controller
{
    protected  $webPageName=[];
    //set default name of web page
    function __construct()
    {
        $this->webPageName['title']="College MS";
    }

    function welcome(){
        $studentData= (new \App\Student)->orderBy('id', 'desc')->paginate(3);
        $this->webPageName['title']='Welcome';
        //$studentData = Student::all();
        return view('welcome', compact('studentData'), $this->webPageName);
    }

    function home(){
        $this->webPageName['title']='Home';
        return view('home', $this->webPageName);
    }

    function aboutUs(){
        $this->webPageName['title']='About Us';
        return view('aboutUs', $this->webPageName);
    }

    function contact(){
        $this->webPageName['title']='Contact';
        //$studentData=Student::all();
       // $studentData=Student::orderBy('id', 'desc')->get();
        $studentData=Student::orderBy('id', 'desc')->paginate(3);
        return view('contact', compact('studentData'), $this->webPageName);
    }

    function addUser(Request $request){
        $this->validate(
            $request, [
                'name'=>'required|min:3',
                'email'=>'email',
                'password'=>'required|confirmed|min:8',
                'image'=>'required|mimes:jpeg,jpg,png,gig'
               ]
        );
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['password_confirmation']=$request->password_confirmation;
        //dd($data);//display data
        if($request->hasFile('image')){
            $image= $request->file('image');
            $ext=$image->getClientOriginalExtension();
            $imageName=Str::random(18).'.'.$ext;
            $uploadPath = public_path('lib/images/');
            $image->move($uploadPath, $imageName);
            $data['image']=$imageName;
        }
        if((new \App\Student)->create($data)){
            return redirect()->route('contact')->with('success', 'New User Registration Successful');
        }
    }

    function deleteUser(Request $request){
        //echo 'method to delete user'.$request->user_id;
        //get and set user if from routes
        $userId = $request->user_id;
        try {
            if ($this->_deleteImage($userId) && (new \App\Student)->findOrFail($userId)->delete()) {
                //echo "user deleted";
                return redirect()->route('contact')->with('success', 'User Deleted Successfully !!!');
            }
        } catch (\Exception $e) {
            echo $e;
        }
    }

    //method to delete image
    function _deleteImage($id){
        //fetch data of user according to user id first
        $userData = (new \App\Student)->findOrFail($id);
        //fetch and set user image name from userData
        $imageName = $userData->image;
        //get image path
        $imagePath = public_path('lib/images/'.$imageName);
        //check whether image exists or not
        if(file_exists($imagePath)){
            return unlink($imagePath);
        }
        return true;
    }

}
