<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'image', 'user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_post', 'posts_id', 'users_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isInvited()
    {
        return $this->users()->where('users_id', auth()->id())->exists();
    }

    public function invite()
    {
        $this->users()->attach(auth()->id());
        $this->increment('visit_count');
    }

    public function cancelInvite()
    {
        $this->users()->detach(auth()->id());
        $this->decrement('visit_count');
    }
}

