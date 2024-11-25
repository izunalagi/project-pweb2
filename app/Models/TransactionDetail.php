<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $guarded = ['id'];
    use HasFactory;

    public function fkTransaction()
    {
    return $this->belongsTo(Transaction::class,'transaction_id','id');
    }
    
    public function fkProduct()
    {
    return $this->belongsTo(Product::class, 'product_id','id');
    }

     public function fkVoucher()
     {
     return $this->belongsTo(Voucher::class,'voucher_id','id');
     }

    // public function fkVoucher()
    // {
    // return $this->belongsTo(Voucher::class, 'voucher_id','id');
    // }
}
