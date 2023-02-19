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
        Schema::table('events', function (Blueprint $table) {
            $table->string('name', 15);
            $table->text('description');
            $table->text('location');
            $table->date('date');
            $table->time('hour');
            $table->text('tags');
            $table->boolean('visible')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('location');
            $table->dropColumn('date');
            $table->dropColumn('hour');
            $table->dropColumn('tags');
            $table->dropColumn('visible');
        });
    }
};
