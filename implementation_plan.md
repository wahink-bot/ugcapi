# Implementation Plan: Authentication & Onboarding (Phases 2-6)

Based on the confirmed architectural decisions and the "Google-only" direction, here is the detailed implementation plan covering Phases 2 through 6 of the spec.

## Phase 2: Architecture

*   **Frontend Stack:** Standard HTML/CSS/JS (using existing Bootstrap layout as seen in `login.php`). Google Identity Services library for the frontend sign-in button.
*   **Backend Stack:** Plain PHP scripts organized in an `api/` directory. These endpoints will handle business logic and return JSON responses (no routing framework used).
*   **Dependency Management:** Composer will be used for PHP packages.
*   **Authentication & Config:** 
    *   `google/apiclient` to securely verify Google ID tokens on the backend.
    *   `vlucas/phpdotenv` to manage `.env` variables securely.
    *   PHP native `$_SESSION` for maintaining authenticated state, including a `profile_completed` flag to track onboarding progress.
*   **Database Management:** Plain sequential `.sql` migration files stored in a `database/` directory to document and apply schema changes.

---

## Phase 3: Database Setup

We will create a `.sql` migration file in the `database/` folder (e.g., `database/001_auth_onboarding_schema.sql`) to execute the following changes:

1.  **Modify `users` Table:**
    *   *Drop:* `password`, `whatsapp` columns.
    *   *Add/Ensure:* `google_id` (UNIQUE), `profile_picture_url`, `last_login_at`.
2.  **Create `academic_ranks` Table:**
    *   `id`, `name`, `code` (UNIQUE), `description`, `level`, `is_active`, timestamps.
3.  **Create `academic_frameworks` Table:**
    *   `id`, `name`, `code` (UNIQUE), `short_name`, `year`, `is_active`, timestamps.
4.  **Create `academic_profiles` Table:**
    *   `id`, `user_id` (FOREIGN KEY), `academic_rank_id` (FOREIGN KEY), `profile_completed` (BOOLEAN), timestamps.
5.  **Create `user_academic_frameworks` Table:**
    *   `id`, `academic_profile_id` (FOREIGN KEY), `framework_id` (FOREIGN KEY), timestamps.
    *   *Constraint:* UNIQUE(`academic_profile_id`, `framework_id`).

---

## Phase 4: Seed Data

A secondary `.sql` script (e.g., `database/002_seed_data.sql`) will insert the foundational taxonomy data using `INSERT IGNORE` (to remain idempotent):

*   **Academic Ranks:**
    *   Assistant Professor (Code: `ASSISTANT_PROFESSOR`, Level: 1)
    *   Associate Professor (Code: `ASSOCIATE_PROFESSOR`, Level: 2)
    *   Full Professor (Code: `FULL_PROFESSOR`, Level: 3)
*   **Academic Frameworks:**
    *   UGC API 2018 (Code: `UGC_API_2018`, Year: 2018)
    *   UGC API 2025 (Code: `UGC_API_2025`, Year: 2025)
    *   BSUSC 2026 (Code: `BSUSC_2026`, Year: 2026)
    *   JPSC 2026 (Code: `JPSC_2026`, Year: 2026)

---

## Phase 5: Backend API Implementation

1.  **Initialize Composer & Environment:**
    *   Run `composer init` and require `google/apiclient` and `vlucas/phpdotenv`.
    *   Create `.env.example` with Google OAuth placeholders (`GOOGLE_CLIENT_ID`, etc.) and DB credentials.
    *   Update `db_config.php` to load `.env` variables via `phpdotenv`.
    *   Update or create `.gitignore` to explicitly ignore `.env`, `vendor/`, and `composer.lock`.
2.  **Security Hardening (per Section 26):**
    *   **Session Security:** Set session cookie params (`HttpOnly`, `Secure` in production, `SameSite=Lax` or `Strict`) via `session_set_cookie_params()` *before* `session_start()` in all entry points.
    *   **CSRF Protection:** Generate and store a CSRF token in the session upon initialization. Require and validate this token on all state-changing endpoints (e.g., `POST api/profile/complete.php`, `PUT api/profile/update.php`).
3.  **Authentication Endpoints (`api/auth/`):**
    *   `api/auth/google.php`: 
        *   Receives the Google ID token from the frontend.
        *   Implements **basic rate limiting** (e.g., using a small DB table or session-based attempt counter keyed by IP) to prevent abuse.
        *   Uses `google/apiclient` to verify the signature/audience. 
        *   Finds or creates the user in the `users` table. 
        *   Checks `academic_profiles` to set `$_SESSION['profile_completed']`. 
        *   Calls `session_regenerate_id(true)` upon successful login to prevent session fixation.
        *   Initializes `$_SESSION['user_id']`.
    *   `api/auth/me.php`: Returns the current session state (isAuthenticated, profileCompleted, basic user info).
    *   `api/auth/logout.php`: Destroys the session and clears cookies.
4.  **Data Retrieval Endpoints (`api/`):**
    *   `api/academic-ranks.php`: Returns active academic ranks (JSON).
    *   `api/frameworks.php`: Returns active frameworks (JSON).
5.  **Profile Management Endpoints (`api/profile/`):**
    *   `api/profile/complete.php` (POST): Validates rank, framework inputs, and **CSRF token**. Creates the `academic_profile`, links frameworks in `user_academic_frameworks`, sets `profile_completed = 1` in DB, and refreshes `$_SESSION['profile_completed'] = true`.
    *   `api/profile/update.php` (PUT): Edits an existing profile and framework selections. Validates inputs and **CSRF token**, overwrites relationships in `user_academic_frameworks`, and refreshes `$_SESSION` to ensure no stale data.

---

## Phase 6: Frontend Development

1.  **`login.php` (Replace completely):**
    *   Remove all username/password/whatsapp form fields and validation logic.
    *   Integrate the Google Identity Services (`<script src="https://accounts.google.com/gsi/client" async defer></script>`).
    *   Add the visual "Continue with Google" button.
    *   Implement JavaScript callback to capture the JWT token and `POST` it to `api/auth/google.php`. Redirect to `/dashboard` or `/complete-profile.php` based on the response.
2.  **`complete-profile.php` (New Page):**
    *   Protected route: Redirects to login if unauthenticated. Redirects to dashboard if already completed.
    *   Fetches data from `api/academic-ranks.php` and `api/frameworks.php`.
    *   UI: Selectable cards for Rank (single choice) and Frameworks (multiple choice).
    *   Submit button triggers `api/profile/complete.php`.
3.  **`dashboard.php` (Update):**
    *   Protected route: Redirects to `login.php` if unauthenticated. Redirects to `complete-profile.php` if profile is incomplete.
    *   Displays welcome message with user name and selected frameworks.
4.  **`profile.php` (New Page):**
    *   Read-only view for Identity (Name, Email, Google Profile Pic).
    *   Editable form for Academic Rank and Frameworks, calling `api/profile/update.php`.
5.  **`navbar.php` (or existing layout header):**
    *   Add dynamic state checking `$_SESSION`.
    *   Render the User Account Menu: [Profile Picture] [Name] ▼ with links to "My Profile" and "Log Out".

---

Please review the plan above. Let me know if you would like to make any adjustments or if I should proceed with executing the implementation.
