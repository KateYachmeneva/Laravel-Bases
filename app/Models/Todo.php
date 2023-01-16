<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Post
 *
 * @mixin Eloquent
 */
class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = [
        'title',
        'description',
    ];


}
