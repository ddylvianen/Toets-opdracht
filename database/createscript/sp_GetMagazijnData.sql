DROP PROCEDURE IF EXISTS sp_GetMagazijndata;

DELIMITER $$

CREATE PROCEDURE sp_GetMagazijndata(
    IN product_id INT
)
BEGIN
    SELECT
        VerpakkingsEenheid
        ,AantalAanwezig
    FROM
        Magazijn
    WHERE
        ProductId = Product_id;
END$$

DELIMITER ;