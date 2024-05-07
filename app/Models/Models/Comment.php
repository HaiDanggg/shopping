<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'tbl_comment';
    protected $primarykey = 'com_id';
    protected $guarded = [];
}
