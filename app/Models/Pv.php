<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pv extends Authenticatable
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "PV";
}