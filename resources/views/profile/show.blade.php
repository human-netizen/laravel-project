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
            <div class="profile-picture"></div>
            <div class="profile-details">
                <h3 class="username">John Doe</h3>
                <button class="follow-button">Follow</button>
            </div>
        </div>

        <div class="main-content">
            <div class="sidebar">
                <div class="intro-section">
                    <h2>Intro</h2>
                    <p class="intro-text">Passionate software developer with over 10 years of experience. Enjoys hiking, coding, and exploring new technologies.</p>
                </div>
                <div class="sidebar-section">
                    <h2>Details</h2>
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>San Francisco, CA</p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-briefcase"></i>
                        <p>Software Developer at TechCorp</p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-clock"></i>
                        <p>Joined January 2015</p>
                    </div>
                </div>
                <div class="sidebar-section">
                    <h2>Friends</h2>
                    <div class="friend-item">
                        <img src="https://via.placeholder.com/50" alt="Friend">
                        <p>Jane Smith</p>
                    </div>
                    <div class="friend-item">
                        <img src="https://via.placeholder.com/50" alt="Friend">
                        <p>Mike Johnson</p>
                    </div>
                    <div class="friend-item">
                        <img src="https://via.placeholder.com/50" alt="Friend">
                        <p>Sarah Lee</p>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="posts-section">
                    <div class="create-post">
                        <textarea placeholder="What's on your mind?"></textarea>
                        <button class="post-button">Post</button>
                    </div>
                    <div class="posts">
                        <div class="post">
                            <div class="post-header">
                                <div class="post-author">John Doe</div>
                                <div class="post-time">2 hrs ago</div>
                            </div>
                            <p>Had a great time hiking today! #nature #adventure</p>
                            <div class="post-interactions">
                                <button class="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
                                <button class="comment-button"><i class="fas fa-comment"></i> Comment</button>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-header">
                                <div class="post-author">John Doe</div>
                                <div class="post-time">5 hrs ago</div>
                            </div>
                            <p>Just finished a new project using React. Excited to share it soon!</p>
                            <div class="post-interactions">
                                <button class="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
                                <button class="comment-button"><i class="fas fa-comment"></i> Comment</button>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-header">
                                <div class="post-author">John Doe</div>
                                <div class="post-time">1 day ago</div>
                            </div>
                            <p>Can't wait for the weekend. Any suggestions for new coffee shops to try?</p>
                            <div class="post-interactions">
                                <button class="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
                                <button class="comment-button"><i class="fas fa-comment"></i> Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
