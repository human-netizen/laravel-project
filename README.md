# Competitive Programming Social Platform

This is a Laravel-based social platform that combines competitive programming with social networking features. The platform allows users to engage in coding battles, share posts, and interact with other programmers.

## Core Features

### 1. Competitive Programming System
- **Code Battles**: Users can challenge each other to real-time coding competitions
  - Timed coding battles between two users
  - Problem-based competitions with specific contest IDs
  - Submission tracking and result comparison
- **Judge System**: Automated code evaluation system
  - Support for submitting solutions
  - Real-time feedback on submissions
  - Battle results and rankings

### 2. Social Networking
- **User Profiles**
  - Customizable profile with image and cover photo
  - Bio, location, job information
  - Activity feed showing recent posts and battles
- **Follow System**
  - Follow/Unfollow other users
  - Track followers and following counts
  - Social connections between programmers
- **Posts and Interactions**
  - Create and share posts with the community
  - Like and comment on posts
  - Threaded comments support
  - Trending posts algorithm based on:
    - Like count
    - Comment count
    - Post recency

### 3. Real-time Features
- **WebSocket Integration**
  - Real-time notifications
  - Live battle updates
  - Instant messaging capabilities
- **Battle Timer System**
  - Real-time countdown during battles
  - Synchronized battle start times
  - Live status updates

## Technical Stack

### Backend
- Laravel 9.x Framework
- PHP 8.0.2+
- Pusher for WebSocket functionality
- Laravel Sanctum for authentication
- Laravolt Avatar for user avatars

### Frontend
- Blade templating engine
- Alpine.js for reactive components
- Tailwind CSS for styling
- Real-time updates via WebSocket

### Database
- Migration system for database structure
- Relationships:
  - User followers/following
  - Posts and comments
  - Battle tracking
  - Notifications
  - Likes and interactions

## Features in Detail

### Listings System
- Create and share posts with the community
- Tag-based filtering and search functionality
- Trending algorithm incorporating:
  - Like count (weight: 1)
  - Comment count (weight: 2)
  - Post recency (weight: 3)
- Advanced comment system with threaded discussions

### Battle System
- Challenge other users to coding competitions
- Timed coding challenges
- Problem-based contests
- Submission tracking for both participants
- Real-time battle status updates
- Result compilation and display

### Profile System
- Comprehensive user profiles
- Activity tracking
- Social connections
- Customizable profile elements:
  - Profile picture
  - Cover photo
  - Bio
  - Location
  - Job information
  - Relationship status

## Getting Started

1. Clone the repository
2. Install dependencies: `composer install`
3. Set up environment variables: `cp .env.example .env`
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Start the development server: `php artisan serve`

## Contributing

Contributions are welcome! Please feel free to submit pull requests to help improve this platform.
