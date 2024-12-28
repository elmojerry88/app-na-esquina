<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "type",
    ];

    protected $primaryKey = "role_id";
    protected $keyType = "string";

    public function users(): BelongsTo
    { 
        return $this->belongsTo(User::class);
    }
}
