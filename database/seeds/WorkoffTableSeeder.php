<?php

use Illuminate\Database\Seeder;

class WorkoffTableSeeder extends Seeder {

    public function run()
    {
        DB::table('workoff')->delete();

        $date = new DateTime('2015-03-12');
        
        $workoffs = array(
            array(
                'language_id'   => 1,
                'name'          => 'Nguyen Quynh Mai',
                'position'      => 'BA',
                'department'    => 'SD2',
                'kind'          => 2,
                'reason'        => 'Viec rieng',
                'description'   => 'Cong viec ban giao cho anh Ho',
                'days'          => 1,
                'datestart'     => $date,
                'dateend'       => $date->modify('+1 day'),
                'status'        => 1,
                'user_id'       => 14
            )
        );

        DB::table('workoff')->insert( $workoffs );
    }

}
