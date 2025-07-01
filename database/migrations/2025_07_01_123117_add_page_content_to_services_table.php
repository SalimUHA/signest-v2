<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // On ajoute une colonne de type JSON, qui peut contenir toute notre structure.
            // 'after' est juste pour la propreté, pour la placer après la colonne 'content'.
            $table->json('page_content')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('page_content');
        });
    }
};
