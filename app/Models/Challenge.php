<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'competition_id'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
