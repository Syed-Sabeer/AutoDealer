<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            ['name' => 'Chief Executive Officer (CEO)'],
            ['name' => 'Chief Operating Officer (COO)'],
            ['name' => 'Chief Financial Officer (CFO)'],
            ['name' => 'Chief Technology Officer (CTO)'],
            ['name' => 'Chief Marketing Officer (CMO)'],
            ['name' => 'Managing Director'],
            ['name' => 'General Manager'],
            ['name' => 'Operations Manager'],
            ['name' => 'Project Manager'],
            ['name' => 'Product Manager'],
            ['name' => 'Human Resources Manager'],
            ['name' => 'Finance Manager'],
            ['name' => 'Software Engineer'],
            ['name' => 'Senior Software Engineer'],
            ['name' => 'Frontend Developer'],
            ['name' => 'Backend Developer'],
            ['name' => 'Full Stack Developer'],
            ['name' => 'UI/UX Designer'],
            ['name' => 'Quality Assurance Engineer'],
            ['name' => 'Data Analyst'],
            ['name' => 'Data Scientist'],
            ['name' => 'Network Administrator'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Sales Manager'],
            ['name' => 'Customer Support Representative'],
            ['name' => 'Accountant'],
            ['name' => 'Business Analyst'],
            ['name' => 'Legal Advisor'],
            ['name' => 'Consultant'],
            ['name' => 'Research Analyst'],
            ['name' => 'Content Writer'],
            ['name' => 'Digital Marketing Specialist'],
            ['name' => 'Social Media Manager'],
            ['name' => 'Administrative Assistant'],
            ['name' => 'Receptionist'],
            ['name' => 'Security Officer'],
            ['name' => 'Office Assistant']
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
