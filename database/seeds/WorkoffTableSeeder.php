<?php

use Illuminate\Database\Seeder;

class WorkoffTableSeeder extends Seeder {

    public function run()
    {
        DB::table('workoff')->delete();

        $workoffs = array(
            array(
                'language_id'   => 1,
                'name'          => 'Nguyen Quynh Mai',
                'position'      => 'BA',
                'department'    => 'SD2',
                'reason'        => 'Viec rieng',
                'description'   => 'Cong viec ban giao cho anh Ho',
                'days'          => 1,
                'datestart'     => new DateTime,
                'dateend'       => new DateTime('+1 days'),
                'status'        => 1,
                'user_id'       => 3
            ),
            array(
                'language_id'   => 1,
                'name'          => 'Pham Van Quy',
                'position'      => 'DEV',
                'department'    => 'SD2',
                'reason'        => 'Nghi om',
                'description'   => 'Cong viec ban giao cho Thainq',
                'days'          => 2,
                'datestart'     => new DateTime,
                'dateend'       => new DateTime('+2 days'),
                'status'        => 1,
                'user_id'       => 4
            )
        );

        DB::table('workoff')->insert( $workoffs );
    }

}
