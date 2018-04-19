<?php

use Illuminate\Database\Seeder;
use App\User;


class TableUsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // colaxy@wp.pl:qazwsx123:male
       $User = new User();
       $User->name = "Adrian";
       $User->email = "colaxy@wp.pl";
       $User->password = bcrypt('qazwsx123');
       $User->save();

       // user@domain.pl:user:male
       $User = new User();
       $User->name = "user";
       $User->email = "user@domain.pl";
       $User->password = bcrypt("user");
       $User->save();

        // user1@domain.pl:user:female
       $User = new User();
       $User->name = "user1";
       $User->email = "user1@domain.pl";
       $User->password = bcrypt("user");
       $User->save();
    }
}
