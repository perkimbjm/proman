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
        Schema::disableForeignKeyConstraints();

        Schema::create('consol_spv_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consolidation_id')->constrained('consol_spvs');
            $table->decimal('budget', 12, 2);
            $table->string('name');
            $table->decimal('nego_value', 12, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consol_spv_details');
    }
};
