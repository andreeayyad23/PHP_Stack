<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id()->comment('Unique identifier for the destination');
            $table->integer('number_of_persons')->comment('Number of persons in the destination'); // Changed to integer
            $table->text('description')->nullable()->comment('Description of the destination');
            $table->string('location')->comment('Location of the destination');
            $table->foreignId('user_id')->constrained('users')->comment('Foreign key referencing the person associated with the destination');
            $table->date('start_date')->comment('Start date of the destination');
            $table->date('end_date')->comment('End date of the destination');
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
        Schema::dropIfExists('destinations');
    }
}