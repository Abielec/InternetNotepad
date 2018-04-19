<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             CategoiresSeeder::class,
             TableUsersSeed::class,
             PersonTables::class,
             GirtsTableSeed::class,
             PostsTableSeed::class,
         ]);
    }
}
