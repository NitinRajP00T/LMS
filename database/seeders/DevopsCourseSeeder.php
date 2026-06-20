<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class DevopsCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Get/Create instructor
        $instructor = User::where('role', 'instructor')->first() ?? User::create([
            'name' => 'John Instructor',
            'email' => 'instructor@example.com',
            'password' => bcrypt('password'),
            'role' => 'instructor',
        ]);

        // 2. Get category
        $category = Category::where('name', 'Development')->first() ?? Category::first();

        // 3. Create Course
        $course = Course::create([
            'title' => 'DevOps',
            'description' => 'Master DevOps tools and pipelines from scratch. Learn CI/CD, Git, GitHub Actions, Docker, Kubernetes, Ansible, and Terraform. Deploy your applications on AWS or any cloud platform successfully.',
            'learning_points' => "Set up complete CI/CD pipelines from scratch.\nMaster Docker containerization and Kubernetes orchestration.\nConfigure infrastructure using Terraform & Ansible.\nDeploy real-world applications to cloud providers.",
            'price' => 3000,
            'discount_percent' => 0,
            'requirements' => "Basic Linux commands\nAn internet connection and computer",
            'level' => 'Intermediate',
            'language' => 'Hindi / English',
            'is_published' => true,
            'published_at' => now(),
            'students_count' => 0,
            'average_rating' => 0.0,
            'category_id' => $category->id,
            'user_id' => $instructor->id,
        ]);

        // 4. Create Lessons
        $lessonsData = [
            ['title' => 'Introduction to DevOps & CI/CD Principles', 'duration' => 600, 'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4'],
            ['title' => 'Docker Deep Dive: Building and Running Containers', 'duration' => 900, 'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4'],
            ['title' => 'Kubernetes: Orchestrating Containerized Applications', 'duration' => 1200, 'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4'],
            ['title' => 'GitHub Actions & CI/CD Pipeline Automation', 'duration' => 800, 'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4'],
            ['title' => 'Infrastructure as Code with Terraform and Ansible', 'duration' => 1000, 'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4'],
        ];

        foreach ($lessonsData as $idx => $data) {
            Lesson::create([
                'course_id' => $course->id,
                'title' => $data['title'],
                'description' => 'Learn core concepts and complete hands-on labs in this lesson.',
                'video_url' => $data['video_url'],
                'duration' => $data['duration'],
                'order' => $idx + 1,
                'is_preview' => ($idx === 0),
            ]);
        }
    }
}
