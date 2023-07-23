<?php

namespace App\Providers;

use App\Models\Medicine;
use Carbon\Carbon;
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
        //
        Blade::directive('money', function ($amount) {
            return "<?php echo '&#8369;' . number_format($amount, 2); ?>";
        });

        view()->composer('*', function ($view)
        {
            $medicines_global = Medicine::all();
            $currentTimeGlobal = Carbon::now()->subDays(1);
            // dd('hello world');
            /* $user = request()->user();*/

            $view->with([
                'medicines_global' => $medicines_global,
                'currentTimeGlobal' => $currentTimeGlobal,
            ]);
        });
    }
}
