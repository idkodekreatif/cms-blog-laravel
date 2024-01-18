<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = ['categories_id', 'title', 'slug', 'description', 'img', 'views', 'status', 'published'];

    /**
     * Get the categories that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
