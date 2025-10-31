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


DROP PROCEDURE IF EXISTS sp_GetAllLeveringen;

DELIMITER $$

CREATE PROCEDURE sp_GetAllLeveringen(
    IN product_id INT
)
BEGIN
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

