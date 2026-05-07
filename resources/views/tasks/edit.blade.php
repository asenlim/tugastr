@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <x-card>

            <x-slot:header>
                Edit Task
            </x-slot:header>

            <form action="/tasks/{{ $todo->id }}" method="POST">
                @csrf
                @method('PUT')

                <x-input
                    name="task"
                    label="Edit Task"
                    value="{{ $todo->task }}"
                />

                <x-button class="w-100 mt-3">
                    Update
                </x-button>
            </form>

        </x-card>

    </div>
</div>

@endsection