<?php

namespace Database\Seeders;

use App\Models\DiscussionThread;
use Illuminate\Database\Seeder;

class DiscussionThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiscussionThread::factory(10)->create();
    }
}
