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
        Schema::create('proofpayments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('tenant_id')->constrained();
            $table->string('validator')->nullable();
            $table->string('kode');
            $table->string('nama');
            $table->string('nohp');
            $table->text('ket_by_tenant')->nullable();
            $table->text('ket_by_admin')->nullable();
            $table->integer('nominal')->nullable();
            $table->string('file_bukti')->nullable();
            $table->boolean('confirmed')->default(0);
            $table->text('alasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proofpayments');
    }
};
