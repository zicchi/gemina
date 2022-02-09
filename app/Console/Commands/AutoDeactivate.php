<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class AutoDeactivate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menonaktifkan seminar yang tanggal dan jammnya sudah lewat sampai dengan 30mnt';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = Product::where('activated',true)->get();
        $time = now()->subMinutes(30);

        foreach ($products as $product){
            if ($product->date < $time){
                $this->line($product->name.' dinonaktifkan karena sudah lewat');
                $product->activated = false;
                $product->save();
            }
        }
        return 0;
    }
}
