<?php
// database/migrations/2025_01_10_100001_add_categoria_id_to_platos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::table('platos', function (Blueprint $table) {
$table->foreignId('categoria_id')->nullable()->constrained('categorias');
$table->boolean('forsale')->default(true);
});
}

public function down(): void
{
Schema::table('platos', function (Blueprint $table) {
$table->dropForeign(['categoria_id']);
$table->dropColumn(['categoria_id', 'forsale']);
});
}
};
