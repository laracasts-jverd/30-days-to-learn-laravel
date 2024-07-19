<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'PHP Developer',
                'salary' => 120000,
            ],
            [
                'id' => 2,
                'title' => 'Python Developer',
                'salary' => 130000,
            ],
            [
                'id' => 3,
                'title' => 'Java Developer',
                'salary' => 110000,
            ],
            [
                'id' => 4,
                'title' => 'Ruby Developer',
                'salary' => 100000,
            ],
            [
                'id' => 5,
                'title' => 'C# Developer',
                'salary' => 115000,
            ],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn ($job) => $job['id'] == $id);
        if (! $job) {
            abort(404);
        }

        return $job;
    }
}
