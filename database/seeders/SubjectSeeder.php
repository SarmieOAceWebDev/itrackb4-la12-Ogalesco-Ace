<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Category;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $project = Category::firstOrCreate(['name' => 'Project']);
        $major = Category::firstOrCreate(['name' => 'Major']);
        $elective = Category::firstOrCreate(['name' => 'Elective']);

        // 1-10: Existing Subjects
        Subject::create([
            'code' => 'CAP102',
            'subject' => 'Capstone Project 2',
            'units' => 3,
            'category_id' => $project->id,
        ]);

        Subject::create([
            'code' => 'ITPI333',
            'subject' => 'Information Assurance and Security 2',
            'units' => 2,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI441',
            'subject' => 'Systems Administration and Maintenance',
            'units' => 2,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITRACKB4',
            'subject' => 'Web Systems and Technologies: Web Programming 2',
            'units' => 2,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITTRACKB3',
            'subject' => 'Web Systems and Technologies: Web Programming 1',
            'units' => 2,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITEL301',
            'subject' => 'Professional Elective',
            'units' => 3,
            'category_id' => $elective->id,
        ]);

        Subject::create([
            'code' => 'ITPI221',
            'subject' => 'Database Management Systems',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI222',
            'subject' => 'Data Structures and Algorithms',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI223',
            'subject' => 'Computer Networks',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITEL302',
            'subject' => 'Human Computer Interaction',
            'units' => 3,
            'category_id' => $elective->id,
        ]);

        // 11-20: Additional Subjects
        Subject::create([
            'code' => 'ITPI311',
            'subject' => 'Object Oriented Programming',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI312',
            'subject' => 'Software Engineering',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI313',
            'subject' => 'Operating Systems',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI314',
            'subject' => 'Information Management',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI315',
            'subject' => 'Systems Analysis and Design',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI316',
            'subject' => 'Mobile Application Development',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITPI317',
            'subject' => 'Network Administration',
            'units' => 3,
            'category_id' => $major->id,
        ]);

        Subject::create([
            'code' => 'ITEL303',
            'subject' => 'Multimedia Systems',
            'units' => 3,
            'category_id' => $elective->id,
        ]);

        Subject::create([
            'code' => 'ITEL304',
            'subject' => 'Introduction to Data Science',
            'units' => 3,
            'category_id' => $elective->id,
        ]);

        Subject::create([
            'code' => 'CAP101',
            'subject' => 'Capstone Project 1',
            'units' => 3,
            'category_id' => $project->id,
        ]);
    }
}
