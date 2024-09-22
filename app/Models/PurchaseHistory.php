<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'total_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
