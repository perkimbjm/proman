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

        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('contractor_id')->constrained();
            $table->foreignId('consultant_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('village_id')->constrained();
            $table->decimal('length');
            $table->decimal('width')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->decimal('real_1', 8, 2)->nullable();
            $table->decimal('real_2', 8, 2)->nullable();
            $table->decimal('real_3', 8, 2)->nullable();
            $table->decimal('real_4', 8, 2)->nullable();
            $table->decimal('real_5', 8, 2)->nullable();
            $table->decimal('real_6', 8, 2)->nullable();
            $table->decimal('real_7', 8, 2)->nullable();
            $table->decimal('real_8', 8, 2)->nullable();
            $table->string('photo_0')->nullable();
            $table->string('photo_50')->nullable();
            $table->string('photo_100')->nullable();
            $table->string('photo_pho')->nullable();
            $table->text('note')->nullable();
            $table->text('note_pho')->nullable();
            $table->json('team')->nullable();
            $table->string('construct_type');
            $table->string('spending_type');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
