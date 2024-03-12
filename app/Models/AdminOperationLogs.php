<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminOperationLogs extends Model
{
	use HasFactory;
	
	public $timestamps = false;
	protected $table = "admin_operation_logs";

}

