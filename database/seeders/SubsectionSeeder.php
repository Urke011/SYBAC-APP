<?php

namespace Database\Seeders;

use App\Constants\Subsections;
use App\Models\Subsection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubsectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exists = Subsection::where('id', Subsections::DEFAULT['id'])->exists();
        if (!$exists) {
            $defaultSubsection = new Subsection();
            $defaultSubsection->id = Subsections::DEFAULT['id'];
            $defaultSubsection->name = Subsections::DEFAULT['name'];
            $defaultSubsection->description = Subsections::DEFAULT['description'];

            $defaultSubsection->save();
        }
    }
}
