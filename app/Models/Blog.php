<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'image',
        'views',
        'status',
        'post_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, BlogUser::class);
    }

    public function scopePublished($query)
    {
        $query->where('status', 1);
    }

    protected function getPostDate(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attr) {
                return Carbon::parse($attr['post_date'])->toFormattedDateString();
            }
        );
    }
}
