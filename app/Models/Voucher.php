<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';
    protected $guarded = ['id'];

     public function fkDiskon()
     {
     return $this->belongsTo(Product::class,'product_id','id');
     }

    //  public function fkVoucherDetail()
    //  {
    //  // return $this->hasOne(TransactionDetail::class,'transaction_id','id');
    //  return $this->hasMany(TransactionDetail::class,);
    //  }
}
