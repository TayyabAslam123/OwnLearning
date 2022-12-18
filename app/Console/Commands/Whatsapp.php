<?php

namespace App\Console\Commands;
use App\Record;
use DB;
use Illuminate\Console\Command;

class Whatsapp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:w1';

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
        ->whereRaw('MOD(id, 2) = 0')
        ->get();

        // dd($numbers);
        foreach($numbers as $x){

            logger('--- API 1 start');
            logger($x->number);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://watverifyapi.live/verify?api_key=API-X-29442328030320198524098206&phones='.$x->number);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            logger('API # 1 => '.$result);
            if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            logger('--- API 1 end');
        }
        // for($i=0;$i<100;$i++){
        //     logger('Command one');
        //     sleep(5);
        //     $start = microtime(true);
        //     logger('one:' .$start);           
        // }

    }
}
