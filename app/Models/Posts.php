<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $fillable = ['content', 'image', 'user_id'];   

    
    public $rules = [

    	'image' => 'max:10000|nullable',
    	'content' => 'nullable',
    	'user_id' => 'required',
    ];



    public function user()
    {

    	return $this->belongsTo(User::class);

    }

}
