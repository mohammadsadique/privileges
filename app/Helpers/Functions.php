<?php
    
    use App\Models\WebBrand;
    use App\Models\WebBanner;
    use App\Models\PAddCategorie;
    use App\Models\PAddSubCategorie;
    use App\Models\PAddProduct1;
    use App\Models\PAddProduct2;
    use App\Models\PAddProduct3;
    use App\Models\PAttributeName;
    use App\Models\PAttributeValue;
    use App\Models\OfferOnProduct;
    use App\Models\UserReturnReplace;
use App\Models\UserAddToCart;

    use App\Models\WebChange;
    use App\Models\SocialLink;
    use App\Models\UserBuyProduct1;






    // Start
        
    




    function SingleProduct($first,$second,$third){  
        if($first == '' && $second == '' && $third == ''){
            // Home
            $fstRoot = '<div class=" product-items col-xs-4 col-sm-4 col-md-3 col-lg-3" style="display: block;">';
            $btnAdd = '<button type="button" class="addtocart btnCart col-sm-4 pull-right" value="buy1">Add</button>';
            $rand = PAddProduct1::select('*')->where('status',1)->inRandomOrder()->groupBy('subcategorieId')->limit(10)->get();
        }
        elseif($first == '' && $second != '' && $third == ''){
            // Buy Product
            $fstRoot = '<div class=" slider-item ">';
            $btnAdd = '<button type="button" class="addtocart btnCart col-sm-4 pull-right" id="add-cart-42" value="buy1">Add</button>';
            $id = $second;          

            if(Request::segment(1) == 'buyproduct'){
                $p1 = PAddProduct1::select('*')->where('id',$id)->first();
                $rand = PAddProduct1::select('*')->where('status',1)->where('categorieId',$p1->categorieId)->groupBy('subcategorieId')->get();
            } 
            if(trim(Request::segment(1)) == 'allproduct'){
                $rand = PAddProduct1::select('*')->where('status',1)->where('categorieId',$id)->groupBy('subcategorieId')->get();                
            } 
            
        }
        elseif($first == '' && $second == '' && $third != ''){
            // Product
            $fstRoot = '<div class="product-layout product-list col-xs-12">';
            $btnAdd = ' 
                    <button type="button" class="addtocart btnCart" id="add-cart-31" value="buy1">Add</button>
                    
                    <button type="button" class="wishlist pull-right btnwishlist" value="buy1">
                        <i class="fa fa-heart"></i> 
                    </button>
                    ';
            $id = $third; 
            $rand = PAddProduct1::select('*')->where('status',1)->where('categorieId',$id)->groupBy('subcategorieId')->get();
        }
    
        $product = '';        
        foreach($rand as $a){
            $imgName = '';
            $off = '';
            $offer = OfferOnProduct::select('*')->where('p1id',$a->id)->first();
            if($offer != ''){
                $off .= '<p class="tag">'.$offer->percent.'<br> % <br> <i>off</i></p>';
            } else {
                $off .= '<p></p>';
            }
            $outofstock = '';
            if($a->status == 0){
                $outofstock .= '
                    <p class="NoStock" style="background: #84c225;padding: 5px;font-weight: 900;margin-top: 13px;color:white;margin-top: -42px;color: white;position: relative;"> Out Of Stock </p>
                ';
            }


            $id = encrypt($a->id);            
            $checkImg = PAddProduct3::select('*')->where('p1id',$a->id)->count();
            if($checkImg > 0)
            {
                $img = PAddProduct3::select('*')->where('p1id',$a->id)->limit(2)->get();
                $i = 0;                
                foreach($img as $proimg){
                    if($i == 0){                 
                        $product .=
                        $fstRoot.
                        '
                            <div class="product-thumb transition">                            
                                '.$off.'
                                <div class="image">
                                    <div class="first_image"> 
                                        <a href="'.url('/buyproduct').'/'.$id.'"> 
                                            <img src="'.URL('/').'/public/img/product/'.$proimg->image.'" alt="'.$a->productname.'" title="'.$a->productname.'" class="img-responsive"  /> 
                                        </a>
                                    </div>';
                        $imgName .= '<input type="hidden" value="'.$proimg->image.'" class="imgName">';
                    }
                    elseif($i == 1){
                        $product .=
                                    '<div class="swap_image"> 
                                        <a href="'.url('/buyproduct').'/'.$id.'"> 
                                            <img src="'.URL('/').'/public/img/product/'.$proimg->image.'" alt="'.$a->productname.'" title="'.$a->productname.'" class="img-responsive"  /> 
                                        </a>
                                    </div>
                                </div>                        
                        ';
                    }
                    $i++;
                }
            }
            else
            {
                // if image is not inserted then these code will be run.
                $product .=
                $fstRoot.
                '<div class="product-thumb transition">
                    <div class="image">
                        <div class="first_image"> 
                            <a href="'.url('/buyproduct').'/'.$id.'"> 
                                <img src="'.URL('/').'/adminlte3/dist/img/product.png" alt="'.$a->productname.'" title="'.$a->productname.'" class="img-responsive"  /> 
                            </a>
                        </div>
                    </div>
                        ';
            }

            $selopt =  '';
            $mm = PAddProduct1::select('*')->where('subcategorieId',$a->subcategorieId)->groupBy('setattributename')->get();
            foreach($mm as $kk){             
                $po = PAttributeName::select('*')->where('id',$kk->setattributename)->first();
                $selopt .=  '
                <div class="form-group"> 
                    <select name="" class="form-control SelAttibVal">
                        <option value=""> --- Select '.$po->attribname.' --- </option>
                ';

                    $mm2 = PAddProduct1::select('*')->where('categorieId',$kk->categorieId)
                                                    ->where('subcategorieId',$kk->subcategorieId)
                                                    ->where('setattributename',$kk->setattributename)
                                                    ->get();
                    foreach($mm2 as $po2){
                        $x9 = PAttributeValue::select('*')->where('id',$po2->setattributevalue)->first();
                        $selopt .= '<option value="'.$x9->id.'">'.$x9->attribvalue.'  </option>';
                    }

                $selopt .= '
                    </select>
                </div>';                
            }

            if($a->status == 1){
                if($first == '' && $second == '' && $third == ''){
                    // Home
                    $btnAdd = '<button type="button" class="addtocart btnCart col-sm-4 pull-right" value="buy1">Add</button>';
                }
                elseif($first == '' && $second != '' && $third == ''){
                    // Buy Product
                    $btnAdd = '<button type="button" class="addtocart btnCart col-sm-4 pull-right" id="add-cart-42" value="buy1">Add</button>';
                }
               
            
                $btn = $btnAdd;
            } else {
                if($first == '' && $second == '' && $third == ''){
                    // Home
                    $btnAdd = '<button type="button" class="addtocart btnCart col-sm-4 pull-right" value="buy1" style="display:none">Add</button>';
                }
                elseif($first == '' && $second != '' && $third == ''){
                    // Buy Product
                    $btnAdd = '<button type="button" class="addtocart btnCart col-sm-4 pull-right" id="add-cart-42" value="buy1" style="display:none">Add</button>';
                }
                elseif($first == '' && $second == '' && $third != ''){
                    // Product
                    $btnAdd = ' 
                            <button type="button" class="addtocart btnCart" id="add-cart-31" value="buy1" style="display:none">Add</button>
                            
                            <button type="button" class="wishlist pull-right btnwishlist" value="buy1" style="display:none">
                                <i class="fa fa-heart"></i> 
                            </button>
                            ';
                }
                $btn = $btnAdd;
            }
            

            $subcatname = PAddSubCategorie::select('*')->where('id',$a->subcategorieId)->first();
            $nn = PAddProduct2::select('*')->where('p1id',$a->id)->first();
            $product .= ' 
            <div class="outofstock">'.$outofstock.'</div>      
            <div class="product-details">
                <div class="caption">
                    <h4><a href="'.url('/buyproduct').'/'.$id.'">'.$subcatname["subcategorie"].'</a></h4>
                    <p class="price">
                        <span class="price-new">₹ '.IndainCurrency($nn->actualprice).'</span> <span class="price-old">₹ '.IndainCurrency($nn->cutoffprice).'</span>
                    </p>
                    <div id="product-42" class="product_option">
                        '.$selopt .'                                                    
                        <input class="categorieId" value="'.$a->categorieId.'" type="hidden">                           
                        <input class="subcategorieId" value="'.$a->subcategorieId.'" type="hidden">                           
                        <input class="setattributename" value="'.$a->setattributename.'" type="hidden">                     
                        <div class="input-group col-xs-12 col-sm-12 button-group">
                            <label class="control-label col-sm-2 col-xs-2">Qty</label>
                            <input type="number" name="quantity" min="1" max="'.$nn->quantity.'" value="1" size="1" step="1" class="qty form-control col-sm-2 col-xs-9 quantity" />
                            <input class="productId" value="'.$a->id.'" type="hidden">
                            <input class="encryptproductId" value="'.encrypt($a->id).'" type="hidden">
                            <input class="subcategorie" value="'.$subcatname["subcategorie"].'" type="hidden">
                            <input class="productName" value="'.$nn->productname.'" type="hidden">
                            <input class="chooseSelOpt" type="hidden">
                            <input class="price" type="hidden">
                            <input class="maxquantity" value="'.$nn->quantity.'" type="hidden">
                            '.$imgName.'
                            '.$btn.'
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            </div>
            ';
        }

        return $product; 
    }

 

         
