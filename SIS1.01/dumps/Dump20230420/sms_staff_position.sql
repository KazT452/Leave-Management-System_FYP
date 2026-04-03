-- ----------------------------------------------------------------------------
-- Table sms.staff_position
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms`.`staff_position` (
  `position_id` INT NOT NULL,
  `position_name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`position_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;
