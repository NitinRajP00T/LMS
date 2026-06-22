@php
// Pass real data to the standalone HTML page via JS
$coursesJson = $courses->map(fn($c) => [
    'id'           => $c->id,
    'title'        => $c->title,
    'is_published' => $c->is_published,
    'price'        => $c->price,
    'created_at'   => $c->created_at?->format('M d, Y'),
    'image'        => $c->image ? Storage::url($c->image) : null,
    'edit_url'     => route('instructor.courses.edit', $c),
    'delete_url'   => route('instructor.courses.destroy', $c),
])->toJson();
@endphp
@include('Instructor.instructor-cource-management')
