<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Moderation'],
            ['id' => 2, 'name' => 'Utilities'],
            ['id' => 3, 'name' => 'Fun'],
            ['id' => 4, 'name' => 'Mechanics'],
            ['id' => 5, 'name' => 'Misc'],
        ];

        foreach ($items as $item)
        {
            \App\Category::UpdateOrCreate(['id' => $item['id']], $item);
        }
    }
}
