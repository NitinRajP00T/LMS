<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonResource;
use App\Models\LessonComment;
use App\Models\User;
use Illuminate\Database\Seeder;

class LessonInteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lesson = Lesson::whereHas('course', function ($q) {
            $q->where('title', 'DevOps');
        })->first();

        if ($lesson) {
            // Clear existing for clean seeding
            LessonResource::where('lesson_id', $lesson->id)->delete();
            LessonComment::where('lesson_id', $lesson->id)->delete();

            // 1. Add Resources
            LessonResource::create([
                'lesson_id' => $lesson->id,
                'title' => 'DevOps Pipeline Configuration Files (Sample YAML)',
                'url' => 'https://github.com/example/devops-pipeline-demo',
            ]);

            // 2. Find student and instructor
            $student = User::where('role', 'student')->first();
            $instructor = User::where('role', 'instructor')->first();

            if ($student && $instructor) {
                // 3. Add Comment
                $comment = LessonComment::create([
                    'user_id' => $student->id,
                    'lesson_id' => $lesson->id,
                    'content' => 'Day - 1: Understanding the basics of CI/CD. The overview was extremely clear!',
                ]);

                // 4. Add Reply from Instructor
                LessonComment::create([
                    'user_id' => $instructor->id,
                    'lesson_id' => $lesson->id,
                    'parent_id' => $comment->id,
                    'content' => 'Great to hear that! Keep pushing forward. In the next chapter, we will build a real pipeline.',
                ]);
            }
        }
    }
}
