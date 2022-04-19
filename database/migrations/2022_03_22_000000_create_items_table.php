<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('items', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedTinyInteger('category')->comment('Category');
            $table->string('name', 191)->comment('Name');
            $table->string('slug', 191)->comment('Slug');
            $table->string('address', 191)->comment('Address');
            $table->text('description')->comment('Description');
            $table->string('notice', 191)->nullable()->comment('Notice');
            $table->boolean('is_active')->nullable()->comment('Activity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
