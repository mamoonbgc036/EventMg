CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, 
    event_name VARCHAR(255) NOT NULL,
    event_desc TEXT NOT NULL,
    event_date DATE NOT NULL,
    event_seat INT NOT NULL,
    event_time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, role, password, phone) 
VALUES ('admin', 'admin@gmail.com', 1, 
        '$2a$13$dTsvpA5D7IbXuYedZZvW5OQIiMMA.Qzha1mj.YDol7O4/F4sdoVaS', 
        '1234567890');

