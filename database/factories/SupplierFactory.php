<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

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
            "bank_name"=>$this->faker->randomNumber($nbDigits = 8, $strict = false) ,
            "bank_account_number"=>$this->faker->randomNumber($nbDigits = 9, $strict = false) ,
            "bank_account_owner_name"=>$this->faker->name ,
            "company_name"=>$this->faker->name ,
            "nationality"=>$this->faker->name ,
            "shop_address"=>$this->faker->address ,
            "national_number"=>$this->faker->randomNumber($nbDigits = 8, $strict = false) ,
            "passport_number"=>$this->faker->randomNumber($nbDigits = 8, $strict = false) ,
            "passport_end_date"=> Carbon::now()->format('Y-m-d') ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
