<?php

namespace App\Console\Commands;

use App\Models\Creator;
use Illuminate\Console\Command;

class UpdateFbInstaYoutubeProfile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-fb-insta-youtube-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $creators   = Creator::latest()->where('status', 1)->get();

        info("Cron Job running at fb ". now());

        foreach ($creators as $key => $creator) {

            $phyllo_user_id = $creator->phyllo_user_id;

            if($phyllo_user_id){

                $ch = curl_init();

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

                if (isset($data) && !isset($data['error']) && count($data['data'])) {
                    echo $youtube_followers_count = $data['data'][0]['reputation']['subscriber_count'];

                    Creator::where('id', $creator->id)->update(['youtube_subscribers_or_followers' => $youtube_followers_count]);
                }          


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

                if (isset($data) && !isset($data['error']) &&  count($data['data'])) {

                    echo $tiktok_followers_count = $data['data'][0]['reputation']['follower_count'];

                    Creator::where('id', $creator->id)->update(['tiktok_subscribers_or_followers' => $tiktok_followers_count]);
                }

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

                if (isset($data) && !isset($data['error']) &&  count($data['data'])) {

                    echo $instagram_followers_count = $data['data'][0]['reputation']['follower_count'];

                    Creator::where('id', $creator->id)->update(['instagram_subscribers_or_followers' => $instagram_followers_count]);
                }


            }

        }
    }

}
