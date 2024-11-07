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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->integer('alquran_hadist')->default(0);
            $table->integer('akidah_akhlak')->default(0);
            $table->integer('fikih')->default(0);
            $table->integer('sejarah_kebudayaan_islam')->default(0);
            $table->integer('pkn')->default(0);
            $table->integer('bahasa_indonesia')->default(0);
            $table->integer('bahasa_inggris')->default(0);
            $table->integer('bahasa_sunda')->default(0);
            $table->integer('bahasa_arab')->default(0);
            $table->integer('matematika')->default(0);
            $table->integer('ipa')->default(0);
            $table->integer('ips')->default(0);
            $table->integer('sbk')->default(0);
            $table->integer('pjok')->default(0);
            $table->integer('izin')->default(0);
            $table->integer('tanpa_keterangan')->default(0);
            $table->integer('sakit')->default(0);
            $table->text('catatan_guru')->nullable();
            $table->string('ranking')->nullable(); 
            $table->string('total')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
