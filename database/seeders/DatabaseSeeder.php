<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Create admin
        User::factory()->create(['admin' => 'admin','name' => 'Admin','email' => 'admin@admin.com' , 'password' => 'admin','remember_token' => Str::random(10)]);
//        Db seeding
        User::factory(10)->create()->each(function ($user){
            $user->links()->saveMany(Link::factory(10)->create(['user_id' => $user->id])->each(function ($link){
//                $link->statistic()->save(Statistic::factory()->create(['link_id' => $link->id]));
            }));
        });
    }
}
