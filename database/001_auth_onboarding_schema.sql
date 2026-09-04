-- 001_auth_onboarding_schema.sql

-- 1. Modify users table
ALTER TABLE users 
DROP COLUMN password,
DROP COLUMN whatsapp;

ALTER TABLE users 
ADD COLUMN google_id VARCHAR(255) UNIQUE AFTER id,
ADD COLUMN profile_picture_url TEXT AFTER firstname,
ADD COLUMN last_login_at TIMESTAMP NULL DEFAULT NULL AFTER token_expiry;

-- 2. Create academic_ranks table
CREATE TABLE IF NOT EXISTS academic_ranks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    level INT NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 3. Create academic_frameworks table
CREATE TABLE IF NOT EXISTS academic_frameworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(100) NOT NULL UNIQUE,
    short_name VARCHAR(100) NOT NULL,
    year INT NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 4. Create academic_profiles table
CREATE TABLE IF NOT EXISTS academic_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    academic_rank_id INT NOT NULL,
    profile_completed BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (academic_rank_id) REFERENCES academic_ranks(id)
);

-- 5. Create user_academic_frameworks table
CREATE TABLE IF NOT EXISTS user_academic_frameworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    academic_profile_id INT NOT NULL,
    framework_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (academic_profile_id, framework_id),
    FOREIGN KEY (academic_profile_id) REFERENCES academic_profiles(id) ON DELETE CASCADE,
    FOREIGN KEY (framework_id) REFERENCES academic_frameworks(id) ON DELETE CASCADE
);
