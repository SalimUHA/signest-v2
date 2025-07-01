<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Les champs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'icon',
        'color',
        'page_content', // <-- 1. ON AJOUTE NOTRE NOUVEAU CHAMP ICI
    ];

    /**
     * Les conversions de types pour les attributs.
     * C'est ici que la magie opère.
     */
    protected $casts = [
        // 2. ON AJOUTE CETTE LIGNE
        'page_content' => 'array',
    ];
}
