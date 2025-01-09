<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    public function resolveRouteBinding($value, $field = null)
    {
        // Use 'uuid' for dashboard or clientarea routes
        if (request()->is('dashboard/*') || request()->is('admin/*')) {
            return $this->where('uuid', $value)->firstOrFail();
        }

        // Use 'slug' for public routes
        return $this->where('slug', $value)->firstOrFail();
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function course_details()
    {
        return $this->hasMany(CourseDetail::class);
    }
}
