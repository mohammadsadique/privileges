<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Privileges;

class PrivilegesC extends Controller
{
    public function showprivilege()
    {
        $mod = '';
        $getmodules = Privileges::where(['status'=>1,'onoff'=>1])->get();
        foreach($getmodules as $getmodule){
          $getsubmods = Privileges::where(['status'=>0,'tag'=>$getmodule->tag,'onoff'=>1])->get();
          $mod .=
          '<div class="col-md-4">
                <br>                
                <div class="card card-success">
                    <div class="card-header">       
                        <div class="icheck-default d-inline" >
                            <input type="checkbox" value="'.$getmodule->tag.'" id="'.$getmodule->id.'" class="selectall">
                            <label for="'.$getmodule->id.'"><h3 class="card-title">'.$getmodule->module.'</h3></label>
                        </div>
                    </div>
                    <div class="card-body">';
                    foreach($getsubmods as $getsubmod){
                        $mod .=
                        '<div class="row">
                            <div class="col-sm-12">
                              <div class="form-group clearfix">
                                <div class="icheck-success d-inline">
                                  <input type="checkbox" name="'.$getsubmod->tag.'" id="'.$getsubmod->id.'">
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
        
        
        return view('admin.privilege.showprivilege',compact('mod'));
    }

    public function addpages()
    {
        $i = 1;
        $tb = '';
        $t = Privileges::where('status',1)->get();
        foreach($t as $val){
          if($val->onoff == 1){
              $btn = '<button type="submit" class="btn btn-success">Show</button>';
          } else {
              $btn = '<button type="submit" class="btn btn-secondary">Hide</button>';
          }
          $tb .= 
          '<tr>
              <td>'.$i.'</td>
              <td style="text-align: center;">'.$val->module.'</td>
              <td style="text-align: center;">'.$val->updated_at.'</td>
              <td style="text-align: center;">'.$btn.'</td>
              <td style="text-align: center;">
                  <div class="btn-group">
                      <button type="submit" value="'.$val->id.'" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                      <button type="submit" value="'.$val->id.'" class="btn btn-warning upd"><i class="fas fa-edit"></i></button>                
                  </div>
              </td>
          </tr>';
          $i++;
        }

        $mod = '<option value="">Select Module</option><option value="">No Module</option>';
        $f = Privileges::where(['status'=>1,'onoff'=>1])->get();
        foreach($f as $val){
            $mod .= '            
            <option value="'.$val->id.'">'.$val->module.'</option>
            ';
        }


        $i2 = 1;
        $tb2 = '';
        $t2 = Privileges::where('status',0)->get();
        foreach($t2 as $val){
          if($val->onoff == 1){
            $btn = '<button type="submit" class="btn btn-success">Show</button>';
          } else {
              $btn = '<button type="submit" class="btn btn-secondary">Hide</button>';
          }
          $c = Privileges::where('id',$val->tag)->first();
          $tb2 .= 
          '<tr>
              <td>'.$i2.'</td>
              <td style="text-align: center;">'.$c->module.'</td>
              <td style="text-align: center;">'.$val->submodule.'</td>
              <td style="text-align: center;">'.$btn.'</td>
              <td style="text-align: center;">
                  <div class="btn-group">
                      <button type="submit" value="'.$val->id.'" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                      <button type="submit" value="'.$val->id.'" class="btn btn-warning upd"><i class="fas fa-edit"></i></button>                
                  </div>
              </td>
          </tr>';
          $i2++;
        }


        return view('admin.privilege.addpages',compact('tb','mod','tb2'));
    }

    public function subaddmodule(Request $request)
    {
        $valid = $request->validate([
          'module' => 'required|string',
        ]);
        $ee = new Privileges;     
        $ee->module = $request->module;
        $ee->status = 1;
        $ee->onoff = 1;
        $ee->created_at = date('Y-m-d H:i:s'); 
        $ee->updated_at = date('Y-m-d H:i:s');
        $ee->save();

        $r = Privileges::orderBy('id','DESC')->limit(1)->first();
        $ee2 = Privileges::find($r->id);
        $ee2->tag = $r->id;
        $ee2->save();

        return redirect()->back()->with('success', 'Module added successfully!');	
    }

    public function subaddsubmodule(Request $request)
    {
        $valid = $request->validate([
          'selmodule' => 'required|string',
          'submodule' => 'required|string',
        ],
        [
            'selmodule.required' => 'The module field is required.'
        ]);

        $ee = new Privileges; 
        $ee->submodule = $request->submodule;
        $ee->status = 0;
        $ee->tag = $request->selmodule;
        $ee->onoff = 1;
        $ee->created_at = date('Y-m-d H:i:s'); 
        $ee->updated_at = date('Y-m-d H:i:s');
        $ee->save();

        return redirect()->back()->with('success', 'Sub Module added successfully!');	
    }

}






























