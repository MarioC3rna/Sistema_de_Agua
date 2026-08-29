# Sistema de Gestion — Oficina del Agua

## Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado y corriendo

## Inicio Rapido

```bash
# Clonar el repositorio
git clone <url-del-repo>
cd proyecto-grupal-desarrollo

# Copiar el archivo de variables de entorno
cp .env.example .env

# Levantar los contenedores
docker-compose up -d
```

Esto levanta:

| Servicio    | Puerto | URL                  |
|-------------|--------|----------------------|
| MariaDB     | 3306   | localhost:3306       |
| phpMyAdmin  | 8080   | http://localhost:8080 |

## Credenciales de la Base de Datos

| Campo            | Valor       |
|------------------|-------------|
| Host             | localhost   |
| Puerto           | 3306        |
| Usuario          | agua_user   |
| Contrasena       | agua2026    |
| Base de datos    | agua_db     |
| Usuario root     | root        |
| Contrasena root  | agua2026    |

## Forma 1 — phpMyAdmin (navegador)

1. Abrir http://localhost:8080 en el navegador
2. Iniciar sesion con:
   - Usuario: `agua_user`
   - Contrasena: `agua2026`
3. Seleccionar la base de datos `agua_db` en el panel izquierdo
4. Desde ahi pueden crear tablas, insertar datos, importar CSVs y ejecutar queries SQL desde la pestana "SQL"

## Forma 2 — DBeaver (aplicacion de escritorio)

1. Descargar e instalar [DBeaver Community](https://dbeaver.io/download/)
2. Abrir DBeaver y hacer click en el icono de **Nueva Conexion** (icono plug o Ctrl+Shift+N)
3. Buscar y seleccionar **MariaDB**
4. Llenar los campos:

| Campo         | Valor         |
|---------------|---------------|
| Servidor      | localhost     |
| Puerto        | 3306          |
| Base de datos | agua_db       |
| Usuario       | agua_user     |
| Contrasena    | agua2026      |

5. Hacer click en **Probar conexion** (debe mostrar "Conectado")
6. Click en **Finalizar**
7. En el panel izquierdo hacer doble click en `agua_db` para ver las tablas
8. Para ejecutar queries: click derecho en la BD → **SQL Editor** → **New SQL Script**

## Forma 3 — phpMyAdmin alternativo (XAMPP)

Si ya tienen XAMPP instalado y no quieren usar Docker:

1. Abrir el **XAMPP Control Panel**
2. Iniciar **Apache** y **MySQL**
3. Abrir http://localhost/phpmyadmin
4. Las credenciales dependen de su configuracion local de XAMPP

> Nota: Esta opcion no esta configurada por defecto. Usar Docker es la forma recomendada.

## Comandos Utiles

```bash
# Levantar los contenedores
docker-compose up -d

# Detener los contenedores
docker-compose down

# Detener y borrar todos los datos (reiniciar la BD desde cero)
docker-compose down -v

# Ver logs de MariaDB
docker-compose logs db

# Entrar a la consola de MariaDB desde terminal
docker-compose exec db mysql -u agua_user -p agua_db

# Reiniciar todo
docker-compose down -v && docker-compose up -d
```

## Notas para el Equipo

- **Nunca** subir el archivo `.env` a git (ya esta en `.gitignore`)
- Si alguien actualiza el `schema.sql`, los demas ejecutan:
  ```bash
  git pull
  docker-compose down -v
  docker-compose up -d
  ```
- La BD se persiste en un volumen de Docker. Solo se destruye con `docker-compose down -v`
