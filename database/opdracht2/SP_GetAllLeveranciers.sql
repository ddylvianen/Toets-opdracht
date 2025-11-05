DROP PROCEDURE IF EXISTS SP_GetAllLeveranciers;
DELIMITER $$

CREATE PROCEDURE SP_GetAllLeveranciers()
BEGIN
    SELECT
         lvn.Id
        ,lvn.Naam
        ,lvn.Contactpersoon
        ,lvn.Leveranciernummer
        ,lvn.Mobiel
        ,(SELECT COUNT(*) FROM
          ProductPerLeverancier 
          WHERE LeverancierId = lvn.id) 
          AS Aantalproducten
    FROM
        Leverancier AS lvn;
END$$



