<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    protected $table = 'products';

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'string',
    ];

    public static function rules($id = null){
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,out_of_stock',
        ];
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
