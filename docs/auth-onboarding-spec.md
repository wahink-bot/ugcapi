# Build a Production-Ready Authentication, User Onboarding & Academic Framework System for ugcapi.com

I am building **ugcapi.com**, a professional academic platform providing academic scoring, API/PBAS/CAS-related calculators, and other faculty career/academic tools.

I want you to build a complete, production-ready **Google Authentication + User Onboarding + Academic Profile + Academic Framework selection system**, including the frontend, backend, database, routing, validation, security, and session management.

The architecture must be designed for future expansion.

---

# 1. FIRST: INSPECT THE EXISTING PROJECT

Before modifying or creating anything:

1. Inspect the complete existing codebase.
2. Identify:

   * Frontend framework
   * Backend framework
   * Database
   * ORM
   * Authentication system
   * Routing
   * API architecture
   * UI/component library
   * CSS/styling system
   * Environment configuration
3. Understand how the existing calculators and other features work.
4. Identify existing reusable components.
5. Do NOT replace the existing technology stack.
6. Do NOT create a second backend or database.
7. Do NOT break existing calculators or pages.
8. Reuse the existing architecture wherever possible.

Before implementation, briefly explain:

* What stack you found
* How authentication currently works, if anything exists
* What database structure exists
* What architecture you recommend
* Which files you intend to create/modify

Then proceed with implementation.

---

# 2. CORE ARCHITECTURAL CONCEPT

IMPORTANT:

Throughout the backend and database, use the term:

**Academic Framework**

as the primary concept.

Do NOT design the entire application around the word "API".

The user-facing framework names will initially be:

* UGC API 2018
* UGC API 2025
* BSUSC 2026
* JPSC 2026

But internally, these should be represented as **AcademicFramework** records.

This distinction is important because ugcapi.com may eventually contain multiple types of academic scoring and assessment systems.

The architecture should therefore support:

```text
Academic Framework
        │
        ├── Version / Configuration
        │
        ├── Categories
        │
        ├── Criteria
        │
        ├── Scoring Rules
        │
        ├── Eligibility Rules
        │
        └── Calculator Configuration
```

Do NOT implement all of these future features unless required now.

However, design the current database so that adding them later does not require rebuilding the authentication or framework architecture.

---

# 3. OVERALL USER JOURNEY

The complete user flow should be:

```text
                         ugcapi.com
                             │
                             ▼
                      Login / Sign In
                             │
                             ▼
                   Continue with Google
                             │
                             ▼
                       Google OAuth
                             │
                             ▼
                  Backend verifies identity
                             │
                             ▼
                     Find/Create User
                             │
                             ▼
                  Is Academic Profile complete?
                       /                  \
                     NO                    YES
                     │                      │
                     ▼                      ▼
             Complete Your Profile       Dashboard
                     │
                     ▼
             Select Academic Rank
                     │
                     ▼
          Select Academic Framework(s)
                     │
                     ▼
              Complete Profile
                     │
                     ▼
                   Dashboard
```

This must be a real end-to-end implementation, not a mock frontend.

---

# 4. AUTHENTICATION — GOOGLE ONLY

Use **Google OAuth / OpenID Connect** as the primary authentication mechanism.

The login page should prominently display:

**Continue with Google**

Do not create a traditional username/password registration system unless the existing architecture absolutely requires it.

The backend must securely verify the user's Google identity.

Never trust authentication information supplied directly by the frontend.

---

# 5. LOGIN PAGE

Create a professional login page suitable for an academic technology/SaaS platform.

Use the existing ugcapi.com branding, colors, typography, and components wherever available.

### Heading

**Welcome to UGC API**

### Supporting text

**Sign in to access your academic scoring tools, personalized profile, and dashboard.**

### Main authentication button

**Continue with Google**

Include the official Google "G" logo.

The page must include:

* Desktop responsiveness
* Tablet responsiveness
* Mobile responsiveness
* Loading state
* Authentication error state
* Network error state
* Accessible focus states
* Keyboard navigation
* Proper semantic HTML
* Appropriate ARIA attributes

Keep the visual design clean and professional.

Avoid excessive gradients, glassmorphism, unnecessary animations, or flashy decoration.

---

# 6. SEPARATE IDENTITY FROM ACADEMIC PROFILE

Do not mix Google authentication information with academic information.

Use a logical structure such as:

```text
User
 │
 ├── Authentication / Identity
 │      ├── Google ID
 │      ├── Email
 │      ├── Name
 │      └── Profile Picture
 │
 └── Academic Profile
        ├── Academic Rank
        └── Selected Academic Frameworks
```

