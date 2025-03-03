<?php

use App\Constants\Permissions;
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
        $tableNames = config('permission.table_names');

        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->longText('description')->nullable()->after('id');
            $table->string('title')->nullable()->after('id');
        });

        Schema::table($tableNames['permissions'], function (Blueprint $table) {
            $table->longText('description')->nullable()->after('id');
            $table->string('title')->nullable()->after('id');
            $table->string('group')->after('description');
            $table->foreignUuid('parent_id')->nullable()->default('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
        Schema::table($tableNames['permissions'], function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('parent_id');
            $table->dropConstrainedForeignId('parent_id');
        });
    }
};
