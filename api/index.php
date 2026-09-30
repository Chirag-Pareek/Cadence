<?php

// ──────────────────────────────────────────────────────
// Vercel Serverless PHP Entrypoint for Laravel + Livewire
// ──────────────────────────────────────────────────────

// 1. Create required /tmp directories
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Initialize SQLite database with full schema if missing or empty
$dbPath = '/tmp/database.sqlite';

if (!file_exists($dbPath) || filesize($dbPath) === 0) {
    // Try to copy the pre-seeded database first
    $seededDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($seededDb) && filesize($seededDb) > 0) {
        copy($seededDb, $dbPath);
        chmod($dbPath, 0666);
    } else {
        // Fallback: create database with schema from scratch
        touch($dbPath);
        chmod($dbPath, 0666);

        $pdo = new PDO("sqlite:$dbPath");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("PRAGMA journal_mode=WAL;");

        $pdo->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                migration VARCHAR(255) NOT NULL,
                batch INTEGER NOT NULL
            );

            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                email_verified_at DATETIME,
                password VARCHAR(255),
                remember_token VARCHAR(100),
                created_at DATETIME,
                updated_at DATETIME
            );

            CREATE TABLE IF NOT EXISTS sessions (
                id VARCHAR(255) PRIMARY KEY,
                user_id INTEGER,
                ip_address VARCHAR(45),
                user_agent TEXT,
                payload TEXT NOT NULL,
                last_activity INTEGER NOT NULL
            );
            CREATE INDEX IF NOT EXISTS sessions_user_id_index ON sessions (user_id);
            CREATE INDEX IF NOT EXISTS sessions_last_activity_index ON sessions (last_activity);

            CREATE TABLE IF NOT EXISTS cache (
                key VARCHAR(255) PRIMARY KEY,
                value TEXT NOT NULL,
                expiration INTEGER NOT NULL
            );

            CREATE TABLE IF NOT EXISTS cache_locks (
                key VARCHAR(255) PRIMARY KEY,
                owner VARCHAR(255) NOT NULL,
                expiration INTEGER NOT NULL
            );

            CREATE TABLE IF NOT EXISTS habits (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
                name VARCHAR(255) NOT NULL,
                color VARCHAR(255) NOT NULL DEFAULT '#ffffff',
                is_active BOOLEAN NOT NULL DEFAULT 1,
                'order' INTEGER NOT NULL DEFAULT 0,
                created_at DATETIME,
                updated_at DATETIME
            );

            CREATE TABLE IF NOT EXISTS habit_completions (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                habit_id INTEGER NOT NULL REFERENCES habits(id) ON DELETE CASCADE,
                completed_at DATE NOT NULL,
                created_at DATETIME,
                updated_at DATETIME
            );

            INSERT INTO migrations (migration, batch) VALUES
            ('0001_01_01_000000_create_users_table', 1),
            ('0001_01_01_000001_create_cache_table', 1),
            ('0001_01_01_000002_create_jobs_table', 1),
            ('2025_01_19_130232_create_habits_table', 1);
        ");
    }
}

// 3. Forward to Laravel
require __DIR__ . '/../public/index.php';
