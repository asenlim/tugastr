@extends('layouts.app')

@section('title', 'Tasks')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/task.css') }}">
@endsection

@section('content')

<div class="row justify-content-center task-wrapper">
    <div class="col-md-7">

        {{-- ALERT --}}
        <x-alert type="success" />

        {{-- FORM CARD --}}
        <x-card class="mb-4 task-card">

            <x-slot:header>
                Tambah Tugas Baru
            </x-slot:header>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <x-input
                    name="task"
                    label="Apa yang harus dikerjakan?"
                    placeholder="Contoh: Belajar Laravel"
                />

                <x-button class="w-100 mt-3">
                    Simpan Tugas
                </x-button>

            </form>

        </x-card>

        {{-- SEARCH --}}
        <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">

            <input 
                type="text" 
                name="search" 
                class="form-control"
                placeholder="Cari task..."
                value="{{ request('search') }}"
            >

        </form>

        {{-- LIST CARD --}}
        <x-card class="task-card">

            <x-slot:header>
                Daftar Tugas
            </x-slot:header>

            <ul class="list-group list-group-flush">

                @forelse($todos as $item)

                    <li class="list-group-item d-flex justify-content-between align-items-center task-item">

                        <span>
                            @if($item->is_completed)
                                <del>{{ $item->task }}</del>
                            @else
                                {{ $item->task }}
                            @endif
                        </span>

                        <div class="d-flex gap-2">

                            {{-- TOGGLE SELESAI --}}
                            <form action="{{ route('tasks.toggle', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-success btn-sm">
                                    @if($item->is_completed)
                                        Batalkan
                                    @else
                                        Selesai
                                    @endif
                                </button>
                            </form>

                            {{-- EDIT --}}
                            <a href="{{ route('tasks.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('tasks.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <x-button color="danger" class="btn-sm">
                                    Hapus
                                </x-button>
                            </form>

                        </div>

                    </li>

                @empty
                    <li class="list-group-item text-center task-empty">
                        Tidak ada tugas
                    </li>
                @endforelse

            </ul>

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $todos->links() }}
            </div>

        </x-card>

    </div>
</div>

@endsection