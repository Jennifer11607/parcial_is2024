CREATE TABLE comida (
    com_id SERIAL PRIMARY KEY,
    com_nombre VARCHAR(75),
    com_menu VARCHAR(75),
    com_fecha DATE,
    com_tiempo VARCHAR(255),
    com_sirvio VARCHAR(10),
    com_situacion INT
);

select * from comida