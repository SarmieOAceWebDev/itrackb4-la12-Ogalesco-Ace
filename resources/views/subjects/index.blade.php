
@extends('layouts.app')

@section('title', 'Subjects')

@section('content')

    <form method="GET" action="{{ route('subjects.index') }}">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search subject..."
        >

        <select name="sort">
            <option value="code" @selected($sort === 'code')>
                Sort by code
            </option>
            <option value="units" @selected($sort === 'units')>
                Sort by units
            </option>
        </select>

        <button type="submit">Apply</button>

        <a href="{{ route('subjects.index') }}">Clear</a>
    </form>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Code</th>
                        <th>Subject Title</th>
                        <th class="text-center">Units</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($subjects as $subject)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->subject }}</td>
                            <td class="text-center">{{ $subject->units }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $subject->category->name }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('subjects.edit', $subject->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('subjects.destroy', $subject->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this subject?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                No subjects found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $subjects->links() }}
        </div>
    </div>

@endsection
