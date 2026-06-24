<?php

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
    Schema::table('users', function (Blueprint $table) {

        $table->string('apellidos')->nullable()->after('name');

        $table->string('dni', 8)
              ->nullable()
              ->unique()
              ->after('apellidos');

        $table->string('telefono', 20)
              ->nullable()
              ->after('dni');

        $table->enum('genero', [
            'Masculino',
            'Femenino'
        ])->nullable()->after('telefono');

    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('users', function (Blueprint $table) {

        $table->dropColumn([
            'apellidos',
            'dni',
            'telefono',
            'genero'
        ]);

    });
}
};
