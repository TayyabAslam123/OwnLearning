<?php
use Illuminate\Database\Seeder;
use App\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Role::truncate();
        factory(Role::class, 100)->create();
        // $entries =[
        //     ['name'=>'admin', 'slug'=>'admin'],
        //     ['name'=>'user', 'slug'=>'user'],
        //     ['name'=>'manager', 'slug'=>'manager'],
        //     ['name'=>'editor', 'slug'=>'editor'],
        //     ['name'=>'social-media', 'slug'=>'social-media'],
        //     ['name'=>'hr', 'slug'=>'hr'],
        //     ['name'=>'supplier', 'slug'=>'supplier']
        // ];
        // ## Loop through
        // foreach($entries as $entry){
        //     $x = new Role();
        //     $x->name = $entry['name'];
        //     $x->slug = $entry['slug'];
        //     $x->save();
        // }
        ## Make log
        logger('Role Seeder Compiled');
    }
}
