@extends('layout')
@section('content')
    <link href="{{ asset('css/userapp.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .profile-picture {
            background-image: url("{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/no-image.png') }}");
        }
        .cover-photo {
            background-image: url("{{ $user->cover_photo ? asset('storage/' . $user->cover_photo) : asset('images/no-image.png') }}");
        }

    </style>
    
    <div class="profile-container">
        <div class="cover-photo"></div>
        <div class="profile-info">
            <div class="profile-picture mx-auto"></div>
        </div>
        <div class="edit-profile-section">
            <h2>Edit Profile</h2>
            <form class="edit-profile-form" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="profile-picture">Profile Picture</label>
                    <input type="file" id="profile-picture" name="profile_picture">
                </div>
                <div class="form-group">
                    <label for="cover-photo">Cover Photo</label>
                    <input type="file" id="cover-photo" name="cover_photo">
                </div>
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio">{{ $user->bio }}</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="{{$user->location}}">
                </div>
                <div class="form-group">
                    <label for="job">Job</label>
                    <input type="text" id="job" name="job" value="{{$user->job}}">
                </div>
                <div class="form-group">
                    <label for="hometown">Hometown</label>
                    <input type="text" id="hometown" name="hometown" value="{{ $user->hometown }}">
                </div>
                <div class="form-group">
                    <label for="relationship-status">Relationship Status</label>
                    <select id="relationship-status" name="relationship_status">
                        <option value="Single" {{ $user->relationship_status == 'Single' ? 'selected' : '' }}>Single</option>
                        <option value="In a Relationship" {{ $user->relationship_status == 'In a Relationship' ? 'selected' : '' }}>In a Relationship</option>
                        <option value="Married" {{ $user->relationship_status == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="It's Complicated" {{ $user->relationship_status == "It's Complicated" ? 'selected' : '' }}>It's Complicated</option>
                    </select>
                </div>
                <button type="submit" class="save-button">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
