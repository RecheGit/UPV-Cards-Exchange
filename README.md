# UPV Cards Exchange
### Kepa Reche y Joel Moisés García

Hemos utilizado: 
- Docker
- PHP
- JavaScript
- CSS
- HTML

UPV Cards Exchange es una página web diseñada por dos alumnos de la Escuela de Ingeniería de San Mamés orientada a la colección de cromos de jugadores de la Liga de Fútbol Profesional

## Funcionalidades

- Inicio de sesión y registro
- Modificación de datos del usuario
- Creación de nuevos cromos
- Modificación de cromos
- Borrado de cromos
- Visualizado de cromos

## Pasos para desplegar la web

1. Descargar docker y docker-compose en ubuntu.
```sh
sudo snap install docker
sudo snap install docker-compose.
```
2. Extraer el fichero PaginaWeb.
3. Abrimos la terminal en el directorio PaginaWeb y escribimos
```sh
sudo docker build -t="web" .
```
4. Esperamos a que se construya la web y después introducimos en consola
```sh
sudo docker-compose up -d
```
> -d es opcional
5. La página web ya está lista. Si abrimos una terminal y escribimos
```sh
sudo docker ps 
```
Aquí vemos los containers activos y los puertos que redirigen. <br>

6. Si queremos acceder a la página web desde el navegador introducimos la url
```sh
localhost:81
```
7. En el caso de necesitar acceder a la base de datos, introducimos
```sh
localhost:8890
```
