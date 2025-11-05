DROP PROCEDURE IF EXISTS sp_GetAllgergeenByProductId;

DELIMITER $$

CREATE PROCEDURE sp_GetAllgergeenByProductId(
    IN product_id INT
)
BEGIN
    SELECT
        alg.Naam AS AllergeenNaam
        ,alg.Omschrijving
    FROM
        Allergeen AS alg
    JOIN
        ProductPerAllergeen AS ppl ON ppl.AllergeenId = alg.Id
    WHERE
        ppl.ProductId = product_id
    ORDER BY
        alg.Naam ASC;
END$$

