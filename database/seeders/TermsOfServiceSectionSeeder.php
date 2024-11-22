<?php

namespace Database\Seeders;

use App\Models\TermsOfServiceSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsOfServiceSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TermsOfServiceSection::create([
            'content' =>  ""
        ]);
    }
}
