<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->decimal('balance', 12, 2)->default(0);
            $table->decimal('commission_rate', 8, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['balance', 'commission_rate']);
        });
    }
};