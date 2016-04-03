<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::create('notifications', function($table) {
      $table->increments('id')->unsigned();

      $table->integer('notable_id');
      $table->string('notable_type');

      $table->integer('recipient_id')->unsigned();
      $table->foreign('recipient_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->nullableTimestamps();
      $table->timestamp('read_at')->nullable();
      $table->boolean('is_read')->default(false);

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {

    Schema::drop('notifications');
  }

}
