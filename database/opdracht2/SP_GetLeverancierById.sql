DROP PROCEDURE IF EXISTS SP_GetLeverancierById;
DELIMITER $$

CREATE PROCEDURE SP_GetLeverancierById(
    IN lvrn_id INT
)
BEGIN
    SELECT
         lvn.Id
         ,lvn.Naam
         ,lvn.Contactpersoon
         ,lvn.Leveranciernummer
         ,lvn.Mobiel
    FROM
        Leverancier AS lvn
    WHERE 
        lvn.Id = lvrn_id;
END $$

DELIMITER ;
