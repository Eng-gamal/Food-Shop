<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['1.jpg', '2.jpg',];
        $ar_titles = ['أفضل مطعم', 'أفضل مطعم'];
        $ar_sub_title = ['جو مارتن', 'جو مارتن',];
        $ar_job_title = ['المدير التنفيذي', 'المدير التنفيذي'];
        $ar_descriptions = [
            'لوريم إيبسوم هو ببساطة نص شكلي (بمعنى آخر) يُستخدم في الطباعة والتنضيد. لطالما كان لوريم إيبسوم النص الشكلي المعياري في هذا المجال',
            'لوريم إيبسوم هو ببساطة نص شكلي (بمعنى آخر) يُستخدم في الطباعة والتنضيد. لطالما كان لوريم إيبسوم النص الشكلي المعياري في هذا المجال',

        ];
        $en_titles = ['The Best restaurant', 'The Best restaurant',];
        $en_sub_title = ['JOE MARTIN', 'JOE MARTIN',];
        $en_job_title = ['CEO', 'CEO'];
        $en_descriptions = [
            'Working with this company has been a game-changer for my the a business. Their expertise and innovative Theirexpertise and approach have helped us achieve remarkable.',
            'Lorem ipsum is simply dummy text of the printing and type setting. Lorem Ipsum has been the industry’s is dummy. Lorem ipsum is simply dummy text of the printing and typesetting. Lorem Ipsum has been the industry’s standard dummy.',

        ];
        for ($s = 0; $s < count($ar_titles); $s++) {
            $testimonial = Testimonial::create([
                'ar' => [
                    'title' => $ar_titles[$s],
                    'sub_title' => $ar_sub_title[$s],
                    'job_title' => $ar_job_title[$s],
                    'description' => $ar_descriptions[$s]
                ],
                'en' => [
                    'title' => $en_titles[$s],
                    'sub_title' => $en_sub_title[$s],
                    'job_title' => $en_job_title[$s],
                    'description' => $en_descriptions[$s]
                ],
                'status' => 1
            ]);
            $testimonial->file()->create([
                'path' => 'images/testimonials/' . $images[$s],
                'type' => 'image'
            ]);
        }
    }
}
