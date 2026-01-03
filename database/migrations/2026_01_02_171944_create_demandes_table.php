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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('prestation_id')->constrained()->onDelete('cascade');
            $table->text('description_besoin');
            $table->text('fonctionnalites_souhaitees')->nullable();
            $table->decimal('budget_estimatif', 10, 2)->nullable();
            $table->string('delai_souhaite')->nullable();
            $table->enum('statut', ['rouge', 'violet', 'bleu', 'vert'])->default('rouge');
            $table->decimal('montant_facture', 10, 2)->nullable();
            $table->boolean('facture_envoyee')->default(false);
            $table->text('notes_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
