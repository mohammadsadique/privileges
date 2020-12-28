<?php

namespace App\Http\Controllers\admin\managestaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Session;
use Image;
use App\Models\Login;


class AddStaffC extends Controller
{
    public function addstaff()
    {
        return view('admin.managestaff.addstaff');
    }

    public function subaddstaff(Request $request)
    {  
        

        $replaceMob = $request->mobile;
        $mobile = str_replace( [' ', '(', ')','-'], '' , $replaceMob);

        $update_val = $request->updval;
		if(!is_null($update_val)){
            $valid = $request->validate([
                'name' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'address' => 'nullable',
            ]);
            
            if(!empty($request->password)){
                $valid = $request->validate([
                    'password' => 'required|required_with:confirm|same:confirm|min:6',
                    'confirm' => 'min:6',
                ]);
            }
			$ee = Login::find($update_val);
		}
		else
		{
            $valid = $request->validate([
                'name' => 'required|string',
                'email' => 'required|unique:logins,email',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'address' => 'nullable',
                'password' => 'required|required_with:confirm|same:confirm|min:6',
                'confirm' => 'min:6',
            ]);
            $ee = new Login;           
        }


        $ee->logid = session::get('login')->id;
        $ee->role = 'staff';
        $ee->name = $request->name; 
        $ee->mobile = $mobile; 
        $ee->email = $request->email;
        $ee->address = $request->address;
        $ee->created_at = date('Y-m-d H:i:s'); 
        $ee->updated_at = date('Y-m-d H:i:s'); 
        $ee->password =  Hash::make($request->password);

       
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
                $img->resize(160, 160)->save($destination.'/'.$img1);

                //$request->image->move($destination,$img1); 
                if(!is_null($update_val)){
                    $clientin = Login::select('*')->where('id',$update_val)->first(); 
                    if(!empty($clientin->image)){
                        $filePath = public_path('img/staff/').$clientin->image; 
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
            return redirect()->back()->with('success', 'Staff update successfully!');
        }
        else
        {
            return redirect()->back()->with('success', 'Staff added successfully!');	
        }
    }


    public function allstaff()
    {
        $ac = Login::select('*')->where('role','staff')->orderBy('id','DESC')->get();
        $i = 1;
        $tb = '';
        foreach($ac as $val){        
            if(!empty($val->image)){
                $img = '<img src="'.url('/').'/public/img/staff/'.$val->image.'" alt="staff" class="img-responsive" style="width: 149px;height: 52px;">';
            } else {
                $img = 'No Image';
            }

            $tb .= 
            '<tr>
                <td>'.$i.'</td>
                <td style="text-align: center;">'.$img.'</td>
                <td style="text-align: center;">'.$val->name.'</td>
                <td style="text-align: center;">'.$val->email.'</td>
                <td style="text-align: center;">'.$val->mobile.'</td>
                <td style="text-align: center;">'.$val->address.'</td>
                <td style="text-align: center;">'.$val->updated_at.'</td>
                <td style="text-align: center;">
                    <div class="btn-group">
                        <button type="submit" value="'.$val->id.'" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                        <button type="submit" value="'.$val->id.'" class="btn btn-warning upd"><i class="fas fa-edit"></i></button>                
                    </div>
                </td>
            </tr>';
            $i++;
        }
        return view('admin.managestaff.allstaff',compact('tb'));
    }

    function delstaff(Request $request){
        $id = $request->delid;
        if(!is_null($id)){
            $clientin = Login::select('*')->where('id',$id)->first(); 
            $filePath = public_path('img/staff/').$clientin->image; 
            if(file_exists($filePath))
            {
                unlink($filePath);
            }
        }
        Login::where('id',$id)->delete();
		return redirect()->back()->with('success','Staff deleted successfully!');
    }

    function updstaff(Request $request){
        $id = $request->upd; 
		$ccv = Login::select('*')->where('id',$id)->first(); 
		return redirect()->route('addstaff')->with('ban' , $ccv );
    }
}
