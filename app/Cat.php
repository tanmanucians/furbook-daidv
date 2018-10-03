<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	/**
	 * White list column of cats table
	 */
	protected $fillable = [
		'name',
		'date_of_bith',
		'breed_id',
	];

    public function breed() {
        return $this->belongsTo('Furbook\Breed', 'breed_id', 'id');
    }
}