// End


    function MyBasket($id){
        $status = '';
        $allitem = '';
        $subot = 0;
    
        $totitem = UserAddToCart::where('userid',$id)->where('status',1)->where('checkbtn','addtocart')->sum('pquantity');
        if($totitem != ''){
            $itemcount = $totitem;
            $status = 'active';
            
            $allitem .= 
                '<li>
                    <table class="table table-striped">
                        <tbody>';
                    $items = UserAddToCart::where('userid',$id)->where('status',1)->where('checkbtn','addtocart')->get();
                    foreach($items as $uu){
                        $p1id = $uu->p1id;
                        $p3 = PAddProduct3::where('p1id',$uu->p1id)->first();
                        $p2 = PAddProduct2::where('p1id',$uu->p1id)->first();
                        $attrVal = PAttributeValue::where('id',$uu->pselOpt)->first();
                        $p1 = PAddProduct1::where('id',$uu->p1id)->first();
                        $subcate = PAddSubCategorie::where('id',$p1->subcategorieId)->first();
                        
                        $subot += $uu->pquantity*$p2->actualprice;
                        
                        $allitem .= 
                        '<tr>
                            <td class="text-center">
                                <a href="'.url('/').'/buyproduct/'.$p1id.'">
                                    <img src="'.url('/').'/public/img/product/'.$p3->image.'" alt="'.$p2->name.'" title="'.$p2->name.'" class="img-thumbnail" style="width:90px;height:90px;"></a>
                            </td>
                            <td class="text-right">'.$subcate->subcategorie.'<br><b>'.$attrVal->attribvalue.'</b></td>
                            <td class="text-right">x $uu->pquantity</td>
                            <td class="text-right">'.$uu->pquantity*$p2->actualprice.'</td>
                            <td class="text-center">
                                <input type="hidden" value="'.$uu->pselOpt.'" class="selOpt">
                                <button type="button" title="Remove" value="'.$uu->p1id.'" class="btn btn-danger btn-xs removeItem">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>';
                    }
                 
            $allitem .=      
                    '
                  </tbody>
                </table>
            </li>';       
            
            
            $allitem .=      
            '
                <li>
                    <div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-right"><strong>Sub-Total</strong></td>
                                    <td class="text-right">'.$subot.'</td>
                                </tr>              
                                <tr>
                                    <td class="text-right"><strong>Total</strong></td>
                                    <td class="text-right">'.$subot.'</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right button-container">
                            <a href="'.url('/').'/view-cart" class="addtocart">
                                <strong>View Cart</strong>
                            </a>
                            <a href="'.url('/').'/checkout/0" class="checkout">
                                <strong>Checkout</strong>
                            </a>
                        </div>
                    </div>
                </li>  
            ';
            
           
        } else {
            $itemcount = 0;
            $allitem .= '<li>
                    <p class="text-center">Your shopping cart is empty!</p>
                </li>';
        }
        //return $allitem;
        $mybask = '
            <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle '.$status.'">
                <span class="cart-text">My basket</span><span class="cart-total">Item '. $itemcount .'</span>
                <span class="cart-total-res">'. $itemcount .'</span>
            </button>
            <a href="'.url('/').'/view-cart" class="addtocart btn '.$status.'">
                <span class="cart-text">My basket</span>
                <span class="cart-total-res">'.$itemcount.'</span>
            </a>
            <ul class="dropdown-menu pull-right jjjj">
               '.$allitem.'
            </ul>
        ';
        return $mybask;
    }
    
    
    

    function SmallMyBasket($id){
        $totitem = UserAddToCart::where('userid',$id)->where('status',1)->where('checkbtn','addtocart')->sum('pquantity');
        $status = ''; 
        $itemcount = ''; 
        if($totitem != ''){
            $itemcount = $totitem;
            $status = 'active';
            
            
        }
            $mybask2 = '
                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle '.$status.'">
                    <span class="cart-text">My basket</span><span class="cart-total">Item '. $itemcount .'</span>
                    <span class="cart-total-res">'. $itemcount .'</span>
                </button>
               
                <ul class="dropdown-menu pull-right">
                   
                </ul>
            ';
            return $mybask2;
        
            
        
    }
    

            
           





    function Menu()
    {        
        //$wc = WebChange::select('*')->first();
        $menu = '';
        $j = 1;
        $cate = PAddCategorie::select('*')->where('status',1)->orderBy('id','DESC')->get();
        foreach($cate as $cval){
            $idnew2 = encrypt($cval['id']);

            $menu .= '
                <li class="main_cat dropdown">
                    <a href="'.url('/product').'/'.$idnew2.'">'.$cval->categorie.'</a>
                    <div class="dropdown-menu megamenu column1">
                        <div class="dropdown-inner">';


                        $i = 1;
                        $cou = PAddSubCategorie::select('*')->where('status',1)->where('categorieid',$cval->id)->count();
                        $subcate = PAddSubCategorie::select('*')->where('status',1)->where('categorieid',$cval->id)->get();
                        
                        foreach($subcate as $scval){
                            if(!empty($scval->subcategorie)){
                                $kit = PAddProduct1::select('*')->where('categorieId',$cval->id)->where('subcategorieId',$scval->id)->first();
                                $idnew3 = encrypt($kit['id']);
                                if($i == 1){
                                    $menu .= '<ul class="list-unstyled childs_'.$i.'">';
                                }
                                else if($i%5 == 0){
                                    $menu .= '<ul class="list-unstyled childs_'.$i.'">';
                                }

                                $menu .=
                                '
                                <li class="main_cat">
                                    <a href="'.url('/buyproduct').'/'.$idnew3.'">'.$scval->subcategorie.'</a>
                                </li>';

                                if($i%4 == 0){
                                    $menu .= '</ul>';                                    
                                }
                                if($cou == $i){
                                    $menu .= '</ul>';      
                                }
                            } else {
                                $menu .=
                                '
                                <div class="menu-image">
                                    <img src="'.URL('/').'/public/img/menuimg/'.$scval->menuimg.'" alt="menu" title="" class="img-thumbnail" />
                                </div>
                                ';
                            }
                            $i++;

                        }      

                $menu .= '
                        </div>
                    </div>
                </li>';

            $j++;
        }
        return $menu;
    }











    function SmallMenu()
    {
        //$wc = WebChange::select('*')->first();
        $smallmenu = '';
        $j = 1;
        $cate = PAddCategorie::select('*')->where('status',1)->orderBy('id','DESC')->get();
        foreach($cate as $cval){
            $idnew2 = encrypt($cval['id']);           

            $smallmenu .=  
                '<li class="collapsed" data-toggle="collapse" data-target="#'.$j.'">
                    <a href="'.url('/product').'/'.$idnew2.'">'.$cval->categorie.'</a>
                    <span><i class="fa fa-plus"></i></span>
                    <ul class="menu-dropdown collapse" id="'.$j.'">';

            $i = 0;
            $cou = PAddSubCategorie::select('*')->where('status',1)->where('categorieid',$cval->id)->count();
            $subcate = PAddSubCategorie::select('*')->where('status',1)->where('categorieid',$cval->id)->get();
            $ko = $cou-1;
            foreach($subcate as $scval){
                if(!empty($scval->subcategorie)){
                    $kit = PAddProduct1::select('*')->where('categorieId',$cval->id)->where('subcategorieId',$scval->id)->first();
                    $idnew3 = encrypt($kit['id']);                
                        $smallmenu .=
                        '
                            <li class="dropdown">
                                <a href="">'.$scval->subcategorie.'</a>                                    
                            </li>
                            ';
                }                
                $i++;
            }

            $smallmenu .=    
                '</ul>
                </li>';
            $j++;
        }
        return $smallmenu;
    }




    function SocialMedia(){
        $sl = SocialLink::select('*')->first();   
        $media = 
        '
        <div class="footer-bottom-section3 footer_social section col-md-4 col-xs-12">
            <div class="section-heading">Social media</div>
            <ul class="social-icon">';
                if(!empty($sl)){
                    if(!empty($sl->facebook)){
                        $media .= 
                        '<li>
                            <a class="facebook" title="Facebook" href="'.$sl->facebook.'" target="_blanks"><i class="fa fa-facebook"></i>&nbsp;</a>
                        </li>';
                    }
                    if(!empty($sl->twitter)){
                        $media .= 
                        '<li>
                            <a class="twitter" title="Twitter" href="'.$sl->twitter.'" target="_blanks"><i class="fa fa-twitter"> </i>&nbsp;</a>
                        </li>';
                    }
                    if(!empty($sl->instagram)){
                        $media .= 
                        '<li>
                            <a class="instagram" title="Instagram" href="'.$sl->instagram.'" target="_blanks"><i class="fa fa-instagram"></i>&nbsp;</a>
                        </li>';
                    }
                    if(!empty($sl->youtube)){
                        $media .= 
                        '<li>
                            <a class="youtube" title="youtube" href="'.$sl->youtube.'" target="_blanks"><i class="fa fa-youtube"> </i>&nbsp;</a>
                        </li>';
                    }
                }
                $media .= 
                '</ul>
            </div>';

        return $media;
    }


    function Foot(){        
        $wc = WebChange::select('*')->first();
        $foo =
        '
        <div class="footer-bottom">
                    <div class="copy-right col-md-12 col-sm-12 col-xs-12">
                        <div id="powered">Powered By <a href="www.tcsoftwareonline.com/"> TC Softwares </a>'. $wc->name.'
                            &copy; '.date('Y') .'</div>
                    </div>
                </div>
        ';
        return $foo;
    }



    function countBuyProduct(){
        $ubp = UserBuyProduct1::where('status',1)->where('checkagree',1)->WhereNull('deliverystatus')->count();
        return $ubp;
    }

    function countReturnProduct(){
        $ubp = UserReturnReplace::WhereNull('status')->count();
        return $ubp;
    }

    function Foot2(){
        $wc = WebChange::select('*')->first();
        $foo2 =
        '<ul class="clearfix collapse" id="dropdown-contact">
            <li class="item">'.$wc->address.'</li>
            <li class="item email">
                <a href="mailto:'.$wc->email.'">'.$wc->email.'</a>
            </li>
            <li class="item call">'.$wc->mobile.'</li>
        </ul>';
        return $foo2;
    }
    function IndainCurrency($amount){
        $amt = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amount);
        return $amt;
    }
    
    
    function headContact(){
        $wc = WebChange::select('*')->first();
        return $wc->mobile;
    }


    function headLogo(){
        $wc = WebChange::select('*')->first();
        if(!empty($wc)){
            $a = '<img src="'.URL('/').'/public/img/logo/'.$wc->image.'" title="'.$wc->name.'" alt="'.$wc->name.'" class="img-responsive" />';
        } else {
            $a = '<img src="'.URL('/').'/website/image/catalog/logo.png" title="Big-market" alt="Big-market" class="img-responsive" />';
        }
        return $a;
    }



    // function sms($number,$message){
    //     $username = "GOBIKE";    
    //     $password = "GOBIKE";
    //     $sender  = "GOBIKE";
    //     $number = $number;
    //     $message = $message;        
        
    //     $url="http://bulksms.saakshisoftware.in/api/mt/SendSMS?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&senderid=".urlencode($sender)."&channel=trans&DCS=0&flashsms=0&text=".urlencode($message)."&route=".urlencode('04'); 
              
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
    // return    $curl_scraped_page = curl_exec($ch);
    //     //print_r($curl_scraped_page);
    //     curl_close($ch);  
    // }

    







?>


























