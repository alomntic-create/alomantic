<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'tracking_code', 'total_amount', 'sub_total', 'tax', 'shipping', 'discount', 'status', 'source', 'address_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusHistory()
    {
        return $this->hasMany(StatusHistory::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
