<?php

use App\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'type' => 'email',
                'address' => 'casaespecializadadepilacao@gmail.com',
            ],
            [
                'id' => 2,
                'type' => 'instagram',
                'address' => '@casaespecializadadeplicao'
            ],
            [
                'id' => 3,
                'type' => 'facebook',
                'address' => 'Casa de Depilação'
            ]
        ];

        foreach($data as $media){

            $sm = new SocialMedia();

            $sm->id = $media['id'];
            $sm->type = $media['type'];
            $sm->address = $media['address'];

            $sm->save();

        }

    }

}
