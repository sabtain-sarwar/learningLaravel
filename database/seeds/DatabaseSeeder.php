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
        // we can use/run the factory and all we have to do is call this factory() function and here we are
        // gonna pass a couple parameters,1st the namespace where our class is,and the 2nd parameter is going
        // to be how many users do we want.And now we can chain this with create method bcz we want to create
        // stuff and then we chain this function each that is going to loop through that create,basically
        // loop through our object once it created.And we can actually create the relationships with this.So
        // it takes the function that has the users and then in parenthesis{} we can bring the user the object
        // and then we start inputing stuff in their relationship.e.g id the user has posts ,we can run
        // another factory from here so we can play around with their relationships and i then i can use the
        // save method and inside the save method we can define the factory that we want to execute and then
        // we can chain this with another method called make()
        // In short we are creating a user and then we are bringing back the user and playing around the
        // relationship by invoking another factory
//        factory(App\User::class,10)->create()->each(function($user){
//            $user->posts()->save(factory(App\Post::class)->make());
//        });
//        factory(App\User::class,10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();

        factory(App\User::class,10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });
        // $this->call(UsersTableSeeder::class);

        factory(App\Role::class, 3)->create();

        factory(App\Category::class, 10)->create();

        factory(App\Photo::class, 1)->create();

        factory(App\Comment::class, 10)->create()->each(function ($c) {
            $c->replies()->save(factory(App\CommentReply::class)->make());
        });
    }
}
