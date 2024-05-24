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

        <div class="main-content" x-data="{ open: false }">
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
                    <form action="/battleground">
                        <button class="action-button story-button">Battle logs</button>
                    </form>
                    <form action="/profile/edit">
                        <button type="submit" class="action-button edit-button"><i class="fas fa-pencil-alt"></i> Edit profile</button>
                    </form>
                </div>
                <div class="posts-section">
                    <div class="create-post p-4 bg-gray-800 rounded-lg shadow-lg" @click="open = true">
                        <div class="flex items-center space-x-4 w-full">
                            <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/no-image.png') }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                            <textarea placeholder="What's on your mind, {{ $user->name }}?" class="w-full bg-gray-700 text-white rounded-lg p-2"></textarea>
                        </div>
                    </div>
                    <div class="posts mt-4 space-y-4">
                        <!-- Existing posts will go here -->
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

            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-xl">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold text-white">Create post</h3>
                        <button @click="open = false" class="text-gray-400 hover:text-gray-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="flex items-center mb-4">
                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/no-image.png') }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full mr-4">
                        <div>
                            <h4 class="text-white">{{ $user->name }}</h4>
                            <select class="bg-gray-700 text-white rounded-lg p-2">
                                <option value="public">Public</option>
                                <option value="friends">Friends</option>
                                <option value="only_me">Only me</option>
                            </select>
                        </div>
                    </div>
                    <textarea placeholder="What's on your mind, {{ $user->name }}?" class="w-full bg-gray-700 text-white rounded-lg p-2 mb-4" rows="4"></textarea>
                    <div class="flex space-x-4 mb-4">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-2">Live Video</button>
                        <button class="flex-1 bg-green-500 hover:bg-green-600 text-white rounded-lg p-2">Photo/Video</button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg p-2">Feeling/Activity</button>
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-2" @click="open = false">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
