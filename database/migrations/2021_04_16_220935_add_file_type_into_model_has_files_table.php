<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\FileType;

class AddFileTypeIntoModelHasFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('model_has_files', function (Blueprint $table) {
             $table->string('file_type')->default(FileType::MAIN);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model_has_files', function (Blueprint $table) {
            $table->dropColumn('file_type');
        });
    }
}
