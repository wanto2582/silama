<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Surat\PengajuanSurat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register custom Blade directive for Roman numerals
        Blade::directive('romanMonth', function ($month = null) {
            return "<?php
                \$romanMonths = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
                \$monthNumber = $month ?: \\Carbon\\Carbon::now()->format('n');
                echo \$romanMonths[\$monthNumber];
            ?>";
        });

        // Register helper function globally
        if (!function_exists('toRomanMonth')) {
            function toRomanMonth($month = null)
            {
                $romanMonths = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
                $monthNumber = $month ?: \Carbon\Carbon::now()->format('n');
                return $romanMonths[$monthNumber];
            }
        }

        // View Composer for header notifications
        View::composer('components.header', function ($view) {
            $pendingCount = 0;
            $pendingNotifications = collect();

            // Check if user is authenticated
            if (auth()->check()) {
                $userRole = auth()->user()->roles->first()->id;
                // dd($userRole);

                // Role 3 (Staff) - Show "Diproses" notifications
                if ($userRole == 3) {
                    $pendingCount = PengajuanSurat::where('status', 'Diproses')->count();

                    $pendingNotifications = PengajuanSurat::with(['users', 'detail_surats_notifikasi'])
                        ->where('status', 'Diproses')
                        ->latest()
                        ->limit(5)
                        ->get();
                }

                // Role 2 (Kades) - Show "Dikonfirmasi" notifications
                elseif ($userRole == 2) {
                    $pendingCount = PengajuanSurat::where('status', 'Dikonfirmasi')->count();

                    $pendingNotifications = PengajuanSurat::with(['users', 'detail_surats_notifikasi'])
                        ->where('status', 'Dikonfirmasi')
                        ->latest()
                        ->limit(5)
                        ->get();
                }
            }

            $view->with([
                'pendingCount' => $pendingCount,
                'pendingNotifications' => $pendingNotifications
            ]);
        });
    }
}
