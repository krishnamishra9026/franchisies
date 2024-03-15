<?php
use App\Models\ChatMessage;
use App\Models\Badge;
use App\Models\HomePageSetting;
  
function dateFormat($date,$format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($format);    
}


function getMobileBGImage(){
    return HomePageSetting::value('mobile_background_image');   
}

function trimString($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}

function checkFileTypeIsImage($path)
{
	$file_ext = false;
	$extension = pathinfo($path, PATHINFO_EXTENSION);
	$imgExtArr = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
	if(in_array($extension, $imgExtArr)){
		$file_ext = true;
	}

	return $file_ext;
}

function getBadgeById($id)
{
	return Badge::where('id', $id)->first();
}

function profileCompletedSponsor()
{
	$user = auth()->user();

	$completed = 'completed';

	if (empty($user->first_name)) {
		return $completed = 'not completed';
	}

	if (empty($user->last_name)) {
		return $completed = 'not completed';
	}

	if (empty($user->username)) {
		return $completed = 'not completed';
	}

	if (empty($user->avatar)) {
		return $completed = 'not completed';
	}

	if (empty($user->city)) {
		return $completed = 'not completed';
	}


	if (empty($user->country)) {
		return $completed = 'not completed';
	}

	if (empty($user->state)) {
		return $completed = 'not completed';
	}

	if (empty($user->phone_number)) {
		return $completed = 'not completed';
	}

	return $completed;
}


function getUnReadSponserMessages()
{
	$user = auth()->user();

	$messages = ChatMessage::where('seen',0)->where(function($query) use($user) {
		$query->where(['sender' => 'Creator', 'receiver' => 'Sponsor', 'message_to' => $user->id]);
	})->count();

	return $messages;
}


function allBadgesPerchagedSponsor()
{
	$badge_ids = auth()->user()->badge_ids;
	if ($badge_ids) {
		$badge_id_count = count(json_decode($badge_ids));
	}else{
		$badge_id_count = 0;
	}
	

	$badge_count = Badge::where('user_type', 'Sponsor')->where('status', 1)->count();
	if ($badge_count == $badge_id_count) {
		return true;
	}else{
		return false;
	}
}


function allBadgesPerchagedCreator()
{
	$badge_ids = auth()->guard('creator')->user()->badge_ids;
	if ($badge_ids) {
		$badge_id_count = count(json_decode($badge_ids));
	}else{
		$badge_id_count = 0;
	}
	
	
	$badge_count = Badge::where('user_type', 'Creator')->where('status', 1)->count();
	if ($badge_count == $badge_id_count) {
		return true;
	}else{
		return false;
	}
}


function getUnReadCreatorMessages()
{
	$user = auth()->guard('creator')->user();

	$messages = ChatMessage::where('seen',0)->where(function($query) use($user) {
		$query->where(['sender' => 'Sponsor', 'receiver' => 'Creator', 'message_to' => $user->id]);
	})->count();

	return $messages;
}

function profileCompletedCreator()
{
	$user = auth()->guard('creator')->user();

	$completed = 'completed';

	if (empty($user->firstname)) {
		return $completed = 'not completed';
	}

	if (empty($user->lastname)) {
		return $completed = 'not completed';
	}

	if (empty($user->username)) {
		return $completed = 'not completed';
	}

	if (empty($user->gender)) {
		return $completed = 'not completed';
	}

	if (empty($user->city)) {
		return $completed = 'not completed';
	}


	if (empty($user->country)) {
		return $completed = 'not completed';
	}

	if (empty($user->state)) {
		return $completed = 'not completed';
	}

	if (empty($user->phone)) {
		return $completed = 'not completed';
	}

	if (empty($user->avatar)) {
		return $completed = 'not completed';
	}

	return $completed;
}

function truncate($string, $length)
{
    if (strlen($string) > $length) {
        return substr($string, 0, $length - 3) . '...';
    }
    return $string;
}


function updateInstagarmData(Request $request)
{
	$creators   = Creator::latest()->where('status', 1)->take(100)->get();

	foreach ($creators as $key => $creator) {

		$phyllo_user_id = $creator->phyllo_user_id;

		if($phyllo_user_id){

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

			if (count($data['data'])) {

				$instagram_followers_count = $data['data'][0]['reputation']['follower_count'];

				Creator::where('id', $id)->update(['instagram_subscribers_or_followers' => $instagram_followers_count]);
			}
		}
	}
}


function updateTiktokData(Request $request)
{
	$creators   = Creator::latest()->where('status', 1)->take(100)->get();

	foreach ($creators as $key => $creator) {

		$phyllo_user_id = $creator->phyllo_user_id;

		if($phyllo_user_id){

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

			if (count($data['data'])) {

				$tiktok_followers_count = $data['data'][0]['reputation']['follower_count'];

				Creator::where('id', $id)->update(['tiktok_subscribers_or_followers' => $tiktok_followers_count]);
			}

			$ch = curl_init();

			
		}
	}
}


function updateYoutubeData(Request $request)
{
	$creators   = Creator::latest()->where('status', 1)->take(100)->get();

	foreach ($creators as $key => $creator) {

		$phyllo_user_id = $creator->phyllo_user_id;

		if($phyllo_user_id){

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

			if (count($data['data'])) {
				$youtube_followers_count = $data['data'][0]['reputation']['subscriber_count'];

				Creator::where('id', $id)->update(['youtube_subscribers_or_followers' => $youtube_followers_count]);
			}          
		}
	}
}

?>