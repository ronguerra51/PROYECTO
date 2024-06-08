CREATE TABLE Empleados (
    empleado_id SERIAL PRIMARY KEY NOT NULL,
    empleado_nombre VARCHAR(100) NOT NULL,
    empleado_dpi VARCHAR(20) UNIQUE NOT NULL,
    empleado_edad INT,
    empleado_sexo VARCHAR(20)
);

CREATE TABLE Puestos (
    puesto_id SERIAL PRIMARY KEY NOT NULL,
    puesto_nombre VARCHAR(100) NOT NULL,
    puesto_sueldo DECIMAL(10, 2) NOT NULL
);

CREATE TABLE Areas (
    area_id SERIAL PRIMARY KEY NOT NULL,
    area_nombre VARCHAR(100) NOT NULL
);

CREATE TABLE AsignacionesPuestos (
    asignacionpuesto_id SERIAL PRIMARY KEY NOT NULL,
    asignacionpuesto_empleado INT,
    asignacionpuesto_puesto INT,
    FOREIGN KEY (asignacionpuesto_empleado) REFERENCES Empleados(empleado_id),
    FOREIGN KEY (asignacionpuesto_puesto) REFERENCES Puestos(puesto_id)
);

CREATE TABLE AsignacionesAreas (
    asignacionarea_id SERIAL PRIMARY KEY NOT NULL,
    asignacionarea_empleado INT,
    asignacionarea_area INT,
    FOREIGN KEY (asignacionarea_empleado) REFERENCES Empleados(empleado_id),
    FOREIGN KEY (asignacionarea_area) REFERENCES Areas(area_id)
);




