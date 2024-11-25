<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    // protected $fillable = [
    // 'title',
    // 'description',
    // ];

    protected $guarded = ['id'];

     public function fkBuyer()
     {
     return $this->belongsTo(Buyer::class,'buyer_id','id');
     }

     public function fkTransactionDetail()
     {
    //  return $this->hasOne(TransactionDetail::class,'transaction_id','id');
     return $this->hasMany(TransactionDetail::class);
     }

     
}
