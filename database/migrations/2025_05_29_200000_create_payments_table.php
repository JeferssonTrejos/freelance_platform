<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('milestone_id')->nullable();
            $table->string('client_id');
            $table->string('freelancer_id');
            $table->decimal('amount', 12, 2);
            $table->decimal('platform_fee', 12, 2)->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('released_at')->nullable();
            $table->timestamp('disputed_at')->nullable();
            $table->string('released_by')->nullable();
            $table->string('disputed_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
