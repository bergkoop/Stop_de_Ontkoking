-- Run this once AFTER importing ontkoking.sql.
-- Adds the online/offline status shown in the admin panel.
ALTER TABLE recipes
ADD status ENUM('online','offline') NOT NULL DEFAULT 'online' AFTER servings;
