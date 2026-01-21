# CodeChamp (Competitive Programming Social Platform)

A Laravel 9 app that combines article-style content with competitive programming battles and a simple online judge.

## Features (Implemented)

- **Articles (Listings)**: create/edit/delete, image upload, tags, full‑text search, and rich‑text editing (CKEditor).
- **Trending sidebar**: ranks articles by likes, comments, and recency.
- **Likes + threaded comments** on articles.
- **User accounts**: register/login/logout.
- **Profiles**: edit profile fields, upload avatar/cover, follow/unfollow, and a user list page.
- **Battles**: invite users from the Codeforces problem list, accept/reject via notification dropdown, view battleground and results, and submit solutions.
- **Online judge page**: runs C++ against local testcases stored in `public/testcases`.

## Requirements

- PHP 8.0.2+
- Composer
- Node.js + npm
- MySQL (default) or another Laravel‑supported database

## Setup

1. Install PHP dependencies
   ```bash
   composer install
   ```

2. Install frontend dependencies
   ```bash
   npm install
   ```

3. Create your environment file
   ```bash
   cp .env.example .env
   ```

4. Generate an app key
   ```bash
   php artisan key:generate
   ```

5. Configure your database in `.env`

6. Run migrations (optional: seed sample data)
   ```bash
   php artisan migrate
   # or
   php artisan migrate --seed
   ```

7. Create the storage symlink for uploads
   ```bash
   php artisan storage:link
   ```

## Running Locally

- Start the Laravel server
  ```bash
  php artisan serve
  ```

- In another terminal, start the Vite dev server
  ```bash
  npm run dev
  ```

Visit `http://localhost:8000`.

## Feature Notes

### Codeforces Problems & Battles
- `/problems` fetches problems from the Codeforces API.
- Battle invites appear in the navbar notification dropdown and can be accepted/rejected.
- Battle submission and result lookups call a local service at `http://127.0.0.1:5000` with:
  - `POST /submit`
  - `GET /get_submission_details/{id}`
  This service is **not included** in the repository.

### Online Judge Page
- `/judgeme?id=<contest>&task=<index>` loads testcases from `public/testcases/<contest>/<task>`.
- The judge runs C++ via the OneCompiler RapidAPI endpoint. The API key is currently hardcoded in
  `resources/views/judge/index.blade.php`.

## Useful Commands

- Run tests
  ```bash
  php artisan test
  ```

- Build frontend assets
  ```bash
  npm run build
  ```
