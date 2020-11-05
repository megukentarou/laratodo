<?php

use Illuminate\Database\Seeder;
use App\Models\Word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Word::class, 50)->create(); //Fakerでダミーデータ50件作成
        
    }
}
