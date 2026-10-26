<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuditoriaController; // <- Asegúrate de importar esto
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaboratorioController;

Route::get('/', function () { return redirect()->route('login'); });

Route::middleware(['auth', 'verified'])->group(function () {
    // Solo Administradores pueden gestionar laboratorios
    Route::middleware('role:admin')->group(function () {
        Route::get('/laboratorios', [LaboratorioController::class, 'index'])->name('laboratorios.index');
        Route::post('/laboratorios', [LaboratorioController::class, 'store'])->name('laboratorios.store');
        Route::delete('/laboratorios/{laboratorio}', [LaboratorioController::class, 'destroy'])->name('laboratorios.destroy');
    });
    
    // Todos los roles pueden ver el dashboard (Disponibilidad y sus reservas)
    Route::get('/dashboard', [ReservaController::class, 'index'])->name('dashboard');
    
    // Solo Docentes, Administradores y Delegados pueden registrar/cancelar
    Route::middleware('role:profesor,admin,delegado')->group(function () {
        Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
        Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
    });

    // Solo Supervisores (y Administradores) pueden ver la Auditoría
    Route::middleware('role:supervisor,admin')->group(function () {
        Route::get('/auditoria', [AuditoriaController::class, 'index'])->name('auditoria.index');
    });

    // Rutas de Perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';