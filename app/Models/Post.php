<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $guarded = [];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function scopeFilter(Builder $builder, string $body): Builder
    {
        if ($body === '') {
            return $builder;
        }

        return $builder->whereHas('comments', function ($query) use ($body) {
            $query->where('body', 'like', '%' . $body . '%');
        })
            ->with('comments', function ($query) use ($body) {
                $query->where('body', 'like', '%' . $body . '%');
            });
    }
}
