<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Projects extends Model
{
    use HasFactory;

//    protected function imagen(): Attribute
//    {
//        return Attribute::make(
//            get: fn (string $value) => Storage::disk('files')->get($value),
//        );
//    }
}
