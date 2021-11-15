<?php


$triger="CREATE TRIGGER `Trg_Mesas_Historial` AFTER UPDATE on `tbl_mesas`
FOR EACH ROW
BEGIN
    IF (NEW.fin_reserva != OLD.fin_reserva) THEN
        INSERT INTO tbl_historial (id_mesa, capacidad_mesa, ubicacion_mesa, inicio_reserva, fin_reserva, id_usuario )
                VALUES ($id_mesa, $capacidad_mesa, $ubicacion_mesa, $inicio_reserva, $fin_reserva, $id_usuario );
    END IF;

    UPDATE `tbl_mesas`
SET (inicio_reserva, fin_reserva, id_usuario)
VALUES (NULL, NULL, NULL);
END$$";