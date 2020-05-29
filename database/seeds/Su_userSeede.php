<?php

use Illuminate\Database\Seeder;

class Su_userSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('Su_user')->get()->count() == 0){
            DB::table('Su_user')->insert([
                [
                    'sunametype' => 'admin',
                    'su_pass' => 'admin@1234',
                ],
                [
                    'sunametype' => 'kadmin',
                    'su_pass' => 'kadmin@123',
                ],
                [
                    'sunametype' => 'wadmin',
                    'su_pass' => 'w',
                ]
            ]);
        }
    }
}
