@extends('layouts.app')

@section('title', 'Task History')

@section('content')

<div class="container mt-4">

    <h3>Task History (Selesai)</h3>

    <ul class="list-group mt-3">

        @forelse($todos as $item)

            <li class="list-group-item">
                <del>{{ $item->task }}</del>
                <small class="text-muted float-end">
                    Selesai
                </small>
            </li>

        @empty
            <li class="list-group-item text-center">
                Belum ada task yang selesai
            </li>
        @endforelse

    </ul>

</div>

@endsection