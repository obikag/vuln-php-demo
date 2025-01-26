<?php
$db = new SQLite3('database/acme.db');

// Create users table if not exists
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    role TEXT NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT NOT NULL,
    category TEXT NOT NULL,
    image_path TEXT NOT NULL,
    price REAL NOT NULL
)");

$db-> exec("CREATE TABLE IF NOT EXISTS contact_submissions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Add a demo users
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('john', '".password_hash('password123', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('james', '".password_hash('adidas', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('jane', '".password_hash('kfgjxrf', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('alex', '".password_hash('little1', PASSWORD_BCRYPT)."','user')");
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES ('admin', '".password_hash('letmein', PASSWORD_BCRYPT)."','admin')");

// Add demo products
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('90 Degree Copper Fitting', 'A copper fitting for your plumbing and gas projects', 'Basic', 'images/products/prod-1-1.jpg', 39.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('90 Degree Glass Fitting', 'A glass fitting for your gas projects', 'Leading-Edge', 'images/products/prod-1-2.jpg', 99.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('Quad Steel Outlet Fitting', 'A steel fitting for your underwater maritime projects', 'Basic', 'images/products/prod-2-1.jpg', 49.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('Quad Copper Outlet Fitting', 'A copper fitting for your plumbing and gas projects', 'Performance', 'images/products/prod-2-2.jpg', 45.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('Quad Iron Outlet Fitting', 'An iron fitting for your plumbing projects', 'Premium', 'images/products/prod-3-1.jpg', 89.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('Quad Carbon Fibre Outlet Fitting', 'A specialised fitting for multipurpose projects', 'Leading-Edge', 'images/products/prod-3-2.jpg', 99.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('PVC One Way Extender Fitting', 'A one way extender for your plumbing projects', 'Basic', 'images/products/prod-4-1.jpg', 10.99)");
$db->exec("INSERT OR IGNORE INTO products (name, description, category, image_path, price) VALUES ('Quad Outlet PVC Fitting', 'A PVC fitting for your plumbing projects', 'Premium', 'images/products/prod-4-2.jpg', 5.99)");

echo "Database setup completed.\n";