This separation is intentional and should be preserved.

---

# 7. USER DATABASE MODEL

Create a User model/entity appropriate for the existing database technology.

Conceptually:

```text
User
----
id
google_id
email
name
profile_picture_url
created_at
updated_at
last_login_at
```

Add appropriate:

* Unique constraints
* Indexes
* Foreign keys where relevant
* NOT NULL constraints
* Timestamps

The Google ID should uniquely identify the Google account.

Email should also be appropriately indexed/handled to prevent duplicate accounts.

---

# 8. ACADEMIC PROFILE

Create a separate AcademicProfile associated with the User.

Conceptually:

```text
AcademicProfile
---------------
id
user_id
academic_rank_id
profile_completed
created_at
updated_at
```

Relationship:

```text
User
 │
 └── AcademicProfile
          │
          └── AcademicRank
```

A user should normally have one academic profile.

Do not put all academic information directly into the User table.

This allows the authentication system to remain independent from academic data.

---

# 9. ACADEMIC RANK — DATA DRIVEN

Do NOT store the user's academic rank as arbitrary text.

Create:

## AcademicRank

```text
AcademicRank
------------
id
name
code
description
level
is_active
created_at
updated_at
```

Initially seed:

### Assistant Professor

```text
code: ASSISTANT_PROFESSOR
level: 1
```

### Associate Professor

```text
code: ASSOCIATE_PROFESSOR
level: 2
```

### Full Professor

```text
code: FULL_PROFESSOR
level: 3
```

User-facing explanation:

**Assistant Professor, Associate Professor, and Full Professor form the standard three-tier academic hierarchy in universities.**

The hierarchy must be represented through database data rather than hard-coded logic throughout the application.

This allows additional ranks to be added later.

---

# 10. ACADEMIC FRAMEWORK — DATA DRIVEN

Create a dedicated:

## AcademicFramework

model/entity.

Conceptually:

```text
AcademicFramework
-----------------
id
name
code
short_name
description
authority
year
is_active
created_at
updated_at
```

Initially seed the following frameworks:

---

### UGC API 2018

```text
name: UGC API 2018
code: UGC_API_2018
short_name: UGC API 2018
year: 2018
```

---

### UGC API 2025

```text
name: UGC API 2025
code: UGC_API_2025
short_name: UGC API 2025
year: 2025
```

---

### BSUSC 2026

```text
name: BSUSC 2026
code: BSUSC_2026
short_name: BSUSC 2026
year: 2026
```

---

### JPSC 2026

```text
name: JPSC 2026
code: JPSC_2026
short_name: JPSC 2026
year: 2026
```

The frontend must retrieve active AcademicFramework records from the backend.

Do NOT hard-code the framework list into multiple frontend components.

---

# 11. FRAMEWORK VERSIONING

Design the architecture so that a framework can have multiple versions/configurations in the future.

For example:

```text
AcademicFramework
        │
        └── FrameworkVersion
                │
                ├── Effective Date
                ├── Categories
                ├── Criteria
                └── Scoring Rules
```

For the current implementation, you may either:

1. Keep the initial four frameworks as individual framework records, or
2. Introduce a lightweight version/configuration model if it fits naturally with the existing architecture.

Choose the cleaner option based on the existing project.

Do not over-engineer this unnecessarily.

The important requirement is that the architecture must not make future framework versions difficult to add.

---

# 12. USER ↔ ACADEMIC FRAMEWORK RELATIONSHIP

A user may select multiple Academic Frameworks.

Therefore use a proper many-to-many relationship.

Recommended structure:

```text
User
 │
 └── AcademicProfile
          │
          └── UserAcademicFramework
                    │
                    └── AcademicFramework
```

Create something conceptually like:

```text
UserAcademicFramework
---------------------
id
academic_profile_id
framework_id
created_at
```

Add a unique constraint preventing the same framework from being selected twice for the same profile.

Do NOT store:

```text
"UGC API 2018, UGC API 2025, BSUSC 2026"
```

inside one database field.

---

# 13. COMPLETE PROFILE PAGE

After Google authentication:

If the user does not have a completed AcademicProfile, redirect to:

**/complete-profile**

Heading:

# Complete Your Profile

Supporting text:

**Tell us about your academic profile so we can personalize your UGC API experience.**

Display Google account information:

* Profile picture
* Name
* Email

These should be read-only.

---

# 14. STEP 1 — SELECT ACADEMIC RANK

