<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = factory(App\User::class,50)->create();

        $users->each(function(App\User $user) use ($users){
          factory(App\Message::class)
          ->times(20)
          ->create([
            'user_id'=>$user->id,
          ]);

          $user->follows()->sync(
            $users->random(10)
          );

        });

    }
}
