@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="p-5 mb-4 bg-light rounded-3">
        <h1 class="display-5 fw-bold">Welcome to the Subject Management System</h1>
        <p class="col-md-8 fs-4">This is a simple application to manage subjects. You can view, add, edit, and delete subjects.</p>
        <a href="{{ route('subjects.index') }}" class="btn btn-primary btn-lg">View Subjects</a>

</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6">
                <div class="card text-center shadow-sm"><div class="card-body">
                    <div class="display-6 fw-bold mb-2">{{ $subjectCount }}</div>
                    <div class="text-muted">Total Subjects</div>
                </div></div>
            </div>
            <div class="col-sm-6">
                        <div class="card text-center shadow-sm"><div class="card-body">
                            <div class="display-6 fw-bold mb-2">{{ $categoryCount }}</div>
                            <div class="text-muted">Total Categories</div>
                        </div></div>
                    </div>
                </div>



                <div class="card shadow-sm">
                    <div class="card-body d-flex flex-column flex-md-row align-items-center gap-4">
                       <img src="{{ asset('image/me.jpg') }}" width="96" height="105" class="rounded-circle">

                        <div>
                            <h5 class="card-title">About the Developer</h5>
                            <p class="card-text">Ace Sarmiento Ogalesco po pala, coder na nalilimutan na may activity.</p>
                        </div>
                    </div>
                </div>      
                </div>
@endsection

