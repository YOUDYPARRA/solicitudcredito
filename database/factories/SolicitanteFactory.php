<?php

namespace Database\Factories;

use App\Models\Solicitante;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solicitante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres'=>$this->faker->name,
            'apellidos'=>$this->faker->lastName,
            'domicilio'=>$this->faker->address,
            'monto'=>$this->faker->numberBetween(1000,10000),
            'curp'=>$this->faker->name,
            'rfc'=>$this->faker->name,
            'nss'=>$this->faker->randomNumber(4),
            'habilitado'=>$this->faker->boolean(2)

            //
        ];
    }
}