Ask:

## What is your current academic rank?

Show:

```text
Assistant Professor
Associate Professor
Full Professor
```

Retrieve these options from:

```text
GET /api/academic-ranks
```

or the equivalent API convention used by the project.

Use selectable cards rather than a generic dropdown.

Example:

```text
┌─────────────────────────────────┐
│ ○ Assistant Professor           │
│                                 │
│ Early-career academic rank     │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│ ○ Associate Professor           │
│                                 │
│ Mid-career academic rank        │
└─────────────────────────────────┘

┌─────────────────────────────────┐
│ ○ Full Professor                │
│                                 │
│ Senior academic rank            │
└─────────────────────────────────┘
```

Only one rank can be selected.

---

# 15. STEP 2 — SELECT ACADEMIC FRAMEWORKS

Ask:

# Which Academic Frameworks do you want to use?

Supporting text:

**Select all frameworks relevant to your academic work. You can change these later from your profile.**

Retrieve active frameworks from the backend.

Initially:

```text
☐ UGC API 2018
☐ UGC API 2025
☐ BSUSC 2026
☐ JPSC 2026
```

Allow multiple selections.

Each framework card should be capable of displaying:

* Framework name
* Year
* Authority
* Short description

Use accessible checkbox/card controls.

At least one framework must be selected.

---

# 16. PROFILE COMPLETION

At the bottom:

**Complete Profile**

Button requirements:

Disabled when:

```text
Academic Rank = not selected
OR
Academic Frameworks = none selected
```

Enabled when:

```text
Academic Rank = selected
AND
At least one Academic Framework = selected
```

When clicked:

```text
Frontend validation
        ↓
Backend validation
        ↓
Create/update AcademicProfile
        ↓
Save selected UserAcademicFramework records
        ↓
Set profile_completed = true
        ↓
Redirect to Dashboard
```

The backend must independently validate everything.

---

# 17. PROFILE COMPLETION MUST BE EXTENSIBLE

Do not design the profile system around only two questions.

Currently:

```text
Academic Rank
Academic Frameworks
```

But later I may add:

```text
Institution
University
Department
Discipline
Years of Experience
Current Position
Research Interests
State
Country
```

The architecture should allow these to be added without redesigning authentication.

---

# 18. DASHBOARD

After successful profile completion:

Redirect to:

**/dashboard**

Display:

**Welcome back, [Name]**

Show the user's selected Academic Frameworks.

For example:

```text
Your Academic Frameworks

┌─────────────────┐
│ UGC API 2018   │
└─────────────────┘

┌─────────────────┐
│ UGC API 2025   │
└─────────────────┘

┌─────────────────┐
│ BSUSC 2026      │
└─────────────────┘
```

The dashboard should be a clean foundation for future calculator functionality.

Do not build unnecessary dashboard features now.

---

# 19. FRAMEWORK → CALCULATOR ARCHITECTURE

This is an important future requirement.

The selected Academic Framework should eventually determine which calculator/scoring system the user interacts with.

Conceptually:

```text
User
 │
 └── AcademicProfile
        │
        └── Selected Academic Framework
                    │
                    ▼
              Framework Page
                    │
                    ▼
              Categories
                    │
                    ▼
                Criteria
                    │
                    ▼
              Scoring Rules
                    │
                    ▼
               Calculator
```

For example:

```text
UGC API 2018
      ↓
UGC API 2018 categories
      ↓
UGC API 2018 scoring rules
      ↓
UGC API calculator
```

and:

```text
UGC API 2025
      ↓
UGC API 2025 categories
      ↓
UGC API 2025 scoring rules
      ↓
UGC API calculator
```

Do NOT merge scoring logic between frameworks.

Each framework must be capable of having independent rules.

---

# 20. FRAMEWORK-SPECIFIC SCORING

Design the future architecture so that:

```text
AcademicFramework
       │
       ├── FrameworkVersion
       │
       ├── Category
       │
       ├── Criterion
       │
       └── ScoringRule
```

can eventually support framework-specific calculation logic.

For example:

```text
UGC API 2018
```

may have different criteria and scores from:

```text
UGC API 2025
```

Therefore do not create a universal hard-coded scoring formula that assumes all frameworks work the same way.

This is an architectural requirement, not necessarily something that needs to be fully implemented in this authentication task.

---

# 21. AUTHENTICATED USER ENDPOINT

Create an endpoint equivalent to:

```text
GET /api/auth/me
```

It should return the authenticated user's safe information.

For example:

