<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalInvoices extends Model
{
    const STATE_PENDING = 'pending';

    const STATE_CANCELED = 'canceled';

    const STATE_PAID = 'paid';

    const PAYPAL_FEES = 5;
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'payment_id', 'name', 'price', 'EGP', 'state'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
