<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];
    protected $cascadeDeletes = ['employees'];

    public function employees() {
        return $this->hasMany(Employees::class, 'company_id');
    }
}
