@extends('layout')
@section('content')
    <link href="{{ asset('css/userapp.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .profile-picture {
            background-image: url('{{ asset('profile_images/iqbal.jpg') }}');
        }
        .cover-photo {
            background-image: url('{{ asset('cover_photos/amit.jpg') }}');
        }
    </style>
    <div class="profile-container">
        <div class="cover-photo"></div>
        <div class="profile-info">
            <div class="profile-picture mx-auto"></div>
            
        </div>
        <div class="edit-profile-section">
            <h2>Edit Profile</h2>
            <form class="edit-profile-form">
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
                    <input type="text" id="username" name="username" value="John Doe">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio">Passionate software developer with over 10 years of experience. Enjoys hiking, coding, and exploring new technologies.</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="San Francisco, CA">
                </div>
                <div class="form-group">
                    <label for="job">Job</label>
                    <input type="text" id="job" name="job" value="Software Developer at TechCorp">
                </div>
                <button type="submit" class="save-button">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
