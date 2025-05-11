<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sylvia H Green',
                'designation' => 'Customer',
                'review_count' => '5',
                'review' => 'The experience was fantastic! I found my dream car quickly, and the process was so smooth. Highly recommended!',
                'image' => 'frontAssets/img/testimonial/01.jpg',
            ],
            [
                'name' => 'Jessica L Walker',
                'designation' => 'Customer',
                'review_count' => '5',
                'review' => 'I couldn\'t have asked for a better service. The team helped me find exactly what I was looking for, and the customer service was exceptional.',
                'image' => 'frontAssets/img/testimonial/02.jpg',
            ],
            [
                'name' => 'Sophia M Taylor',
                'designation' => 'Customer',
                'review_count' => '5',
                'review' => 'Fantastic car selection and an easy buying experience. I love my new car, and I\'m so happy with the overall service. 10/10!',
                'image' => 'frontAssets/img/testimonial/03.jpg',
            ],
            [
                'name' => 'Emily R Davis',
                'designation' => 'Customer',
                'review_count' => '4',
                'review' => 'This site made buying a car hassle-free. The options were extensive, and the prices were competitive. I\'ll definitely come back for future purchases!',
                'image' => 'frontAssets/img/testimonial/04.jpg',
            ],
            [
                'name' => 'James A Mitchell',
                'designation' => 'Customer',
                'review_count' => '5',
                'review' => 'I was amazed at how easy it was to compare cars and find exactly what I wanted. The process was transparent and efficient. A five-star experience!',
                'image' => 'frontAssets/img/testimonial/05.jpg',
            ],
        ];
        

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