```json
{
  "id": "...",
  "name": "...",
  "email": "...",
  "profilePicture": "...",
  "isAuthenticated": true,
  "profileCompleted": true
}
```

If appropriate, also return:

```text
academicProfile
academicRank
selectedFrameworks
```

Do not expose sensitive authentication information.

---

# 22. PROTECTED ROUTES

Public:

```text
/
 /login
```

Authenticated:

```text
/dashboard
/profile
/settings
```

Authenticated + profile complete:

```text
/calculators
/frameworks/*
```

If unauthenticated:

```text
→ /login
```

If authenticated but profile incomplete:

```text
→ /complete-profile
```

If authenticated and profile complete:

```text
→ requested page
```

Implement authorization on the backend as well.

Frontend route guards alone are NOT sufficient.

---

# 23. USER ACCOUNT MENU

Integrate into the existing navigation.

Show:

```text
[Profile Picture] [Name] ▼
```

Menu:

```text
My Profile
Settings
Log Out
```

If the existing application already has an account menu, extend it rather than creating another one.

---

# 24. PROFILE PAGE

Create:

**/profile**

Sections:

### Account

* Profile picture
* Name
* Email

### Academic Profile

* Academic Rank
* Selected Academic Frameworks

Allow the user to edit:

* Academic rank
* Framework selection

Google identity information should not be arbitrarily editable.

---

# 25. LOGOUT

Implement proper logout.

When the user clicks Log Out:

1. Invalidate the authenticated session.
2. Clear authentication cookies/tokens where appropriate.
3. Clear client-side authentication state.
4. Redirect to `/login` or homepage.
5. Verify that previously authenticated API requests are rejected.

---

# 26. SECURITY

Treat this as a production authentication system.

Implement appropriate protection for:

* OAuth state
* Google identity/token verification
* Session management
* HTTP-only cookies where appropriate
* Secure cookies in production
* SameSite configuration
* CSRF protection where applicable
* CORS
* Input validation
* Authorization
* Database constraints
* Duplicate-account prevention
* Session expiration
* Logout/session invalidation
* Rate limiting where appropriate

Never:

* Hard-code OAuth secrets
* Commit credentials to Git
* Trust a frontend-provided user ID
* Trust an unverified Google token
* Store unnecessary Google access/refresh tokens
* Expose stack traces to users
* Return sensitive authentication data to the frontend

---

# 27. ENVIRONMENT VARIABLES

Create/update `.env.example`.

Use the appropriate variables based on the actual stack.

For example, if required:

```text
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=
```

Do not invent unnecessary environment variables.

Never put real credentials into source code.

---

# 28. API ARCHITECTURE

Follow the existing project's API conventions.

Conceptually, functionality equivalent to:

```text
Authentication
--------------
GET  /api/auth/me
POST /api/auth/google
POST /api/auth/logout

Academic Profile
----------------
GET  /api/profile
PUT  /api/profile

Academic Ranks
--------------
GET  /api/academic-ranks

Academic Frameworks
-------------------
GET  /api/frameworks
```

Use the project's established routing conventions rather than blindly using these exact URLs.

---

# 29. DATABASE SEEDING

Create a proper idempotent seed mechanism.

Seed Academic Ranks:

```text
ASSISTANT_PROFESSOR
ASSOCIATE_PROFESSOR
FULL_PROFESSOR
```

Seed Academic Frameworks:

```text
UGC_API_2018
UGC_API_2025
BSUSC_2026
JPSC_2026
```

Running the seed process multiple times must not create duplicate records.

---

# 30. FUTURE FRAMEWORK ARCHITECTURE

Keep the following conceptual architecture in mind:

```text
AcademicFramework
       │
       └── FrameworkVersion
              │
              ├── Category
              │      │
              │      └── Criterion
              │
              ├── ScoringRule
              │
              ├── EligibilityRule
              │
              └── CalculatorConfiguration
```

This will allow ugcapi.com to grow from a simple calculator website into a framework-driven academic platform.

Do not fully implement these future entities unless necessary for the current task.

---

# 31. ERROR HANDLING

Handle:

* Google authentication failure
* User cancellation
* Expired authentication
* Invalid authentication
* Network failure
* Database failure
* Profile save failure
* Missing academic rank
* No framework selected
* Unauthorized requests
* Forbidden requests
* Expired session

Use user-friendly error messages.

Never expose:

* Stack traces
* SQL errors
* OAuth secrets
* Internal server information
* Sensitive authentication details

---

# 32. ACCESSIBILITY

Use good accessibility practices:

