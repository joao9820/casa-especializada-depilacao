<?php

use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $path = !App::environment('production') ? env('APP_URL') . ':8000/services.json' : secure_asset('services.json');

        $data = file_get_contents($path);

        $services = json_decode($data);

        foreach($services as $serv){

            $s = new Service();

            $s->id = $serv->id;
            $s->service_group_id = $serv->service_group_id;
            $s->name = $serv->name;
            $s->price = $serv->price;

            $s->save();

        }

        $this->command->info(count($services) . ' services created');

    }
}
