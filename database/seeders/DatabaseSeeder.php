<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Enrollment;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Users
        $student = User::firstOrCreate(
            ['email' => 'test123@email.com'],
            [
                'name' => 'Test Student',
                'password' => Hash::make('password'),
                'role' => 'student',
            ]
        );

        $student2 = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role' => 'student',
            ]
        );

        $instructor = User::firstOrCreate(
            ['email' => 'instructor@example.com'],
            [
                'name' => 'John Instructor',
                'password' => Hash::make('password'),
                'role' => 'instructor',
            ]
        );

        // 2. Create Categories
        $categories = [
            ['name' => 'Development', 'icon' => 'fa-code'],
            ['name' => 'Business', 'icon' => 'fa-briefcase'],
            ['name' => 'Design', 'icon' => 'fa-palette'],
            ['name' => 'Marketing', 'icon' => 'fa-bullhorn'],
            ['name' => 'Photography', 'icon' => 'fa-camera'],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[] = Category::firstOrCreate(['name' => $cat['name']], ['icon' => $cat['icon']]);
        }

        // 3. Create Courses
        $coursesData = [
            [
                'title' => 'Ultimate Web Developer Bootcamp 2026',
                'description' => 'Learn HTML, CSS, JavaScript, PHP, Laravel, and build stunning web applications!',
                'learning_points' => "Build real-world projects\nMaster modern JavaScript\nDeploy applications online",
                'price' => 99.99,
                'discount_percent' => 10,
                'requirements' => 'No prior experience needed',
                'level' => 'beginner',
                'language' => 'English',
                'is_published' => true,
                'published_at' => now(),
                'students_count' => 1,
                'average_rating' => 4.8,
                'category_id' => $categoryModels[0]->id,
                'user_id' => $instructor->id,
            ],
            [
                'title' => 'Mastering Business Strategy & Finance',
                'description' => 'A comprehensive guide to analyzing markets, constructing financial plans, and executing strategies.',
                'learning_points' => "Analyze company strategy\nRead balance sheets\nManage cash flow",
                'price' => 129.99,
                'discount_percent' => 20,
                'requirements' => 'Basic understanding of business concepts',
                'level' => 'intermediate',
                'language' => 'English',
                'is_published' => true,
                'published_at' => now(),
                'students_count' => 1,
                'average_rating' => 4.5,
                'category_id' => $categoryModels[1]->id,
                'user_id' => $instructor->id,
            ],
            [
                'title' => 'Modern UI/UX Design Essentials',
                'description' => 'Learn Figma, user research, wireframing, prototyping, and build beautiful UI/UX designs.',
                'learning_points' => "Master Figma workflow\nConduct user research\nCreate high-fidelity prototypes",
                'price' => 79.99,
                'discount_percent' => 0,
                'requirements' => 'Figma installed on your computer',
                'level' => 'beginner',
                'language' => 'English',
                'is_published' => true,
                'published_at' => now(),
                'students_count' => 0,
                'average_rating' => 0.0,
                'category_id' => $categoryModels[2]->id,
                'user_id' => $instructor->id,
            ],
        ];

        $courseModels = [];
        foreach ($coursesData as $courseData) {
            $courseModels[] = Course::create($courseData);
        }

        // 4. Create Lessons for Courses
        foreach ($courseModels as $course) {
            for ($i = 1; $i <= 5; $i++) {
                Lesson::create([
                    'course_id' => $course->id,
                    'title' => "Lesson $i: Introduction and Core Concepts for " . $course->title,
                    'description' => "Detailed overview of key principles and hands-on exercises in Lesson $i.",
                    'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
                    'duration' => 600, // 10 minutes
                    'order' => $i,
                    'is_preview' => ($i === 1),
                ]);
            }
        }

        // 5. Enroll Students in Courses
        // Enroll 'test123@email.com' in course 1 and course 2
        $enrollment1 = Enrollment::create([
            'user_id' => $student->id,
            'course_id' => $courseModels[0]->id,
            'enrolled_at' => now(),
        ]);

        $enrollment2 = Enrollment::create([
            'user_id' => $student->id,
            'course_id' => $courseModels[1]->id,
            'enrolled_at' => now(),
        ]);

        // 6. Seed Lesson Progress
        // Mark first 2 lessons as completed for enrollment 1
        $lessons1 = $courseModels[0]->lessons;
        $enrollment1->lessons()->attach($lessons1[0]->id, ['completed_at' => now()]);
        $enrollment1->lessons()->attach($lessons1[1]->id, ['completed_at' => now()]);

        // Mark 1 lesson as completed for enrollment 2
        $lessons2 = $courseModels[1]->lessons;
        $enrollment2->lessons()->attach($lessons2[0]->id, ['completed_at' => now()]);

        // 7. Seed Reviews
        Review::create([
            'user_id' => $student->id,
            'course_id' => $courseModels[0]->id,
            'rating' => 5,
            'comment' => 'This bootcamp is amazing! Everything is explained so clearly.',
        ]);

        Review::create([
            'user_id' => $student->id,
            'course_id' => $courseModels[1]->id,
            'rating' => 4,
            'comment' => 'Very detailed concepts, highly recommended for business professionals.',
        ]);
    }
}
