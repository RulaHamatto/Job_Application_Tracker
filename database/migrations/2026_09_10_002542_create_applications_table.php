<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            // المستخدم صاحب طلب التوظيف
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // الشركة التي تم التقديم عليها
            $table->foreignId('company_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // معلومات الوظيفة
            $table->string('job_title');
            $table->string('job_type')->nullable();
            $table->string('location')->nullable();

            // تاريخ التقديم
            $table->date('application_date');

            // حالة الطلب
            $table->string('status')->default('Applied');

            // الراتب المتوقع
            $table->decimal('salary', 10, 2)->nullable();

            // رابط إعلان الوظيفة
            $table->string('job_url')->nullable();

            // وصف الوظيفة
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};