<p align="center">
<a href="https://travis-ci.org/laravel/framework">
	<img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">
</a>

</p>

# Test Konecta - gestion de productos 

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._


### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_

```
	
	Composer version 2.0.4  
	PHP 8.1.5 
	node v16.15.0
	Git

```

### Instalación 🔧
_Este es un paso a paso que te dice lo que debes ejecutar para tener un entorno de desarrollo ejecutandose_

_Clonar repositorio_

```
git clone https://github.com/JohannDevFull/test-nexura
```

_Dirigirse a la carpeta donde se instalo_

```
cd test-nexura
```

_Cargar dependencias de php_

```
composer install
```

_Cargar dependencias node_

```
npm install
```

_compilar vue js_

```
npm run dev
```

_Crear archivo .env_

```
cp .env.example .env
```

_Generar llave para el proyecto_

```
php artisan key:generate
```

_crear base de datos_

```
Utilice su gestor de base de datos preferencial, en mi caso utilice Mysql
```
_configure su .env_

```
Parametrizar con su informacion base de datos.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_nexura
DB_USERNAME=root
DB_PASSWORD=
```


_Migrar base de datos_

```
php artisan migrate
```


_Sembrar informacion en la base de datos_

```
php artisan db:seed
```

_Y por ultimo levantar el servidor_

```
php artisan serve
```

_Y si todo a salido bien ya tendra una visualizacion del proyecto en la dirección_

```
http://127.0.0.1:8000/
```



_Tambien puede dirigirse a una previsualizacion del proyecto alojado en un hosting en la siguiente dirección._

```

Visita https://mundoweb.com.co/

user: dev.test@test.com
pass: admin.123

```



## Versionado 📌

Uso [Github](https://github.com//) 

## Autores ✒️


* **Johann Ramirez D.** - *Desarrollo fullstack* - [JohannDevFull](https://github.com/JohannDevFull)


## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢 
* :envelope: Para mensajes [Johann Ramire](johann.devfull@gmail.com)


---
⌨️ con ❤️ por [JohannDevFull](https://github.com/JohannDevFull) 😊