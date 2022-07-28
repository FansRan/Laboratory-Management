<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'brandname', 'shopname', 'quentity', 'amount', 'document', 'dateofpurches'];
    protected $table = 'inventories';
}
