<?php
use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('username', 64);
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('is_admin')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('remember_token');
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function($t)
        {
            $t->string('email');
            $t->string('token');
            $t->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }

}
