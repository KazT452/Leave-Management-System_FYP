USE sms101;


CREATE TABLE IF NOT EXISTS leave_requests (
    leave_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    staff_id INT UNSIGNED NOT NULL, -- Fixed case to match staff table
    leave_type ENUM('Annual', 'Medical', 'Compassionate', 'Emergency', 'Maternity', 'Paternity', 'Unpaid') NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    reason VARCHAR(255), 
    attachment_path VARCHAR(255),
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    admin_remark TEXT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    -- Calculated: total days 
    leave_days INT AS (DATEDIFF(end_date, start_date) + 1) STORED,    
    
    
    CONSTRAINT fk_staff_leave 
    FOREIGN KEY (staff_id) REFERENCES user(id) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);