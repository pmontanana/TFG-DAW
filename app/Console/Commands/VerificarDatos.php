<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Platos;
use App\Models\Menu;
use App\Models\Categoria;
use App\Models\Alergeno;
use App\Models\Mesa;
use App\Models\Turno;
use App\Models\Reserva;

class VerificarDatos extends Command
{
    protected $signature = 'db:verificar';
    protected $description = 'Verifica el estado de los datos en la base de datos';

    public function handle()
    {
        $this->info('=== VERIFICACIÓN DE BASE DE DATOS ===');
        $this->newLine();

        // Usuarios
        $this->info('👤 USUARIOS:');
        $this->line('Total: ' . User::count());
        $this->line('Admins: ' . User::where('role', 'admin')->count());
        $this->line('Usuarios normales: ' . User::where('role', 'user')->count());
        $this->newLine();

        // Categorías
        $this->info('📁 CATEGORÍAS:');
        $categorias = Categoria::withCount('platos')->get();
        foreach ($categorias as $cat) {
            $this->line("- {$cat->nombre}: {$cat->platos_count} platos");
        }
        $this->newLine();

        // Alérgenos
        $this->info('⚠️  ALÉRGENOS:');
        $alergenos = Alergeno::withCount('platos')->get();
        foreach ($alergenos as $alg) {
            $this->line("- {$alg->nombre}: en {$alg->platos_count} platos");
        }
        $this->newLine();

        // Platos
        $this->info('🍽️  PLATOS:');
        $this->line('Total: ' . Platos::count());
        $this->line('Por tipo:');
        $tipos = Platos::selectRaw('tipo, count(*) as total')
            ->groupBy('tipo')
            ->get();
        foreach ($tipos as $tipo) {
            $this->line("- {$tipo->tipo}: {$tipo->total}");
        }
        $this->line('Para llevar: ' . Platos::where('forsale', true)->count());
        $this->line('Solo en local: ' . Platos::where('forsale', false)->count());
        $this->newLine();

        // Menús
        $this->info('📋 MENÚS:');
        $menus = Menu::withCount('platos')->get();
        foreach ($menus as $menu) {
            $this->line("- {$menu->nombre}: {$menu->platos_count} platos");
        }
        $this->newLine();

        // Mesas
        $this->info('🪑 MESAS:');
        $this->line('Total: ' . Mesa::count());
        $capacidades = Mesa::selectRaw('capacidad, count(*) as total')
            ->groupBy('capacidad')
            ->get();
        foreach ($capacidades as $cap) {
            $this->line("- {$cap->capacidad} personas: {$cap->total} mesas");
        }
        $this->newLine();

        // Turnos
        $this->info('🕐 TURNOS:');
        $turnos = Turno::all();
        foreach ($turnos as $turno) {
            $this->line("- {$turno->nombre}: {$turno->hora_inicio} - {$turno->hora_fin}");
        }
        $this->newLine();

        // Reservas
        $this->info('📅 RESERVAS:');
        $this->line('Total: ' . Reserva::count());
        $this->line('Reservas futuras: ' . Reserva::where('fecha', '>=', now())->count());
        $this->line('Reservas pasadas: ' . Reserva::where('fecha', '<', now())->count());
        $this->newLine();

        // Verificación de problemas
        $this->warn('⚡ VERIFICACIÓN DE PROBLEMAS:');

        // Platos sin categoría
        $sin_categoria = Platos::whereNull('categoria_id')->count();
        if ($sin_categoria > 0) {
            $this->error("❌ Hay {$sin_categoria} platos sin categoría");
        } else {
            $this->info("✅ Todos los platos tienen categoría");
        }

        // Platos sin alérgenos
        $sin_alergenos = Platos::doesntHave('alergenos')->count();
        if ($sin_alergenos > 0) {
            $this->warn("⚠️  Hay {$sin_alergenos} platos sin alérgenos asignados");
        } else {
            $this->info("✅ Todos los platos tienen alérgenos asignados");
        }

        // Menús vacíos
        $menus_vacios = Menu::doesntHave('platos')->count();
        if ($menus_vacios > 0) {
            $this->error("❌ Hay {$menus_vacios} menús sin platos");
        } else {
            $this->info("✅ Todos los menús tienen platos asignados");
        }

        $this->newLine();
        $this->info('=== FIN DE VERIFICACIÓN ===');
    }
}
