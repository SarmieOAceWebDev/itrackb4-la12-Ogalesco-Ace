@extends('layouts.app')
@section('title', 'Subject List')
@section('content')

 @if ($subjects == 'all')
    <p class="text-muted mb-3"> All Subjects</p>

 @else 
  <strong class="d-block mb-3">Project Subject</strong>

 @endif



<div class="card shadow-sm mb-4">
<div class="card-body">

<h3 class="h6 text-uppercase text-muted mb-2">Filter by Code</h3>
<div class="d-flex flex-wrap gap-2 mb-3">
<a href="{{ route('subjects.index') }}" class="btn btn-sm btn-outline-primary">All</a> 
<a href="{{ route('subjects.index', ['code' => 'CAP102' ]) }}" class="btn btn-sm btn-outline-primary">CAP102</a>
<a href="{{ route('subjects.index', ['code' => 'ITPI333']) }}" class="btn btn-sm btn-outline-primary">ITPI333</a>
<a href="{{ route('subjects.index', ['code' => 'ITPI441']) }}" class="btn btn-sm btn-outline-primary">ITPI441</a>
<a href="{{ route('subjects.index', ['code' => 'ITRACKB4']) }}" class="btn btn-sm btn-outline-primary">ITRACKB4</a>
<a href="{{ route('subjects.index', ['code' => 'ITTRACKB3']) }}" class="btn btn-sm btn-outline-primary">ITTRACKB3</a>
<a href="{{ route('subjects.index', ['code' => 'ITEL301']) }}" class="btn btn-sm btn-outline-primary">ITEL301</a>
</div>


<h3 class="h6 text-uppercase text-muted mb-2">Filter by Units</h3>
<div class="d-flex flex-wrap gap-2 mb-3">
<a href="{{ route('subjects.index', [ 'units' => 'all']) }}" class="btn btn-sm btn-outline-primary">All</a>
<a href="{{ route('subjects.index', [ 'units' => '2']) }}" class="btn btn-sm btn-outline-primary">2 Units</a>
<a href="{{ route('subjects.index', [ 'units' => '3']) }}" class="btn btn-sm btn-outline-primary">3 Units</a>
</div>




<a href="{{ route('subjects.index') }}" class="btn btn-sm btn-outline-danger">
    Clear Filters
</a>

</div>
</div>






    <h2 class="h4 mb-3">Subject List</h2>
    <div class="card shadow-sm">
    <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover align-middle mb-0">
        <thead class="table-dark">
        <tr>
            <th class="text-center">#</th>
            <th>Subject Code</th>
            <th>Subject Title</th>
            <th class="text-center">Units</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($subjects as $subject)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="fw-semibold">{{ $subject['code'] }}</td>
            <td>{{ $subject['subject'] }}</td>
            <td class="text-center">{{ $subject['units'] }}</td>
            <td><span class="badge text-bg-info">{{ $subject->category->name }}</span></td>
            <td> 
                <a href="{{ route('subjects.edit', $subject['id']) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form action="{{ route('subjects.destroy', $subject['id']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                 
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Do you want to delete this subject?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted py-4">
                No subjects available at the moment.
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>





    </div>
    </div>
{{{$subjects->links()}}}

@endsection