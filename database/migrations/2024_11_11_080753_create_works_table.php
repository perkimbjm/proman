<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('works', function (Blueprint $table) {
        $table->id();
        $table->integer('year');
        $table->string('name');
        $table->date('contract_date')->nullable();
        $table->string('contract_number');
        $table->foreignId('contractor_id')->constrained();
        $table->foreignId('consultant_id')->constrained();
        $table->foreignId('supervisor_id')->constrained('consultants');
        $table->decimal('contract_value', 15, 2); // Contoh presisi 15 dan skala 2
        $table->decimal('progress', 5, 2)->default(0); // Contoh presisi 5 dan skala 2
        $table->date('cutoff');
        $table->string('status')->default('belum kontrak');
        $table->decimal('paid', 15, 2)->nullable(); // Contoh presisi 15 dan skala 2
        $table->timestamps();
        });

        // Memasukkan constraint status di luar closure
        $types = ['belum kontrak', 'sudah kontrak', 'selesai'];
        $result = join(', ', array_map(function($value) {
        return sprintf("'%s'::character varying", $value);
        }, $types));
        DB::statement("ALTER TABLE works ADD CONSTRAINT works_status_check CHECK (status::text = ANY
        (ARRAY[$result]::text[]))");

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