* Keyboard navigation
* Visible focus states
* Proper labels
* Semantic HTML
* Screen-reader-friendly controls
* Accessible error messages
* Appropriate ARIA attributes
* Accessible selectable cards

---

# 33. RESPONSIVE DESIGN

The complete authentication and onboarding experience must work on:

* Desktop
* Laptop
* Tablet
* Mobile

Pay particular attention to the framework-selection cards on small screens.

---

# 34. DO NOT BREAK EXISTING UG C API FEATURES

After implementation, verify that existing functionality still works.

Test:

* Existing pages
* Existing calculators
* Existing API endpoints
* Existing navigation
* Existing styling
* Existing database functionality

Do not make unrelated architectural changes.

---

# 35. TESTING

Test at minimum:

## New user

```text
Google Login
→ User created
→ Academic Profile incomplete
→ Complete Profile
→ Select Academic Rank
→ Select Framework
→ Save
→ Dashboard
```

## Existing user

```text
Google Login
→ Existing User identified
→ Profile complete
→ Dashboard
```

## Multiple frameworks

```text
Select:
UGC API 2018
UGC API 2025
BSUSC 2026

→ Three UserAcademicFramework relationships created
```

## Profile editing

```text
Profile
→ Change rank
→ Change frameworks
→ Save
→ Verify database
```

## Logout

```text
Dashboard
→ Logout
→ Session invalidated
→ Login page
→ Protected API inaccessible
```

## Unauthorized access

Attempt to directly access protected frontend and backend endpoints without authentication.

## Incomplete profile

```text
Authenticated
+
Profile incomplete
→ /complete-profile
```

## Mobile

Test the entire flow at mobile viewport sizes.

---

# 36. IMPLEMENTATION ORDER

Follow this sequence:

## Phase 1 — Inspect

Understand the existing project.

## Phase 2 — Architecture

Choose the best authentication, database, ORM, session, and routing approach based on the existing stack.

## Phase 3 — Database

Create:

* User
* AcademicProfile
* AcademicRank
* AcademicFramework
* UserAcademicFramework

and any supporting structures actually required.

## Phase 4 — Seed Data

Seed:

* Academic ranks
* Academic frameworks

## Phase 5 — Backend

Implement:

* Google authentication
* User creation/retrieval
* Sessions
* Authentication middleware
* Profile APIs
* Academic Rank API
* Academic Framework API
* Authorization

## Phase 6 — Frontend

Implement:

* Login
* Google authentication
* Complete Profile
* Academic Rank selection
* Academic Framework selection
* Dashboard integration
* Profile page
* Account menu
* Logout

## Phase 7 — Security Review

Review authentication, authorization, cookies, OAuth, and API security.

## Phase 8 — Testing

Run the complete flow and fix all errors.

---

# 37. FINAL REPORT

After implementation, provide me with:

## Architecture

Explain:

* Frontend
* Backend
* Database
* ORM
* Authentication method
* Session strategy

and why you selected them.

## Files Created

List important new files.

## Files Modified

List existing files changed.

## Database

Explain:

* Models/tables
* Relationships
* Constraints
* Migrations
* Seed data

Especially explain:

```text
User
AcademicProfile
AcademicRank
AcademicFramework
UserAcademicFramework
```

## Environment Variables

Tell me exactly what I need to add to `.env`.

## Google OAuth Setup

Give exact instructions for:

1. Creating Google OAuth credentials
2. Configuring authorized origins
3. Configuring redirect URIs
4. Adding environment variables
5. Running the application

## Testing

Give me an exact checklist for:

* New Google user
* Existing Google user
* Failed login
* Profile completion
* Academic rank selection
* Framework selection
* Multiple frameworks
* Profile editing
* Logout
* Unauthorized access
* Mobile responsiveness

---

# FINAL REQUIREMENT

Do not create a fake/demo authentication system.

I need a real working end-to-end implementation:

```text
Google
   ↓
OAuth / OpenID Connect
   ↓
Backend identity verification
   ↓
User
   ↓
AcademicProfile
   ↓
AcademicRank
   ↓
AcademicFramework selection
   ↓
UserAcademicFramework
   ↓
Profile Completed
   ↓
Dashboard
   ↓
Framework-specific calculators
```

The authentication system and academic framework system must be properly connected.

Most importantly, design this as the **foundation of ugcapi.com**, not as a one-off login page.

Start by inspecting the existing codebase. Do not blindly replace files.

First explain the existing architecture and your proposed implementation plan, then implement it.
