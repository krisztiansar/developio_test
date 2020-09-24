<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'subject',
        'customer_id',
        'due_date',
        'content',
        'created_at',
        'status',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
