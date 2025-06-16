<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\FilialController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 👉 Rota que estava faltando:
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::resource('movimentacoes', MovimentacaoController::class)->middleware('auth');



Route::middleware(['auth'])->group(function () {
    Route::resource('movimentacoes', MovimentacaoController::class)->only([
        'index', 'create', 'store'
    ]);
});
Route::resource('filiais', FilialController::class);
Route::resource('formas-pagamento', FormaPagamentoController::class);




require __DIR__.'/auth.php';
