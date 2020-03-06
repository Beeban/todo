<?php

use App\Legal;
use App\LegalContacts;
use Illuminate\Database\Seeder;

class LegalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Legal::class, 10)->create()->each(function ($legal) {
            $legal->contacts()->saveMany(factory(LegalContacts::class, 3)->make());
        });
    }
}
