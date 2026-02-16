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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            
            // 👤 Informations client
            $table->string('nom_complet');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('entreprise')->nullable();
            
            //  Service demandé
            $table->string('service'); // web, mobile, design, cloud, marketing, security, training, branding, impression, logiciel, communication, autre
            $table->string('autre_service')->nullable(); // Si service = autre
            
            //  Description du projet
            $table->text('message'); // Description du projet
            
            //  Statut de la demande
            $table->enum('statut', [
                'nouveau',
                'en_cours',
                'devis_envoye',
                'accepte',
                'refuse',
                'archive'
            ])->default('nouveau');
            
            // Montant du devis (si généré)
            $table->decimal('montant', 10, 2)->nullable();
            $table->string('numero_devis')->unique()->nullable();
            $table->date('date_validite')->nullable();
            
            // 📎 Pièce jointe
            $table->string('fichier')->nullable(); // Cahier des charges, maquette, etc.
            
            //  Assignation
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('date_traitement')->nullable();
            
            //  Timestamps
            $table->timestamps();
            $table->softDeletes();
            
            // Index
            $table->index(['statut', 'created_at']);
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};