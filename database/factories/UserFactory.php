<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name,
            'lastName' => $this->faker->lastName,
            'company'=> $this->faker->company,
            'email'=> $this->faker->unique()->safeEmail,
            'password'=>bcrypt("123123123"),
            'phone'=> $this->faker->phoneNumber,
            'discount'=> $this->faker->randomDigit,
            'businessName'=> $this->faker->company,
            'cfdi'=> $this->faker->randomElement(['Uso general', 'Gastos en general', 'Adquisición de mercancias']),
            'rfc'=> $this->faker->randomElement(['REBE961025HZ4', 'MAYO951232D24', 'GOME951232D24', 'GOME951232D24']),
            'type'=> $this->faker->randomElement(['Fisico', 'Moral']),
            'location'=> $this->faker->randomElement(['Bodega GDL','Bodega CDMX','Tienda']),
            'role'=> $this->faker->randomElement(['Administrador','Vendedor','Mayorista','Coordinador de Almacen','Encargado de Facturacion']),
            'status'=>1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
