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
            <div class="profile-picture"></div>
            <div class="profile-details">
                <h3 class="username">{{$user->name}}</h3>
                @if($user->id != Auth::id())
                    @if($isFollowing)
                        <form action="{{ '/profile/' . $user->id .'/unfollow' }}" method="POST">
                            @csrf
                            <button class="follow-button">Unfollow</button>
                        </form>
                    @else
                        <form action="{{ '/profile/' . $user->id .'/follow' }}" method="POST">
                            @csrf
                            <button class="follow-button" type="submit">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>

        <div class="main-content">
            <div class="sidebar">
                <div class="intro-section">
                    <h2>Intro</h2>
                    <p class="intro-text">{{ $user->bio }}</p>
                </div>
                <div class="sidebar-section">
                    <h2>Details</h2>
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>{{$user->location}} </p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-briefcase"></i>
                        <p>{{$user->job}}</p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-clock"></i>
                        <p>Joined January 2015</p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-home"></i>
                        <p><strong>Hometown:</strong> {{ $user->hometown }}</p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-heart"></i>
                        <p><strong>Relationship Status:</strong> {{ $user->relationship_status }}</p>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-user-friends"></i>
                        <p><strong>Followed by:</strong> {{ $user->followers->count() }} people</p>
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
                <div class="actions-section">
                    <button class="action-button story-button">+ Add to story</button>
                    <form action="/profile/edit">
                        <button type="submit" class="action-button edit-button"><i class="fas fa-pencil-alt"></i> Edit profile</button>
                    </form>
                </div>
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
