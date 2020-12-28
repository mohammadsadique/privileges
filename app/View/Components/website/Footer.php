<?php

namespace App\View\Components\website;

use Illuminate\View\Component;

use App\Models\SocialLink;
use App\Models\WebChange;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $sl = SocialLink::select('*')->first();
        $wc = WebChange::select('*')->first();
        return view('components.website.footer', compact('sl','wc'));
    }
}
