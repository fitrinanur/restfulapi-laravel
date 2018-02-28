<?php

namespace App;

use App\Scopes\SellerScopes;
use Illuminate\Database\Eloquent\Model;

class Seller extends User
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerScopes);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
