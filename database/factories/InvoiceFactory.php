<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer; //import the model
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['B','P','V']); //estados del invoice
        return [
            //
            'customer_id' => Customer::factory(), //cuando llamemos al seeder
            'amount' => $this->faker->numberBetween(100,20000),
            'status' => $status,
            'billed_dated' => $this->faker->dateTimeThisCentury(),
            'paid_dated' => $status == 'P' ? $this->faker->dateTimeThisCentury() : NULL,
        ];
 
    }
}
