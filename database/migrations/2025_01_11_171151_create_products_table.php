<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',2000);
            $table->string('slug',2000);
            $table->longText('description');
            $table->foreignId('department_id')
                ->index()->constrained();
            $table->foreignId('category_id')
                ->index()->constrained();
            $table->decimal('price');
            $table->integer('quantity');
            $table->string('stats')->index();
            $table->foreignIdFor(User::class,'created_by');
            $table->foreignIdFor(User::class,'updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
