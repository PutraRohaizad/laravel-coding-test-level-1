<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'cristiano ronaldo', 'slug' => 'cristiano ronaldo'],
            ['name' => 'lionel messi', 'slug' => 'lionel messi'],
            ['name' => 'ben arfa', 'slug' => 'ben arfa'],
            ['name' => 'joelinton', 'slug' => 'joelinton'],
            ['name' => 'callum wilson', 'slug' => 'callum wilson'],
        ];

        foreach($data as $value){
            $event = new Event();
            $event->name = $value['name'];
            $event->slug = $value['slug'];
            $event->save();
        }
    }
}
