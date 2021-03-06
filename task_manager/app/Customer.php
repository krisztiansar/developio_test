<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'status',
    ];

    public function tasks(){
        return $this->hasMany(Tasks::class, 'costumer_id');
    }
}
