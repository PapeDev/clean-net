<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('clients')->insert([
                'nom' => $faker->firstName,
                'prenom' => $faker->lastName,
                'title' => $faker->title($gender = 'male'|'female'),
                'adresse' => $faker->address,
                'email' => $faker->unique()->email,
                'tel' => $faker->phoneNumber,
                'actif' => $faker->numberBetween(0, 1),
                'estSupprime' => $faker->numberBetween(0, 1),
                'created_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),

            ]);
        }
    }
}
