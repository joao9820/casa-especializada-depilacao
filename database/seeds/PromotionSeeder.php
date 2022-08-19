<?php

use App\Promotion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PromotionSeeder extends Seeder
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
                "id" => 1, "name" => 'Axilas + 1/2 Pernas + Virilha Simples', "new_price" => 74.90, "active" => 1, "services" => [
                    26, 39, 47
                ]
            ],
            [
                "id" => 2, "name" => 'Buço + Axilas + Virilha Completa', "new_price" => 77.90, "active" => 1, "services" => [
                    10, 26, 48
                ]
            ],
            [
                "id" => 3, "name" => 'Axilas + Virilha Simples + Perna Completa', "new_price" => 89.90, "active" => 0,
                "services" => [
                    26, 47, 38
                ]
            ]
        ];

        DB::beginTransaction();

        try{

            foreach($data as $promo){

                $promotion = new Promotion();

                $promotion->id = $promo['id'];
                $promotion->name = $promo['name'];
                $promotion->new_price  = $promo['new_price'];
                $promotion->active = $promo['active'];
                $promotion->slug =  Str::of($promo['name'])->slug('-', 'pt-BR');

                $promotion->save();

                $promotion->find($promo['id'])->services()->sync($promo['services']);

            }

            DB::commit();
            $this->command->info(count($data) . ' promotions created');

        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}
