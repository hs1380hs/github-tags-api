<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = ['github_id', 'name', 'description', 'url', 'language'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'repository_tag');
    }
}
