<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subscription extends Authenticatable
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "SUBSCRIPTION";
}