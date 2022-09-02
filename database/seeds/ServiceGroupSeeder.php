<?php

use App\ServiceGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Adicionar descrição dos grupos de serviços

        $data = [
            [
                'id' => 1, 'name' => 'Facial', 'audience' => 'M', 'img' => 'assets/images/service-groups/face_male.jpg'
            ],
            [
                'id' => 2, 'name' => 'Facial', 'audience' => 'F', 'img' => 'assets/images/service-groups/face_female.png'
            ],
            [
                'id' => 3, 'name' => 'Corporal', 'audience' => 'M', 'img' => 'assets/images/service-groups/body_male.jpg'
            ],
            [
                'id' => 4, 'name' => 'Corporal', 'audience' => 'F', 'img' => 'assets/images/service-groups/body_female.png'
            ],
            [
                'id' => 5, 'name' => 'Íntima', 'audience' => 'M', 'img' => 'assets/images/service-groups/intimate_region_male.jpg'
            ],
            [
                'id' => 6, 'name' => 'Íntima', 'audience' => 'F', 'img' => 'assets/images/service-groups/intimate_region_female.jpg',
                'img_position' => 'center'
            ]
        ];

        foreach($data as $group){

            $serviceGroup = new ServiceGroup();

            $audience = $group['audience'] == 'M' ? 'masculina' : 'feminina';

            $serviceGroup->id = $group['id'];
            $serviceGroup->name = $group['name'];
            $serviceGroup->audience = $group['audience'];
            $serviceGroup->img = $group['img'];
            $serviceGroup->slug = Str::of($group['name'] . '-' . $audience)->slug('-', 'pt-BR');

            if(array_key_exists('img_position', $group)){
                $serviceGroup->img_position = $group['img_position'];
            }

            $serviceGroup->save();

        }

    }
}
