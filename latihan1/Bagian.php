<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    //
	
	use HasFactory;
	
		protected $connection = '';
		
		protected $table = 'printer.bagians';
		
		public $timestamps = true;
		
		protected $primaryKey = 'idbagian';
		
		public $incrementing = false;
		
		protected $keyType = 'string';
		
		protected $fillable = [
		
			'idbagian',
			'kodebagian',
			'namabagian',
			'statusbagian'
		
		];
}
