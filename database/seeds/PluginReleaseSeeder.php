<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PluginReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'exiled_version' => '2.0.0', 'plugin_version' => '1.0.0', 'download_url' => 'https://www.google.com', 'plugin_id' => 2, 'downloads' => 13, 'created_at' => Carbon::now()->addHours(1)],
            ['id' => 2, 'exiled_version' => '2.0.1', 'plugin_version' => '1.0.1', 'download_url' => 'https://www.google.com', 'plugin_id' => 2, 'downloads' => 12, 'created_at' => Carbon::now()->addHours(2)],
            ['id' => 3, 'exiled_version' => '2.1.0', 'plugin_version' => '1.1.0', 'download_url' => 'https://www.google.com', 'plugin_id' => 2, 'downloads' => 1, 'created_at' => Carbon::now()->addHours(3)],
            ['id' => 4, 'exiled_version' => '2.10.0', 'plugin_version' => '2.0.0', 'download_url' => 'https://www.google.com', 'plugin_id' => 2, 'downloads' => 37, 'created_at' => Carbon::now()->addHours(4)],
            ['id' => 5, 'exiled_version' => '2.0.0', 'plugin_version' => '1.0.0', 'download_url' => 'https://www.google.com', 'plugin_id' => 1, 'downloads' => 13, 'created_at' => Carbon::now()->addHours(1)],
            ['id' => 6, 'exiled_version' => '2.0.1', 'plugin_version' => '1.0.1', 'download_url' => 'https://www.google.com', 'plugin_id' => 3, 'downloads' => 12, 'created_at' => Carbon::now()->addHours(2)],
            ['id' => 7, 'exiled_version' => '2.1.0', 'plugin_version' => '1.1.0', 'download_url' => 'https://www.google.com', 'plugin_id' => 4, 'downloads' => 1, 'created_at' => Carbon::now()->addHours(3)],
            ['id' => 8, 'exiled_version' => '2.10.0', 'plugin_version' => '2.0.0', 'download_url' => 'https://www.google.com', 'plugin_id' => 1, 'downloads' => 37, 'created_at' => Carbon::now()->addHours(4)],
        ];

        foreach ($items as $item)
        {
            \App\PluginRelease::UpdateOrCreate(['id' => $item['id']], $item);
        }
    }
}
