<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $guarded = [];

    //om ervoor te zorgen dat uuid getoont word in url
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    //hiermee kunt ge nu de user van een note opvragen
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
