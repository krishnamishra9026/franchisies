<?php

namespace App\Http\Controllers\Creator\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creator;
use Intervention\Image\Facades\Image;
use App\Models\Badge;

class AccountSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }

    public function accountSetting()
    {
        $creator = auth()->user();

        if(empty($creator->phyllo_user_id) || empty($creator->phyllo_token) || empty($creator->uid)) {

            if (empty($creator->uid)) {
                $uid = md5(rand(1, 10) . microtime());
                Creator::where('id', $creator->id)->update(['uid' => $uid]);
            }else{
                $uid =$creator->uid;
            }

            $input['uid'] = md5(rand(1, 10) . microtime());

            $phyllo_user_id = $this->createPhylloUser($creator->firstname.' '.$creator->lastname, $uid);

            $phyllo_token = $this->createPhylloToken($phyllo_user_id);

            Creator::where('id', $creator->id)->update(['phyllo_user_id' => $phyllo_user_id, 'phyllo_token' => $phyllo_token]);
        }


        $phyllo_user_id = $creator->phyllo_user_id;
        $id = $creator->id;

        if($phyllo_user_id){

            //tiktok

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id='.$phyllo_user_id.'&work_platform_id=de55aeec-0dc8-4119-bf90-16b3d1f0c987'); 

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $headers = array();
            $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
      

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $data = json_decode($result, true);                
                  
            if (isset($data) && isset($data['data']) && count($data['data']) > 0) {

                $tiktok_followers_count = $data['data'][0]['reputation']['follower_count'];

                Creator::where('id', $id)->update(['tiktok_subscribers_or_followers' => $tiktok_followers_count, 'tiktok_connected' => 1]);
            }

            $ch = curl_init();

            //youtube

            curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id='.$phyllo_user_id.'&work_platform_id=14d9ddf5-51c6-415e-bde6-f8ed36ad7054'); 

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $headers = array();
            $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $data = json_decode($result, true);

            if (isset($data) && isset($data['data']) && count($data['data']) > 0) {
                $youtube_followers_count = $data['data'][0]['reputation']['subscriber_count'];

                Creator::where('id', $id)->update(['youtube_subscribers_or_followers' => $youtube_followers_count, 'youtube_connected' => 1]);
            }          


            // instagram
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/profiles?user_id='.$phyllo_user_id.'&work_platform_id=9bb8913b-ddd9-430b-a66a-d74d846e6c66');

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $headers = array();
            $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $data = json_decode($result, true);

                  // echo '<pre>'; print_r($data); echo '</pre>'; exit();
                  

            if (isset($data['data']) && count($data['data'])) {

                $instagram_followers_count = $data['data'][0]['reputation']['follower_count'];

                Creator::where('id', $id)->update(['instagram_subscribers_or_followers' => $instagram_followers_count, 'instagram_connected' => 1]);
            }
        }

        $user = Creator::find($id);

        $badge_ids = Creator::where('id', auth()->guard('creator')->user()->id)->value('badge_ids');
        $badge_ids = json_decode($badge_ids);
        $badges = Badge::latest()->where(['user_type' => 'Creator', 'status' =>1])->get();

        /*$allow = ['jpg','jpeg','png','gif','bmp','webp'];
        foreach ($badges as $badge) {
            $_img = $badge->icon ? ('storage/uploads/badges/orignal/original_' .$badge->icon) : ('assets/images/restaurant-thumbnail.png');
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
        }

              echo '<pre>'; print_r($badges); echo '</pre>'; exit();*/
              

        return view('creator.auth.account-setting', compact('badges', 'badge_ids', 'user'));
    }

    public function createPhylloUser($name, $uid)
    {
        $post_data = [ 'name' => $name, 'external_id' => $uid];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/users');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

        $headers = array();
        $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($result, true);              

        return $data['id'];       
    }


    public function createPhylloToken($uid)
    {
        $ch = curl_init();

        $data_post = ['user_id' => $uid, 'products' => ['IDENTITY', 'IDENTITY.AUDIENCE', 'ENGAGEMENT', 'ENGAGEMENT.AUDIENCE', 'INCOME', 'ACTIVITY']];

        curl_setopt($ch, CURLOPT_URL, env('INSIGHTIQ_URL').'/v1/sdk-tokens');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_post));

        $headers = array();
        $headers[] = 'Authorization: Basic '.base64_encode(env('INSIGHTIQ_ID').':'.env('INSIGHTIQ_SECRET'));
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $data = json_decode($result, true);

        return $data['sdk_token'];       
    }
}
