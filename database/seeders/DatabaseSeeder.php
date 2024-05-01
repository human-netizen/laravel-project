<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Test;
use App\Models\User;
use App\Models\Listing;
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
        // Create a few users and listings for association
        $users = User::factory(10)->create();
        $listings = Listing::factory(5)->create([
            'user_id' => $users->random()
        ]);

        // Loop through each listing to add comments
        foreach ($listings as $listing) {
            // Each listing gets 5 top-level comments
            foreach (range(1, 5) as $index) {
                $user = $users->random(); // Randomly pick one user

                // Create a top-level comment
                $comment = Comment::factory()->create([
                    'user_id' => $listing->user_id,
                    'listing_id' => $listing->id,
                    'parent_id' => null
                ]);

                // Randomly decide to add 0-3 subcomments to this comment
                foreach (range(1, rand(0, 3)) as $subIndex) {
                    $subUser = $users->random(); // Randomly pick one user for subcomment

                    $subcomment = Comment::factory()->create([
                        'user_id' => $subUser->id,
                        'listing_id' => $listing->id,
                        'parent_id' => $comment->id
                    ]);

                        foreach (range(1, rand(0, 3)) as $subSubIndex) {
                            $subSubUser = $users->random(); // Randomly pick one user for subcomment

                            Comment::factory()->create([
                                'user_id' => $subSubUser->id,
                                'listing_id' => $listing->id,
                                'parent_id' => $subcomment->id
                            ]);
                        }
                }
            }
        }



        // Listing::create([
        //     'title' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
        Test::create([
            'title' => 'Full-Stack Engineer',
            'tags' => 'laravel, backend ,api',
            'company' => 'Stark Industries',
            'location' => 'New York, NY',
            'email' => 'email2@email.com',
            'website' => 'https://www.starkindustries.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
