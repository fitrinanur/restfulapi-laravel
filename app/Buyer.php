<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;

class Buyer extends User
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
