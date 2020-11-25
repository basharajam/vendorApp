<?php

namespace Database\Factories;

use App\Models\SupplierManager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


class SupplierManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupplierManager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "first_name" =>$this->faker->name ,
            "last_name"=>$this->faker->name ,
            "email"=>$this->faker->email ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
