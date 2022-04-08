<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Student;

class studentchecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:student';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete data from student table';

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
        // $users = Student::all();
        $i = 10;
        for($x=0;$x<$i;$x++){
            $student = new Student();
            $student->name = rand(0,100);
            $student->rollno = rand(0,1000);
            $student->save();
        }
        echo 'done';
    }
}
