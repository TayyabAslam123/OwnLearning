<?php

namespace App\Console\Commands;
use App\Record;
use DB;
use Illuminate\Console\Command;

class WhatsappTwo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:w2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        // $numbers = Record::all();
        $numbers = DB::table('records')
        ->select(DB::raw('records.id,records.number'))
        ->whereRaw('MOD(id, 2) = 1')
        ->get();

        // dd($numbers);
        foreach($numbers as $x){

            logger('--- API 2 start');
            logger($x->number);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://watverifyapi.live/verify?api_key=API-X-12753939756343038150474252&phones='.$x->number);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            logger('API 2 =>'. $result);
            logger('--- API 2 end');
            if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            }
            curl_close($ch); 

        }


    }
}
