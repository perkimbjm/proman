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

        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->decimal('oe');
            $table->decimal('bid_value');
            $table->decimal('correction_value');
            $table->decimal('nego_value');
            $table->foreignId('consultant_id')->constrained();
            $table->date('invite_date');
            $table->date('evaluation_date');
            $table->date('nego_date');
            $table->date('BAHPL_date');
            $table->date('sppbj_date');
            $table->date('spk_date');
            $table->string('account_type');
            $table->string('program');
            $table->integer('duration');
            $table->foreignId('procurement_officer_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
