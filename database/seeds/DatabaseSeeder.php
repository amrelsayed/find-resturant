<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
    	
    	$meals = App\Meal::insert([
        	['id' => 1, 'name' => 'Chicken Shawarma Sandwich'],
        	['id' => 2, 'name' => 'Chicken Saj'],
        	['id' => 3, 'name' => 'Meat Saj'],
        	['id' => 4, 'name' => 'Chicken BBQ'],
        	['id' => 5, 'name' => 'Cheese Burger'],
        ]);

        App\Resturant::create([
    		'name' => 'Shawerma House',
    		'latitude' => '24.811672',
    		'longitude' => '46.768857',
    		'recommendations' => '15',
    		'successful_orders' => '10',
    	])->meals()->attach([1, 2, 3]);

        App\Resturant::create([
    		'name' => 'Shawerma Palace',
    		'latitude' => '24.797763',
    		'longitude' => '46.740903',
    		'recommendations' => '14',
    		'successful_orders' => '8',
    	])->meals()->attach([1, 2, 3]);
    	
    	App\Resturant::create([
    		'name' => 'Shawermar',
    		'latitude' => '24.811447',
    		'longitude' => '46.626135',
    		'recommendations' => '23',
    		'successful_orders' => '15',
    	])->meals()->attach([1, 2, 3]);

        App\Resturant::create([
    		'name' => 'Basbug Doner',
    		'latitude' => '24.811319',
    		'longitude' => '46.769536',
    		'recommendations' => '5',
    		'successful_orders' => '3',
    	])->meals()->attach([1, 2, 3]);
        
        App\Resturant::create([
    		'name' => 'Dominos Bizza',
    		'latitude' => '24.811915',
    		'longitude' => '46.770075',
    		'recommendations' => '8',
    		'successful_orders' => '6',
        ])->meals()->attach(4);
        
        App\Resturant::create([
    		'name' => 'Herfy',
    		'latitude' => '24.808777',
    		'longitude' => '46.762099',
    		'recommendations' => '9',
    		'successful_orders' => '6',
        ])->meals()->attach(5);	
    }
}
