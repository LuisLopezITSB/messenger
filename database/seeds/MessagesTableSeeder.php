<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'from_id' => 1,
            'to_id' => 2,
            'content' => 'Hola, Como estas?',            
        ]);
        Message::create([
            'from_id' => 2,
            'to_id' => 1,
            'content' => 'Bien, gracias. Y tú?',            
        ]);

        Message::create([
            'from_id' => 1,
            'to_id' => 3,
            'content' => 'Hola, a los tiempos',            
        ]);
        Message::create([
            'from_id' => 3,
            'to_id' => 1,
            'content' => 'Qué, tal!',            
        ]);
    }
}
