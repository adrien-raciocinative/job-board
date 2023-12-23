<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\job;
use App\Models\User;

class JobApplication extends Model
{
    use HasFactory;

    public function job(): BelongsTo
    {
        return $this->belongsTo(job::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
 