DROP PROCEDURE IF EXISTS sp_GetProductById;

DELIMITER $$

CREATE PROCEDURE sp_GetProductById(
    IN product_id INT
)
BEGIN
    SELECT
        Naam
        ,Barcode
    FROM
        `Product`
    WHERE
        Id = product_id;
END$$

DELIMITER ;