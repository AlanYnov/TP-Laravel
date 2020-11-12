<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_user', function (Blueprint $table) {
            $table->foreignId('task_id')->unique()->constrained('tasks')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  
            $table->foreignId('user_id')->unique()->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_user', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
            $table->dropForeign('task_id');
            $table->dropColumn('task_id');
        });
    }
}
