<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected const TABLE_NAME = 'order';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->string('id', 10)->primary()->unique()->comment('訂單編號，唯一碼');
            $table->string('name', 256)->comment('客戶姓名');
            $table->integer('address_id')->comment('客戶地址資料表 id, ref: address.id');
            $table->float('price')->default(0)->comment('訂單金額');
            $table->string('currency', 3)->comment('訂單幣別，三碼全大寫英文，例如 TWD');
            $table->timestamp('created_at')->comment('此筆資料新增時間');
            $table->timestamp('updated_at')->comment('此筆資料更新時間');

            $table->foreign('address_id')->references('id')->on('address');

            $table->comment('客戶訂單');
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
