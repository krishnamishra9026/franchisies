<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class WebhookResponse extends Model
{

	protected $fillable = [
		'name',
		'status',
		'data'
	];
}
