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
                'id' => 1, 'name' => 'Face', 'audience' => 'M', 'img' => 'assets/images/service-groups/face_male.jpg'
            ],
            [
                'id' => 2, 'name' => 'Face', 'audience' => 'F', 'img' => 'assets/images/service-groups/face_female.jpg'
            ],
            [
                'id' => 3, 'name' => 'Corpo', 'audience' => 'M', 'img' => 'assets/images/service-groups/body_male.jpg'
            ],
            [
                'id' => 4, 'name' => 'Corpo', 'audience' => 'F', 'img' => 'assets/images/service-groups/body_female.jpg'
            ],
            [
                'id' => 5, 'name' => 'Região Íntima', 'audience' => 'M', 'img' => 'assets/images/service-groups/intimate_region_male.jpg'
            ],
            [
                'id' => 6, 'name' => 'Região Íntima', 'audience' => 'F', 'img' => 'assets/images/service-groups/intimate_region_female.jpg'
            ]
        ];

        foreach($data as $group){

            $serviceGroup = new ServiceGroup();

            $audience = $group['audience'] == 'M' ? 'masc.' : 'fem.';

            $serviceGroup->id = $group['id'];
            $serviceGroup->name = $group['name'];
            $serviceGroup->audience = $group['audience'];
            $serviceGroup->img = $group['img'];
            $serviceGroup->slug = Str::of($group['name'] . ' ' . $audience)->slug('-', 'pt-BR');

            $serviceGroup->save();

        }

    }
}
