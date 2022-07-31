<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTestCat extends Model
{
    use HasFactory;
    public $table = "labtest";
    public $fillable = [ 'cat_name','department',
    'price',
    'status'];

}
