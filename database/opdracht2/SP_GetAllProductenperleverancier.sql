DROP PROCEDURE IF EXISTS SP_GetAllProductenperleverancier;
DELIMITER $$

CREATE PROCEDURE SP_GetAllProductenperleverancier(
    IN lvrn_id INT
)
BEGIN
    SELECT
        prd.Id,
        prd.Naam,
        mag.AantalAanwezig AS Aantal,
        IF(
            mag.VerpakkingsEenheid = FLOOR(mag.VerpakkingsEenheid),
            CAST(mag.VerpakkingsEenheid AS UNSIGNED),
            mag.VerpakkingsEenheid
        ) AS Eenheid,
        dl.DatumLevering
    FROM Product prd
    JOIN Magazijn mag
        ON mag.ProductId = prd.Id
    JOIN (
        SELECT ProductId, MAX(DatumLevering) AS DatumLevering
        FROM ProductPerLeverancier
        WHERE LeverancierId = lvrn_id
        GROUP BY ProductId
    ) dl
        ON dl.ProductId = prd.Id;
END $$
DELIMITER ;
