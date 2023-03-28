<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class client extends Model
{
    use HasFactory;
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(service::class);
    }
}
