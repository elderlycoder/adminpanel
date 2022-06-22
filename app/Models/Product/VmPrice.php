<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VmPrice extends Model
{   protected $table = "ok_virtuemart_product_prices"; //привязываем таблицу к модели
    protected $connection = 'mysql2';
    protected $primaryKey='virtuemart_product_id';
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(VMProductru::class, 'virtuemart_product_id', 'virtuemart_product_id');
    }
    public function vmproduct(){
        return $this->belongsTo(VMProductru::class, 'virtuemart_product_id', 'virtuemart_product_id');
    }
}
