<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Privileges;
use App\Models\Login;

class Privileges2C extends Controller
{
    public function assignprivilege()
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
                <td style="text-align: center;">'.$val->name.'<input type="hidden" value="'.$val->name.'" class="staffname"></td>
                <td style="text-align: center;">'.$val->email.'</td>
                <td style="text-align: center;">'.$val->mobile.'</td>
                <td style="text-align: center;">
                    <button type="submit" value="'.$val->id.'" class="btn btn-success assignpri"><i class="fas fa-user"></i> Assign Privilege</button>   
                </td>
            </tr>';
            $i++;
        }
        return view('admin.privilege.assignprivilege',compact('tb'));
    }
    
    public function subassignpri(Request $request)
    {
        $id = $request->id;
        $staff = Login::select('*')->where(['id'=>$id,'role'=>'staff'])->first();

        return redirect()->route('staffprivilege',['id' => $staff->id]);
    }

    public function staffprivilege($id)
    {
        $staff = Login::where('id',$id)->first();
        $f = explode(',',$staff->privilege_id);
       


        $mod = '';
        $getmodules = Privileges::where(['status'=>1,'onoff'=>1])->get();
        foreach($getmodules as $getmodule){
          $getsubmods = Privileges::where(['status'=>0,'tag'=>$getmodule->tag,'onoff'=>1])->get();
            $check2 = '';
            if(in_array($getmodule->id , $f)) 
            {
                $check2 = "checked"; 
            }
          $mod .=
          '<div class="col-md-4">
                <br>                
                <div class="card card-success">
                    <div class="card-header">       
                        <div class="icheck-default d-inline" >
                            <input type="checkbox" value="'.$getmodule->tag.'" id="'.$getmodule->id.'" class="selectall" '.$check2.'>
                            <label for="'.$getmodule->id.'"><h3 class="card-title">'.$getmodule->module.'</h3></label>
                        </div>
                    </div>
                    <div class="card-body">';
                    foreach($getsubmods as $getsubmod){
                        $check = '';
                        if(in_array($getsubmod->id , $f)) 
                        {
                            $check = "checked"; 
                        }
                        $mod .=
                        '<div class="row">
                            <div class="col-sm-12">
                              <div class="form-group clearfix">
                                <div class="icheck-success d-inline">
                                  <input type="checkbox" name="'.$getsubmod->tag.'" id="'.$getsubmod->id.'" '.$check.'>
                                  <label for="'.$getsubmod->id.'">'.$getsubmod->submodule.'</label>
                                </div>                     
                              </div>
                            </div>
                        </div>';
                    }
                    $mod .=
                    '</div>
              </div>
          </div>';
        }
        $mod2 = '';
        $c = Privileges::where(['tag'=>0,'onoff'=>1])->get();
        foreach($c as $cc){
            $mod2 .=
            '<div class="col-md-4">
                <br>                
                <div class="card card-success">
                    <div class="card-header">       
                        <div class="icheck-default d-inline" >
                            <input type="checkbox" value="'.$cc->id.'" id="'.$cc->id.'" class="selectall">
                            <label for="'.$cc->id.'"><h3 class="card-title">'.$cc->submodule.'</h3></label>
                        </div>
                    </div>
                </div>
            </div>';
        }
        $hr = '';
        $d = Privileges::where(['tag'=>0,'onoff'=>1])->count();
        if($d > 0){
            $hr = '<div class="col-md-12"><br><hr></div>';
        }

        

        return view('admin.privilege.staffprivilege',compact('mod','mod2','hr','staff'));
    }

}
