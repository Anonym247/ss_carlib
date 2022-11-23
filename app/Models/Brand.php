<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use CrudTrait;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];
}
