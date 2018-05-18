<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFielsToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->integer('nid')->after('id');
            $table->text('type')->after('nid');
            $table->text('path')->after('type');
            $table->json('content')->after('path');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->dropColumn('nid');
            $table->dropColumn('type');
            $table->dropColumn('path');
            $table->dropColumn('content');
        });
    }
}
