CREATE TABLE cCompany(
	CompanyId INT PRIMARY KEY IDENTITY, 
	CompanyName CHAR(80) NOT NULL,
	Adress CHAR(200) NOT NULL,
	Phone CHAR(14) NOT NULL
);

CREATE TABLE cDepartament(
	DepartamentId INT PRIMARY KEY NOT NULL IDENTITY,
	DepartamentName varchar(40) NOT NULL,
);

CREATE TABLE cPuesto(
	PuestoID INT PRIMARY KEY NOT NULL IDENTITY,
	Descripcion VARCHAR(60) NOT NULL
);

create table cUserRole(
	RoleID int identity primary key not null,
	Description varchar(30)
);

CREATE TABLE Users(
	UserId int UNIQUE NOT NULL IDENTITY,
	UserName varchar(30) primary key,
	UserPassword varchar(60) not null,
	NumEmpleado int NOT NULL,
	nobre CHAR(40) NOT NULL,
	apellido CHAR(50) NOT NULL,
	Email VARCHAR(60),
	Company INT,
	Departamento INT,
	Puesto INT,
	UserRole int,
	foreign key (Company) references cCompany(CompanyId) ON DELETE CASCADE,
	foreign key (Departamento) references cDepartament(DepartamentId) ON DELETE CASCADE,
	foreign key (Puesto) references cPuesto(PuestoID) ON DELETE CASCADE,
	foreign key (UserRole) references cUserRole(RoleID) ON DELETE CASCADE
);

CREATE TABLE VacacionesDisponibles(
	idPeriodoAnual int primary key identity not null,
	periodo_anual int,
	dias_disponibles INT NOT NULL,
	usuario varchar(30) NOT NULL
	foreign key (usuario) references users(UserName)
);

create table evidencia(
	IdEvidencia int primary key identity not null,
	fechaCreacion date
);

create table RecursosEvidencia(
	IDFoto int identity primary key,
	RutaEvidencia nvarchar(1000) not null,
	IDEvidencia int UNIQUE not null
	foreign key (IDEvidencia) references evidencia(IdEvidencia)
);

create table actividad(
	IDActividad int primary key identity not null,
	descripcion varchar(256),
	departamento int not null
	foreign key (departamento) references cDepartament(DepartamentId)
);


create table statusSolicitud(
	idStatus int identity primary key,
	descripcion varchar(64)
);

create table statusfirmas(
	idStatusFirmas int primary key identity not null,
	descripcion char(30),
);

create table tipo_salida(
	idTipoSalida int identity primary key not null,
	descripcion varchar(256),
);

create table solicitud(
	IdSolicitud int primary key identity not null,
	solicitante int not null,
	Descripcion VARCHAR(120) not null,
	Evidencia int not null,
	actividad int not null,
	FechaCreacion date not null,
	FechaCierre date not null,
	departamento int not null,
	statusSolicitud int not null,
	FirmaSolicitante int not null,
	FirmaSupervisor int not null,
	FirmaMateriales int not null,
	FirmaMantenimiento int not null,
	FirmaFinanzas int not null,
	FirmaRH int not null,
	FirmaDireccion int not null,
	FirmaSeguridad int not null,
	FirmaSEH int not null,
	foreign key (solicitante) references Users(UserId),
	foreign key (Evidencia) references RecursosEvidencia(IDEvidencia),
	foreign key (statusSolicitud) references statusSolicitud(idStatus),
	foreign key (actividad) references actividad(IDActividad),
	foreign key (FirmaSolicitante) references statusfirmas(idStatusFirmas),
	foreign key (FirmaMateriales) references statusfirmas(idStatusFirmas),
	foreign key (FirmaMantenimiento) references statusfirmas(idStatusFirmas),
	foreign key (FirmaFinanzas) references statusfirmas(idStatusFirmas),
	foreign key (FirmaRH) references statusfirmas(idStatusFirmas),
	foreign key (FirmaDireccion) references statusfirmas(idStatusFirmas),
	foreign key (FirmaSeguridad) references statusfirmas(idStatusFirmas),
	foreign key (FirmaSEH) references statusfirmas(idStatusFirmas),
);

create table comentarios(
	idcomentario int not null identity,
	comentario varchar(512),
	solicitud int not null
	foreign key (solicitud) references solicitud(IdSolicitud)
);

create table layout(
	noDeDocumento int primary key identity not null,
	titulo varchar(64),
	descripcion varchar(512),
	docVersion char(2),
	modelo varchar(64),
	OEMDoc varchar(64),
	elaborador int,
	fechaCreacion date,
	revisionTecnica varchar(8),
	aprobacion int
	foreign key (elaborador) references users(UserId),
	foreign key (aprobacion) references solicitud(IdSolicitud)

)

create table solicitudVacaciones(
	folio int identity primary key not null,
	Company int,
	empleado int not null,
	dias int not null,
	periodo int not null,
	fecha_inicio date not null,
	semana_pagara int not null,
	observaciones varchar(256),
	aprobacion int not null
	foreign key (empleado) references users(UserId),
	foreign key (periodo)  references VacacionesDisponibles(idPeriodoAnual),
	foreign key (aprobacion) references solicitud(IdSolicitud)
);


create table salida_material(
	idSalida int primary key identity not null,
	descripcion varchar(256),
	tipo_salida int not null,
	solicitante int not null,
	aprobacion int not null
	foreign key (aprobacion) references solicitud(IdSolicitud),	
	foreign key (solicitante) references users(UserId),
	foreign key (tipo_salida) references tipo_salida(idTipoSalida)
);