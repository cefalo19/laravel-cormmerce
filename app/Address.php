<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = ['street', 'number', 'city', 'state', 'zip', 'country'];
}
