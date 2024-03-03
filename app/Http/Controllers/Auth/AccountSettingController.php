<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Models\Badge;

class AccountSettingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accountSetting()
    {

        $user = User::find(auth()->user()->id);

        $badge_ids = User::where('id', auth()->user()->id)->value('badge_ids');
        $badge_ids = json_decode($badge_ids);
        $badges = Badge::latest()->where(['user_type' => 'Sponsor', 'status' =>1])->get();

        /*$allow = ['jpg','jpeg','png','gif','bmp','webp'];
        foreach ($badges as $badge) {
            $_img = $badge->icon ? ('storage/uploads/badges/original/original_' .$badge->icon) : ('assets/images/restaurant-thumbnail.png');
            if( file_exists($_img) ){
                $ext = pathinfo($_img, PATHINFO_EXTENSION);
                if(!in_array($ext,$allow) ){
                    $badge->icon = asset($_img);
                } else {
                    $img = Image::make($_img);
                    $img->resize(64, 64);
                    $badge->icon = (string) $img->encode('data-url',80);
                }
            }
        }*/

              // echo '<pre>'; print_r($badges); echo '</pre>'; exit();

        if (profileCompletedSponsor() == 'completed') {
            if (str_contains(url()->previous(), '/login')) { 
                return redirect()->intended('home');
            }else{
                return view('auth.account-setting', compact('badges', 'badge_ids', 'user'));
            }
        }else{

            return view('auth.account-setting', compact('badges', 'badge_ids', 'user'));
        }
    }

}
