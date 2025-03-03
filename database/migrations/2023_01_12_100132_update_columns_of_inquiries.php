<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->integer('hookheight')->after('eaves_height')->nullable();
            $table->integer('craneload')->after('eaves_height')->nullable();
            $table->integer('snowload')->after('eaves_height')->nullable();
            $table->dropColumn('raster');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('snowload');
            $table->dropColumn('craneload');
            $table->dropColumn('hookheight');
            $table->integer('raster')->after('width')->nullable();
        });
    }
};
