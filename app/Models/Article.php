<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'tags', 'published_at', 'introduction', 'text'];
    protected $primaryKey = 'slug';
    protected $keyType = 'string';

    public function user(){
        return $this->belongsTo(User::class);
    }

}
