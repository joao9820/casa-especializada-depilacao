<?php

use App\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
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
                'name' => 'Casa Especializada em Depilação - Tag. Norte',
                'address' => 'Loja 3/4 - Taguatinga Norte',
                'phone' => '(61) 3352-4265',
                'cell' => '(61) 99934-7852',
            ],
            [
                'id' => 2,
                'name' => 'Casa Especializada em Depilação - Tag. Sul',
                'address' => 'CBS 03 LOTE 07/08 - ED. São José - Taguatinga Sul',
                'phone' => '(61) 3351-8488',
                'cell' => '(61) 99315-9867',
            ],
        ];

        foreach($data as $unit){

            $unt = new Unit();

            $unt->id = $unit['id'];
            $unt->name = $unit['name'];
            $unt->address = $unit['address'];
            $unt->phone = $unit['phone'];
            $unt->cell = $unit['cell'];

            $unt->save();

        }

    }
}
