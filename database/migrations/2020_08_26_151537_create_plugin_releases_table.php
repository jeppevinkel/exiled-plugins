<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePluginReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plugin_releases', function (Blueprint $table) {
            $table->id();
            $table->string('exiled_version');
            $table->string('plugin_version');
            $table->string('download_url');
            $table->unsignedInteger('downloads')->default(0);
            $table->foreignId('plugin_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plugin_releases');
    }
}
