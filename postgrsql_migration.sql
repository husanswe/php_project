-- Drop table if exists (clean start)
DROP TABLE IF EXISTS posts;

-- Create table (PostgreSQL syntax)
CREATE TABLE posts (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data (MySQL'dan ko'chirilgan)
INSERT INTO posts (title, body, created_at) VALUES
('First Post', 'Hello World', '2025-01-07 10:00:00'),
('Second Post', 'Test post', '2025-01-07 11:00:00');

-- Add more inserts if you have more data