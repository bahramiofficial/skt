<?php

namespace Baloot\Database;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\Province;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertedSlugs = [];
        $provinces = json_decode(file_get_contents(realpath(__DIR__.'/../../storage/cities.json')), true);
        foreach ($provinces as $province) {
            $tempModel = Province::create(['id' => $province['id'], 'name' => trim($province['name'])]);
            City::insert(array_map(function ($city) use ($tempModel, &$insertedSlugs) {
                $slug = trim($city);
                
                $insertedSlugs[] = $slug;

                return ['province_id' => $tempModel->id, 'name' => trim($city), 'slug' => $slug];
            }, $province['cities']));
        }
    }
}
