<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['company'];

    public function company() {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
