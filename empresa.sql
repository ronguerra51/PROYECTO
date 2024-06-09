CREATE TABLE Empleados (
    empleado_id SERIAL PRIMARY KEY NOT NULL,
    empleado_nombre VARCHAR(100) NOT NULL,
    empleado_dpi VARCHAR(20) UNIQUE NOT NULL,
    empleado_edad INT,
    empleado_sexo VARCHAR(20),
    empleado_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Puestos (
    puesto_id SERIAL PRIMARY KEY NOT NULL,
    puesto_nombre VARCHAR(100) NOT NULL,
    puesto_sueldo DECIMAL(10, 2) NOT NULL,
    puesto_situacion SMALLINT DEFAULT 1
);

CREATE TABLE Areas (
    area_id SERIAL PRIMARY KEY NOT NULL,
    area_nombre VARCHAR(100) NOT NULL,
    area_situacion SMALLINT DEFAULT 1
);

CREATE TABLE AsignacionesPuestos (
    asignacionpuesto_id SERIAL PRIMARY KEY NOT NULL,
    empleado_id INT,
    puesto_id INT,
    asignacionespuestos_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (empleado_id) REFERENCES Empleados(empleado_id),
    FOREIGN KEY (puesto_id) REFERENCES Puestos(puesto_id)
);

CREATE TABLE AsignacionesAreas (
    asignacionarea_id SERIAL PRIMARY KEY NOT NULL,
    empleado_id INT,
    area_id INT,
    asignacionesareas_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (empleado_id) REFERENCES Empleado(empleado_id),
    FOREIGN KEY (area_id) REFERENCES Areas(area_id)
);




