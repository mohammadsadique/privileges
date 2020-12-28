<?php

namespace App\View\Components\website;

use Illuminate\View\Component;

use App\Models\WebChange;
use App\Models\PAddCategorie;
use App\Models\PAddSubCategorie;
use App\Models\PAddProduct1;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $mm;

    public function __construct($message)
    {
        $this->mm = $message;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $wc = WebChange::select('*')->first();

        $menu = '';
        $smallmenu = '';
        $j = 1;
        $cate = PAddCategorie::select('*')->orderBy('id','DESC')->get();
        foreach($cate as $cval){
            $idnew2 = encrypt($cval['id']);


            $menu .= '
                <li class="main_cat dropdown">
                    <a href="'.url('/product').'/'.$idnew2.'">'.$cval->categorie.'</a>
                    <div class="dropdown-menu megamenu column1">
                        <div class="dropdown-inner">
                            <ul class="list-unstyled childs_1">';

            $smallmenu .=  
                '<li class="collapsed" data-toggle="collapse" data-target="#'.$j.'">
                    <a href="'.url('/product').'/'.$idnew2.'">'.$cval->categorie.'</a>
                    <span><i class="fa fa-plus"></i></span>
                    <ul class="menu-dropdown collapse" id="'.$j.'">';

            $i = 0;
            $cou = PAddSubCategorie::select('*')->where('categorieid',$cval->id)->count();
            $subcate = PAddSubCategorie::select('*')->where('categorieid',$cval->id)->get();
            $ko = $cou-1;
            foreach($subcate as $scval){
                if(!empty($scval->subcategorie)){
                    $kit = PAddProduct1::select('*')->where('categorieId',$cval->id)->where('subcategorieId',$scval->id)->first();
                    $idnew3 = encrypt($kit['id']);

                    $menu .=
                        '
                        <li class="main_cat">
                            <a href="'.url('/buyproduct').'/'.$idnew3.'">'.$scval->subcategorie.'</a>
                        </li>
                        ';
                        if($i == $ko) :
                            $menu .= '
                                        </ul>
                                    </div>
                                </div>
                            </li>';
                        endif;




                        $smallmenu .=
                        '
                            <li class="dropdown">
                                <a href="">'.$scval->subcategorie.'</a>                                    
                            </li>
                            ';




                } else {
                    if($i == $ko) :
                        $menu .= '</ul>';
                    endif;
                    $menu .=
                    '
                    <div class="menu-image">
                        <img src="'.URL('/').'/public/img/menu/'.$scval->menuimg.'" alt="menu" title="" class="img-thumbnail" />
                    </div>
                    ';
                    if($i == $ko) :
                        $menu .= '
                                  
                                </div>
                            </div>
                        </li>';
                    endif;
                }
                
                $i++;
            }

            $smallmenu .=    
                '</ul>
                </li>';
            $j++;
        }


        return view('components.website.header', compact('wc','menu','smallmenu'));
    }
}
