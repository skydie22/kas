<?php

namespace App\Providers;

use App\Models\Kas;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });

        $datasMasuk = Kas::where('type' , 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $TotalKas = $datasMasuk - $datasKeluar;
        view()->share('kas', $TotalKas);

    }
}
