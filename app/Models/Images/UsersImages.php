<?php

namespace App\Models\Images;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class UsersImages extends Model
{
    use HasFactory;
    protected $fillable =[
        'name' , 'user_id'
    ];

    public function userimage(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
