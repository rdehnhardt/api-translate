<?php

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocalesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('locales')->delete();

        Locale::create([
            'name' => 'pt-BR',
            'label' => 'Portuguese',
            'flag' => 'brazil',
        ]);
    }
}