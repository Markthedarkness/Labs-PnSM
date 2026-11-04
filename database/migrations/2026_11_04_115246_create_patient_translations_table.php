<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patient_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->constrained('patients')
                ->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('diagnosis', 255)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['patient_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_translations');
    }
};
