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


create table solicitud(
	IdSolicitud int primary key identity not null,
	solicitante int not null,
	Descripcion VARCHAR(120) not null,
	Evidencia int not null,
	Asset int,
	FechaCreacion date not null,
	FechaCierre date not null,
	CantBultos int not null,
	departamento int not null,
	actividad int not null,
	statusSolicitud int not null,
	FirmaSolicitante bit not null,
	FirmaSupervisor bit not null,
	FirmaMateriales bit not null,
	FirmaMantenimiento bit not null,
	FirmaFinanzas bit not null,
	FirmaRH bit not null,
	FirmaDireccion bit not null,
	FirmaSeguridad bit not null,
	FirmaSEH bit not null
	foreign key (solicitante) references Users(UserId),
	foreign key (Evidencia) references RecursosEvidencia(IDEvidencia),
	foreign key (statusSolicitud) references statusSolicitud(idStatus),
	foreign key (actividad) references actividad(IDActividad)
);


