<?php
    class usuario
    {
        public $id;
        public $username;
        public $password;
        public $numEmpleado;
        public $nombre;
        public $apellido;
        public $email;
        public $comapany;
        public $departamento;
        public $puesto;
        public $UserRole;
    }

    class Solicitud{
        public $idSolicitud;
        public $solicitante;
        public $descripcion;
        public $Evidencia;
        public $actividad;
        public $fechaCreacion;
        public $fechaCierre;
        public $departamento;
        public $statusSolicitud;
        public $firmaSilicitante;
        public $firmaSupervisor;
        public $firmaMateriales;
        public $firmaMantenimiento;
        public $firmaFinanzas;
        public $firmaRH;
        public $firmaDireccion;
        public $firmaSeguridad;
        public $firmaSEH;
        
        public function __construct()
        {
            
        }
    }

    class company{
        public $companyid;
        public $CompanyName;
        public $CompanyAddress;
        public $phone;
    }

    class departamento{
        public $departamentoID;
        public $NombreDepartamento;
    }

    class puesto{
        public $puestoID;
        public $descripcionPuesto;
    }

    class userRole{
        public $roleID;
        public $Descripcion;
    }

    class Vacaciones{
        public $idPeriodoAnual;
        public $periodoAnual;
        public $diasDisponibles;
        public $usuario;
    }

    class evidencia{
        public $idEvidencia;
        public $fechaCreacion;
    }

    class recursosEvidencia{
        public $idevidencia;
        public $rutaEviencia;
        public $FKIDEvidencia;
    }

    class Actividad{
        public $idActividad;
        public $descripcion;
        public $departamento;
    }

    class statusSolicitud{
        public $isStatus;
        public $descripcion;
    }

    class statusFirmas{
        public $idStatusFirmas;
        public $descripcion;
    }

    class tipoSalida{
        public $tipoSalida;
        public $descripcion;
    }

    class comentarios{
        public $idcomentarios;
        public $comentario;
        public $solicitud;
    }

    class layout{
        public $noDocumento;
        public $descripcion;
        public $versionDoc;
        public $modelo;
        public $OEMDoc;
        public $elaborador;
        public $fechaCreacion;
        public $revision;
        public $aprobacion;
    }

    class solicitudVacaciones{
        public $folio;
        public $company;
        public $empleado;
        public $dias;
        public $periodo;
        public $fechaInicio;
        public $fechaPagara;
        public $observaciones;
        public $aprobaciones;
    }

    class salidaMaterial{
        public $idSalida;
        public $descripcion;
        public $tipSalida;
        public $solicitante;
        public $aprobacion;
    }

?>