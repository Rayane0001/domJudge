@extends('layouts.master')

@section('title', 'Contacts')

@section('content')
    <div class="container">
        <h1 class="my-4">Competitions List</h1>

        <!-- Button to open the modal for creating a new challenge -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createChallengeModal">
            Add New Challenge
        </button>

        <!-- Challenges Table -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Difficulty</th>
                <th>Statement</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($challenges as $challenge)
                <tr>
                    <td>{{ $challenge->name }}</td>
                    <td>{{ $challenge->difficulty }}</td>
                    <td>{{ $challenge->statement }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editChallengeModal{{ $challenge->id }}">
                            Edit
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('challenges.destroy', $challenge->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editChallengeModal{{ $challenge->id }}" tabindex="-1" aria-labelledby="editChallengeModalLabel{{ $challenge->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editChallengeModalLabel{{ $challenge->id }}">Edit Challenge</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('challenges.update', $challenge->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $challenge->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="difficulty" class="form-label">Difficulty</label>
                                        <input type="text" class="form-control" id="difficulty" name="difficulty" value="{{ $challenge->difficulty }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="statement" class="form-label">Statement</label>
                                        <textarea class="form-control" id="statement" name="statement" rows="3" required>{{ $challenge->statement }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>

        <!-- Create Challenge Modal -->
        <div class="modal fade" id="createChallengeModal" tabindex="-1" aria-labelledby="createChallengeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createChallengeModalLabel">Create New Challenge</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('challenges.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="difficulty" class="form-label">Difficulty</label>
                                <input type="text" class="form-control" id="difficulty" name="difficulty" required>
                            </div>
                            <div class="mb-3">
                                <label for="statement" class="form-label">Statement</label>
                                <textarea class="form-control" id="statement" name="statement" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Challenge</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
