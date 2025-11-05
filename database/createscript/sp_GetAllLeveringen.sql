DROP PROCEDURE IF EXISTS sp_GetAllLeveringen;

DELIMITER $$

CREATE PROCEDURE sp_GetAllLeveringen(
    IN product_id INT
)
BEGIN

    SELECT 
    
    SELECT
        lvr.Naam as LeverancierNaam
        ,lvr.Contactpersoon
        ,lvr.Leveranciernummer
        ,lvr.Mobiel
        ,DATE_FORMAT(ppl.DatumLevering, '%d-%m-%Y') AS DatumLevering
        ,ppl.Aantal
        ,DATE_FORMAT(ppl.DatumEerstVolgendeLevering, '%d-%m-%Y') AS DatumEerstVolgendeLevering
    FROM
        Leverancier AS lvr
    JOIN
        ProductPerLeverancier AS ppl
    ON
        ppl.LeverancierId = lvr.Id
    WHERE
        ppl.ProductId = Product_Id
    ORDER BY
        ppl.DatumLevering ASC;
END$$

DELIMITER ;