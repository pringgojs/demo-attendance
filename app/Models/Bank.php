<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bank extends Model
{
    public $timestamps = false;
    protected $table = 'finance_bank';

    public function details()
    {
        return $this->hasMany('App\Models\BankDetail', 'finance_bank_id');
    }
}
