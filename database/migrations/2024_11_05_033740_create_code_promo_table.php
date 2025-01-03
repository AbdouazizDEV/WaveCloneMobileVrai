<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('code_promo', function (Blueprint $table) {
            $table->id();
            $table->string('libelle', 50)->nullable();
            $table->decimal('taux', 5, 2)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_promo');
    }
};
