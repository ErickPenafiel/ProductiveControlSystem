<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Productive Control System (SPCS)

## Descripción

El **Productive Control System (SPCS)** es una solución desarrollada con Laravel para gestionar el proceso productivo en la industria cervecera. El sistema facilita el control y la optimización de todas las etapas de producción, ofreciendo herramientas para la gestión de capacitaciones, conocimientos, fermentación, proceso productivo, y parámetros críticos como temperatura y temperatura de cocimiento. También incluye funcionalidades para la gestión de usuarios, roles y la generación de reportes en PDF.

## Características

- **Control de Capacitaciones**: Gestión y seguimiento de las capacitaciones del personal.
- **Conocimientos**: Registro y monitoreo de conocimientos técnicos necesarios para el proceso productivo.
- **Fermentación**: Control de los procesos de fermentación, incluyendo monitoreo y ajuste de condiciones.
- **Proceso Productivo**: Supervisión y optimización del proceso productivo cervecero.
- **Temperatura**: Monitoreo de la temperatura en distintas fases del proceso.
- **Temperatura de Cocimiento**: Control específico de la temperatura durante el cocimiento.
- **Gestión de Usuarios y Roles**: Administración de usuarios y asignación de roles con permisos específicos.
- **Generación de Reportes en PDF**: Creación y exportación de reportes detallados en formato PDF.

## Instalación

1. **Clonar el Repositorio**:
    ```bash
    git clone https://github.com/tuusuario/southern-productive-control-system.git
    cd southern-productive-control-system
    ```

2. **Instalar Dependencias**:
    ```bash
    composer install
    ```

3. **Configurar el Entorno**:
    Copia el archivo `.env.example` a `.env` y configura las variables de entorno según tu entorno de desarrollo.
    ```bash
    cp .env.example .env
    ```

4. **Generar la Clave de Aplicación**:
    ```bash
    php artisan key:generate
    ```

5. **Migrar la Base de Datos**:
    ```bash
    php artisan migrate
    ```

6. **Iniciar el Servidor**:
    ```bash
    php artisan serve
    ```

## Uso

- Accede a la interfaz de usuario a través de tu navegador en `http://localhost:8000`.
- Utiliza las funcionalidades para gestionar el proceso productivo cervecero, controlar las capacitaciones, y generar reportes.
