DROP PROCEDURE IF EXISTS SP_GetAllProductenperleverancier;
DELIMITER $$

CREATE PROCEDURE SP_GetAllProductenperleverancier(
    IN lvrn_id INT
)
BEGIN
    SELECT
        prd.Naam
        ,mag.AantalAanwezig AS Aantal
        ,IF(mag.VerpakkingsEenheid % 1 = 0,ROUND(mag.VerpakkingsEenheid),
        mag.VerpakkingsEenheid) AS Eenheid
        ,MAX(ppl.`DatumLevering`) AS `DatumLevering`
    FROM
        Product AS prd
    JOIN
        Magazijn AS mag
        ON mag.ProductId = prd.Id
    JOIN
        ProductPerLeverancier AS ppl
        ON ppl.ProductId = prd.Id
        AND ppl.LeverancierId = lvrn_id
    GROUP BY
        prd.Id,
        prd.Naam,
        mag.AantalAanwezig,
        Eenheid;
END $$

DELIMITER ;
