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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // اسم العسل
            $table->decimal('price', 10, 2);     // السعر
            $table->string('stock_status');      // حالة التوفر (متوفر / غير متوفر)
            $table->decimal('rating', 2, 1)->nullable(); // التقييم (مثلاً 4.5)
            $table->text('description')->nullable(); // الوصف
            $table->string('image')->nullable();     // الصورة
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
