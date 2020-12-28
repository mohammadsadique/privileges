<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Supppport\Facades\Auth;
use Illuminate\Suport\Facades\Input;
use Session;
use Image;

use App\Models\Login;
use App\Models\UserRegistration;

class LoginC extends Controller
{
    function landing(){
        return view('admin.login');
    }

    // unique:table name,column name
    // unique:logins,email
    function sublogin(Request $req){
        $valid = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $req->input('email'); 
		$password = $req->input('password');
			
        $checklogin = Login::select('*')->where('email',$email)->count();
        if($checklogin > 0)
		{
            $adminlogin = Login::where('email','=',$email)->first();
            if(Hash::check( $password, $adminlogin->password)){        
			    session()->put('login', $adminlogin);
                return redirect()->route('homedashboard');
            } else {
                return redirect()->back()->withInput()->with('error2', 'Login credential wrong!');
            }
		}
        else
        {
            return redirect()->back()->withInput()->with('error', 'Username or Password is wrong!');
		}
    }

    function logout(){
        Session::flush();
		return redirect()->route('loginpage');
    }



    public function profile()
    {
        $log = session()->get('login');
        $wc = Login::where('id',$log->id)->first();
        return view('admin.dashboard.profile',compact('wc'));
    }

    public function subprofile(Request $request)
    {
        $valid = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'nullable|required_with:end_page',
        ]);
        
        $replaceMob = $request->mobile;
        $mobile = str_replace( [' ', '(', ')','-'], '' , $replaceMob);

        $update_val = $request->updval;
		if(!is_null($update_val)){
			$ee = Login::find($update_val);
        }
        $ee->name = $request->name;
        $ee->mobile = $mobile; 
        $ee->email = $request->email;
        $ee->address = $request->address;
        $ee->created_at = date('Y-m-d H:i:s'); 
        $ee->updated_at = date('Y-m-d H:i:s');


        if($request->hasFile('image')){
            $time = time();
            $img11 = $request->image->getClientOriginalName();
            $img1 =	$time.'-'.$img11;
            $destination = public_path('img/staff');
            $ext = pathinfo($destination.$img1 , PATHINFO_EXTENSION);
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' )
            {
                $images = $request->file('image');
                $img = Image::make( $images );
                $img->resize(32, 32)->save($destination.'/'.$img1);

                //$request->image->move($destination,$img1); 
                if(!is_null($update_val)){
                    $clientin = Login::select('*')->where('id',$update_val)->first(); 
                    $filePath = public_path('img/staff/').$clientin->image; 
                    if($clientin->image != ''){
                        if(file_exists($filePath))
                        {
                            unlink($filePath);
                        }
                    }
                }
                $ee->image = $img1;               
                $ee->save();                
            }           
        } else {
            $ee->save();
        }

        if(!is_null($update_val)){
			return redirect()->back()->with('success', 'Update Profile Successfully!');
		}
		else
		{
			return redirect()->back()->with('success', 'Added Profile Successfully!');	
		}
    }
}
