# Ejercicio Mutantes - Mercadolibre

Ejercicio práctico para MercadoLibre. 

- [Ejercicio](#ejercicio)
  - [Especificaciones](#especificaciones)
  - [Implementación](#implementaci%C3%B3n)
  - [Comentarios](#comentarios)
- [Setup](#setup)
  - [Instrucciones](#instrucciones)
  - [Uso](#uso)
  - [API Url](#api)
  - [Servicios](#servicios)
    - [Es mutante](#es-mutante)
    - [Estadisticas](#estadisticas)
- [Test](#test)
  - [Automaticos](#automaticos)
  - [Scripts](#scripts)
  - [Cobertura](#cobertura)

## Ejercicio

Magneto quiere reclutar la mayor cantidad de mutantes para poder luchar
contra los X-Mens.
Te ha contratado a ti para que desarrolles un proyecto que detecte si un
humano es mutante basándose en su secuencia de ADN.
Para eso te ha pedido crear un programa con un método o función con la siguiente firma:  
  
**boolean isMutant(String[] dna);**  
  
En donde recibirás como parámetro un array de Strings que representan cada fila de una tabla
de (NxN) con la secuencia del ADN. Las letras de los Strings solo pueden ser: (A,T,C,G), las
cuales representa cada base nitrogenada del ADN.

### Especificaciones

El archivo PDF con el enunciado recibido se encuentra en la carpeta `espscificaciones`.

### Implementacion

- [Slim Framework](http://sparkjava.com)
- [MySQL](https://www.mongodb.com)
- [PHP7.2](https://mongodb.github.io/morphia/)
- [PHPUnit]()
- XDebug()

### Comentarios
Decidí realizar el desafío con las tecnologías con las que estoy más familiarizado.
No había tenido la oportinidad de trabajar anteriormente con [Slim Framework](http://sparkjava.com) ni había realizado deploys en Google App Engine, por lo que me apoyé en la documentación de cada uno para realizar el proyecto.

### Algoritmo
Definí tres algoritmos: 1 de uso general y dos especiales para matrices con tamaño 5 y 6

- El algoritmo de uso general recorre la matriz en búsqueda de una secuencia de dos caracteres iguales, para luego comparar si la secuencia de dos caracteres siguientes también coincide

- El algoritmo de uso en casos especiales fue realizado e implementado posteriormente. Este se basa en la premisa que para matrices con tamaño menor o igual a 6 es condición necesaria para una fila o una columna que los elementos en las columas centrales coincidan. De esta manera se puede descartar una fila o columna no mutante con solo una comparación. 
Si en cambio se encuentra coincidencia en los elementos centrales, se procede a comparar con los elementos anteriores y siguientes para determinar si el adn es mutante. 

Ambos algoritmos utilizan el mismo método para las búsquedas en las diagonales

#### Gráfico
![Estrategias de búsqueda](grafico.png)

## Setup

### Instrucciones
Para compilar y ejecutar proyecto es necesario contar con la version 1.8 de la JDK y Maven para la gestion de las dependencias.

Tambien es necesario contar con una instancia de MongoDB en caso de querer ejecutarlo localmente, se utilizan los datos de conexion por default de MongoDB, 
si la instancia se encuentra levantada en un host/port distinto se debe actualizar en el componente
_[DbServiceImpl](./src/main/java/ar/com/mercadolibre/mutants/services/impl/DbServiceImpl.java)_


Los distintos logs de la aplicacion se generan en el directorio del proyecto.
En caso de querer loguear en otra ubicacion es necesario actualizar la propiedad _*dir*_ del archivo de configuracion _[log4j2](./src/main/resources/log4j2.xml)_.

Clonar este repositorio: https://github.com/amcomaschi/mutants

Una vez levantada la aplicacion se puede realizar invocaciones a la API.

El puerto por defecto de la API es 4567.

### Uso

Para iniciar la aplicación, asegúrese de cumplir con las instrucciones anteriores. 

Una vez listo, ejecutar la clase principal _MutantsApp_ en su IDE preferido y espere hasta que se inicie la aplicación.

Tambien se puede iniciar la aplicacion con el siguiente comando en linea de comandos posicionandose en el directorio raiz
del proyecto:
```
mvn exec:java -Dexec.mainClass="ar.com.mercadolibre.mutants.MutantsApp"
```

### API Url

URL local: http://localhost:4567

URL hosteada en Amazon: http://ec2-13-58-238-161.us-east-2.compute.amazonaws.com:4567

### Servicios
#### Es mutante

Request: 
- POST http://ec2-13-58-238-161.us-east-2.compute.amazonaws.com:4567/mutants/

Request body (caso ADN mutante):

```
  {"dna":["ATGCGA", "CAGGGC", "TTATGT", "AGAAGG", "CCCCTA", "TCACTG"]}
```

Response:

```
  200 OK
```
Request body (caso ADN humano):

```
  {"dna":["AATACT", "CCCAGA", "GGGATT", "AATTCC", "GGATCG", "TCACTG"]}
```

Response:

```
  403 Forbidden
```

#### Estadisticas

Request: 
- GET http://ec2-13-58-238-161.us-east-2.compute.amazonaws.com:4567/stats

Response: 200 (application/json)

```
{
    count_mutant_dna: 4,
    count_human_dna: 1,
    ratio: 0.8
}
```

### Test

#### Automaticos

Para la ejecucion de los test automaticos utilice jUnit.

Para poder probar los componentes de base de datos utilice una base de datos MongoDB embebida, esta se levanta durante 
el test y luego se destruye.
De esta forma no necesito tener una instancia de base de datos levantada, ni hosteada en algun servidor.

Ademas me aseguro de que la base de datos siempre este consistente en cada ejecucion de los test.

#### Scripts

Cree dos shell scripts para invocar a la API en forma masiva (uno por servicio) y ver los tiempos de respuesta de cada 
invocacion.
Los scripts utilizan el comando Unix _parallel_, en caso de ejecutar en entorno Mac OS se puede instalar el comando 
ejecutando en una terminal el siguiente comando: 

```
brew install parallel
```

Para el servicio de verificacion de ADN, el script envia en el body de la peticion la secuencia de ADN que se encuentra
en el archivo [dna-mutant.json](./scripts/invoke-mutants.sh).

La cantidad de peticiones en paralelo que se quieren ejecutar se corresponde con el valor que se encuentra seguido del 
comando _seq_: seq *1000* | parallel....

#### Cobertura

Si bien la cobertura de codigo en la herramienta Codecov muestra un 70%, ejecutando los test localmente con la herramienta
Jacoco nos da 78%.

![coverage](./doc/images/coverage.png)
