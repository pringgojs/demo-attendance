<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BankDetail extends Model
{
    public $timestamps = false;
    protected $table = 'finance_bank_detail';

    public function bank()
    {
        return $this->belongsTo('\App\Models\Bank', 'finance_bank_id');
    }
}
