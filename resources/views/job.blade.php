<x-layout>
    <x-slot:heading>Job Page</x-slot>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>This job pays ${{ $job['salary'] }} a year.</p>
</x-layout>
