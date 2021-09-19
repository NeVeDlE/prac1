<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function item(){
        return $this->belongsTo('App\Models\store');
    }
    public function item_user(){
    return $this->belongsTo('App\Models\users');
}
}
