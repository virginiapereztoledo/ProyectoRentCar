Ultima actualizacion
# 🚗 Rent Car Vir

¡Bienvenido/a a **Rent Car Vir**!  
Este es mi proyecto final, una aplicación pensada para facilitar el alquiler de Coches de manera rápida, intuitiva y eficiente.

## 📥 Pasos para descargar e instalar el proyecto

Sigue estos pasos para descargar y configurar el proyecto en tu máquina local:

1. **Clona o descarga el repositorio**:
   - Si usas Git:  
     ```bash
     git clone https://github.com/virginiapereztoledo/ProyectoRentCar.git
     ```
   - Si prefieres descargarlo como un archivo comprimido, puedes hacerlo desde la opción "Code" en el repositorio de GitHub.

2. **Instala las dependencias del proyecto**:  
   Abre una terminal en la carpeta del proyecto y ejecuta el siguiente comando para instalar las dependencias usando Composer:
   ```bash
   composer install

3. **Renombra el archivo .env.example:**:
     ```bash
     mv .env.example .env
     ```
4. - **Enlace para descargar la base de datos**: 
   ```markdown
   🔗 [Descargar base de datos](https://github.com/virginiapereztoledo/ProyectoFinalRentCarVir/blob/master/Base%20de%20Datos/nuevas.sql)

5. **Configura el archivo .env:**:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nueva
DB_USERNAME=root
DB_PASSWORD=

6. **Siguientes pasos:**:

     ```bash
    php artisan key:generate
     ```

7. **Siguientes pasos:**:

    ```bash
    php artisan storage:link
     ```
8. **Siguientes pasos:**:

    ```bash
    composer require laravel/sanctum
     ```
    
 9. **Si no tenemos la base de datos :**:

    ```bash
    php artisan migrate --seed
     ```
  
10. **Ejecuta la aplicación:**:

    ```bash
    php artisan serve
    ```


## 📽️ Demo del Proyecto

Puedes ver un recorrido en video del funcionamiento de la aplicación en el siguiente enlace:

🔗 [Ver video en Google Drive](https://drive.google.com/file/d/1xpHQ2bpIE_KSQbiXiFRytdyKO_XrycKt/view?usp=drive_link)

## 📄 Documento PDF

También puedes descargar el documento en PDF con más detalles sobre el proyecto en el siguiente enlace:

🔗 [Ver PDF del proyecto]([Pdf Documentacion]).(https://github.com/virginiapereztoledo/ProyectoFinalRentCarVir/blob/master/Documentacion/ProyectoIntegrado.pdf).

## 🔑 Accesos para usuarios

Para probar el sistema con diferentes roles, utiliza las siguientes credenciales:

- **Cliente**  
  - Nombre de usuario: `clientecliente`  
  - Contraseña: `Cliente1`

- **Empleado**  
  - Nombre de usuario: `empleadoempleado`  
  - Contraseña: `Empleado1`

- **Administrador**  
  - Nombre de usuario: `adminadmin`  
  - Contraseña: `Admin1`
