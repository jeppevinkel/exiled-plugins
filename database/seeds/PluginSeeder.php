<?php

use Illuminate\Database\Seeder;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Test Plugin', 'description' => 'This is a smol test plugin Yay <3', 'user_id' => 3, 'category_id' => 1],
            ['id' => 2, 'name' => 'Another Plugin', 'description' => 'This has short desc', 'user_id' => 3, 'category_id' => 1],
            ['id' => 3, 'name' => 'AdminStuffs', 'description' => 'This is me', 'user_id' => 3, 'category_id' => 1],
            ['id' => 4, 'name' => 'SomeThings', 'description' => 'It\'s a me!', 'user_id' => 3, 'category_id' => 3],
        ];

        foreach ($items as $item)
        {
            \App\Plugin::UpdateOrCreate(['id' => $item['id']], $item);
        }
    }
}
