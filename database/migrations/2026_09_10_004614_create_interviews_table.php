<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();

            // المقابلة تابعة لطلب توظيف
            $table->foreignId('application_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('date');
            $table->time('time')->nullable();

            // Online / In-person / Phone
            $table->string('type')->nullable();

            $table->string('location')->nullable();

            $table->text('notes')->nullable();

            // Scheduled / Completed / Cancelled
            $table->string('status')->default('Scheduled');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};