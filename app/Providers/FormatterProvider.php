<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class FormatterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('currency', function($number, $currency = "") {
            return $currency.number_format($number, 2, ',', '.');
        });

        \Blade::directive('currency', function($exp, $currency = "") {
            return "<?php echo Illuminate\Support\Str::currency($exp, $currency); ?>";
        });

        Str::macro('formatPhoneNumber', function($number, $countryCode = 62) {
            $number = preg_replace("/[^0-9]/", '', $number);

            if (substr($number, 0, 1) === "0")
            {
                $number = substr_replace($number, $countryCode, 0, 1);
            }

            return $number;
        });

        Carbon::macro('simpleTime', function($date) {
            if (is_null($date))
            {
                return null;
            }
            return Carbon::parse($date)->translatedFormat('H:i');
        });

        Carbon::macro('simpleDate', function($date) {
            if (is_null($date))
            {
                return null;
            }
            return Carbon::parse($date)->translatedFormat('d M Y');
        });

        \Blade::directive('simpledate', function($exp) {
            return "<?php echo \Illuminate\Support\Carbon::simpleDate($exp); ?>";
        });

        Carbon::macro('simpleDatetime', function($date, $withSecond = false) {
            if (is_null($date))
            {
                return null;
            }
            return Carbon::parse($date)->translatedFormat('d M Y H:i'.($withSecond ? ':s' : ''));
        });

        \Blade::directive('simpledatetime', function($exp, $includeSeconds = false) {
            return "<?php echo \Illuminate\Support\Carbon::simpleDatetime($exp, $includeSeconds); ?>";
        });
    }
}
