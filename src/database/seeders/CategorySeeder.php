<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'name' => 'Children & Youths',
                'parent_id' => null
            ],
            [
                'name' => 'Animals',
                'parent_id' => null
            ],
            [
                'name' => 'Climate & Environment',
                'parent_id' => null
            ],
            [
                'name' => 'Health & Care',
                'parent_id' => null
            ],
            [
                'name' => 'Community',
                'parent_id' => null
            ],
            [
                'name' => 'Children & Youths',
                'parent_id' => 1
            ],
            [
                'name' => 'Sports & Coaching',
                'parent_id' => 1
            ],
            [
                'name' => 'Nursery & Day Care',
                'parent_id' => 1
            ],
            [
                'name' => 'General Child Care',
                'parent_id' => 1
            ],
            [
                'name' => 'Tutoring & Mentoring',
                'parent_id' => 1
            ],
            [
                'name' => 'Wildlife',
                'parent_id' => 2
            ],
            [
                'name' => 'Marine Life',
                'parent_id' => 2
            ],
            [
                'name' => 'Cats & Dogs',
                'parent_id' => 2
            ],
            [
                'name' => 'Farm Animals',
                'parent_id' => 2
            ],
            [
                'name' => 'Primates',
                'parent_id' => 2
            ],
            [
                'name' => 'Birds',
                'parent_id' => 2
            ],
            [
                'name' => 'Other Animals',
                'parent_id' => 2
            ],
            [
                'name' => 'Environmental Conservation',
                'parent_id' => 3
            ],
            [
                'name' => 'Marine Conservation',
                'parent_id' => 3
            ],
            [
                'name' => 'Reforestation',
                'parent_id' => 3
            ],
            [
                'name' => 'Climate Change',
                'parent_id' => 3
            ],
            [
                'name' => 'Recycling & Cleaning',
                'parent_id' => 3
            ],
            [
                'name' => 'Rainforest Protection',
                'parent_id' => 3
            ],
            [
                'name' => 'Renewable Energy',
                'parent_id' => 3
            ],
            [
                'name' => 'Health Education',
                'parent_id' => 4
            ],
            [
                'name' => 'Disabled Care',
                'parent_id' => 4
            ],
            [
                'name' => 'Elderly Care',
                'parent_id' => 4
            ],
            [
                'name' => 'Patient Care',
                'parent_id' => 4
            ],
            [
                'name' => 'HIV',
                'parent_id' => 4
            ],
            [
                'name' => 'Medical Assistance',
                'parent_id' => 4
            ],
            [
                'name' => 'Mental Health',
                'parent_id' => 4
            ],
            [
                'name' => 'Physical Therapy',
                'parent_id' => 4
            ],
            [
                'name' => 'Birth Assistance',
                'parent_id' => 4
            ],
            [
                'name' => 'Community Development',
                'parent_id' => 5
            ],
            [
                'name' => "Women's Empowerment",
                'parent_id' => 5
            ],
            [
                'name' => 'Local Business Support',
                'parent_id' => 5
            ],
            [
                'name' => 'Community Teaching',
                'parent_id' => 5
            ],
            [
                'name' => 'Disaster Relief',
                'parent_id' => 5
            ],
            [
                'name' => 'LGBTQ',
                'parent_id' => 5
            ],
            [
                'name' => 'Building Project',
                'parent_id' => 5
            ],
            [
                'name' => 'Farming & Gardening',
                'parent_id' => 5
            ],
            [
                'name' => 'Education Campaign',
                'parent_id' => 5
            ],
            [
                'name' => 'Refugee Relief',
                'parent_id' => 5
            ],
            [
                'name' => 'Human Rights',
                'parent_id' => 5
            ],
        ]);
    }
}
