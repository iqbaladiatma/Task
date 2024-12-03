@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Search Section -->
  <div class="text-center mb-4">
    <div class="row g-0 justify-content-center">
      <div class="col-md-8">
        <div class="input-group">
          <form action="{{ route('tasks.index') }}" method="GET" class="w-100">
            <input type="search"
              name="search"
              class="form-control border-secondary"
              placeholder="Search your task"
              value="{{ request('search') }}"
              autocomplete="off" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Task Button -->
  <div class="mb-4">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Task</a>
  </div>

  <!-- Tasks Table -->
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tasks as $task)
          <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>
              @switch($task->status)
              @case('pending')
              <span class="badge bg-warning">Pending</span>
              @break
              @case('in_progress')
              <span class="badge bg-info">In Progress</span>
              @break
              @case('completed')
              <span class="badge bg-success">Completed</span>
              @break
              @endswitch
            </td>
            <td>
              <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="btn btn-danger btn-sm"
                  onclick="return confirm('Anda Yakin ?')">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection