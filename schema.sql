-- Create and use the database
CREATE DATABASE concertdb;
USE concertdb;

-- Create the rock_concert_attendances table
CREATE TABLE rock_concert_attendances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attendee_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    concert_name VARCHAR(150) NOT NULL,
    venue VARCHAR(150) NOT NULL,
    concert_date DATE NOT NULL,
    ticket_type ENUM('VIP', 'General Admission', 'Backstage Pass') NOT NULL,
    ticket_price DECIMAL(8, 2) NOT NULL,
    seats_purchased INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample records
INSERT INTO rock_concert_attendances 
    (attendee_name, email, concert_name, venue, concert_date, ticket_type, ticket_price, seats_purchased)
VALUES
    ('Juan dela Cruz', 'juan@email.com', 'Eraserheads Reunion', 'Mall of Asia Arena', '2025-06-15', 'VIP', 3500.00, 2),
    ('Maria Santos', 'maria@email.com', 'Parokya ni Edgar Live', 'Araneta Coliseum', '2025-07-20', 'General Admission', 1200.00, 1),
    ('Carlo Reyes', 'carlo@email.com', 'Rivermaya Anniversary', 'SM Seaside Cebu', '2025-08-10', 'Backstage Pass', 5000.00, 1),
    ('Ana Lim', 'ana@email.com', 'Eraserheads Reunion', 'Mall of Asia Arena', '2025-06-15', 'General Admission', 1800.00, 3),
    ('Ben Torres', 'ben@email.com', 'Bamboo Live', 'Kia Theater', '2025-09-05', 'VIP', 4000.00, 2),
    ('Rosa Flores', 'rosa@email.com', 'Parokya ni Edgar Live', 'Araneta Coliseum', '2025-07-20', 'VIP', 2500.00, 1),
    ('Mark Villanueva', 'mark@email.com', 'Rivermaya Anniversary', 'SM Seaside Cebu', '2025-08-10', 'General Admission', 900.00, 4),
    ('Liza Cruz', 'liza@email.com', 'Bamboo Live', 'Kia Theater', '2025-09-05', 'General Admission', 1500.00, 2);