@extends('frontend.layouts.app')
@section('content')
    <div class="main_idea">
        <div class="details">
            @if(auth()->user())
                <h3><a href="{{ route('dashboard') }}"><i class="fa fa-chess-king"></i> Admin</a></h3>
            @endif
            <h2>Lets List al the <strong>Talents</strong> Around us</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
        </div>
        <div class="form">
            <form class="row g-3" action="{{ route('user-info.store') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    @include('backend.includes.messages')
                </div>
                <div class="mb-3  col-md-12">
                    <label class="form-label" for="name">Name</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{old('name')}}" required>
                </div>
                <div class="mb-3  col-md-12">
                    <label class="form-label col-md-6" for="links">Links</label>
                    <input type="text" name="links" class="form-control" value="{{old('links')}}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="skills">Skills</label>
                    <input id="skills" type="text" name="skills" class="form-control" value="{{old('skills')}}" required>
                </div>
                <h3>Additional Info</h3>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" value="{{old('contact_number')}}" name="contact_number" class="form-control" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="email">Email Address</label>
                    <input id="email" type="email" value="{{old('email')}}" name="email" class="form-control" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="age_range">Age Range</label>
                    <input id="age_range" type="text" value="{{old('age_range')}}" name="age_range" class="form-control" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="current_institution">Current Institution</label>
                    <input id="current_institution" type="text" value="{{old('current_institution')}}" name="current_institution" class="form-control" required>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label" for="location">Location</label>
                    <input type="text" name="location" value="{{old('location')}}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
