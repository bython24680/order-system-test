<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected const TABLE_NAME = 'address';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('city', 256)->comment('城市名稱');
            $table->string('destrict', 256)->comment('鄉鎮名稱');
            $table->string('street', 512)->comment('街道名稱');
            $table->timestamp('created_at')->comment('此筆資料新增時間');
            $table->timestamp('updated_at')->comment('此筆資料更新時間');

            $table->comment('客戶地址');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
