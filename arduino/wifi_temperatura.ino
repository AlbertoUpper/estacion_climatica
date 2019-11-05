#include <WiFi.h>
#include <WiFiClient.h> 
#include "DHT.h"

//-------------------VARIABLES GLOBALES--------------------------

#define DHTPIN 5 //pin para sensr DHT

#define DHTTYPE DHT11   // tipo de sensor DHT 11

// inicializamos el sensor DHT .
DHT dht(DHTPIN, DHTTYPE);
int contconexion = 0;//contador para el resultado de la conexion

//Asignamos el pin para el LDR
int pinLDR = A0;
// Variable donde se almacena el valor del LDR
int valorLDR = 0;

// pines para el sensor de ultrasonido
const int PinTrig = 34;
const int PinEcho = 35;

// Constante velocidad sonido en cm/s
const float VelSon = 34000.0;

// Número de muestras
const int numLecturas = 10;

// Distancia a los 100 ml y vacío
const float distancia100 = 2.15;
const float distanciaVacio = 15.00;

float lecturas[numLecturas]; // Array para almacenar lecturas
int lecturaActual = 0; // Lectura por la que vamos
float total = 0; // Total de las que llevamos
float media = 0; // Media de las medidas
bool primeraMedia = false; // Para saber que ya hemos calculado por lo menos una

const char *ssid = "ALEJANDRA"; //red de wifi
const char *password = "mundoescuter"; //password de la red

unsigned long previousMillis = 0;

char host[48];
String strhost = "192.168.0.58";//ip de la red
String strurl = "/estacion_climatica/paginas/php/enviarDatos.php";

void setup() {
  // Inicia Serial
  Serial.begin(115200);

  // Ponemos el pin Trig en modo salida del sensor ultra sonido
  pinMode(PinTrig, OUTPUT);
  // Ponemos el pin Echo en modo entrada del sensor ultra sonido
  pinMode(PinEcho, INPUT);

  // Inicializamos el array de lecturas del sensor de ultrasonido
  for (int i = 0; i < numLecturas; i++)
  {
    lecturas[i] = 0;
  }
  delay(10000);
  Serial.println("");
  Serial.println(F("¡DHT11 en línea!"));
  dht.begin();

  // Conexión WIFI
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED and contconexion <50) { //Cuenta hasta 50 si no se puede conectar lo cancela
    ++contconexion;
    delay(1000);
    Serial.print(".");
  }
  if (contconexion <50) {
      //para usar con ip fija
      //IPAddress ip(192,168,0,35); 
      //IPAddress gateway(192,168,0,1); 
      //IPAddress subnet(255,255,255,0); 
      //WiFi.config(ip, gateway, subnet); 
      
      Serial.println("");
      Serial.println("WiFi conectado");
      Serial.println(WiFi.localIP());
  }
  else { 
      Serial.println("");
      Serial.println("Error de conexion");
  }
}

//programa a cargar en la ESP
void loop() {
  delay(15000);
  //Leemos el valor del pinLDR y lo guardamos en la variable creada.
  valorLDR = analogRead(pinLDR); 

  //leyendo la humedad
  float h = dht.readHumidity();
  delay(500);
  //leyendo temperatura en escala celsius
  float t = dht.readTemperature();
  delay(500);
  //leyendo temperatura en escala fahrenheit (isFahrenheit = true)
  float f = dht.readTemperature(true);
  delay(1000);
  

  //verificamos si falla una lectura.
  if (isnan(h) || isnan(t) || isnan(f)) {
    Serial.println(F("Fallo al leer del sensor DHT!"));
    return;
  }

  //calculamos el indice de calor, por defecto en fahrenheit
  float hif = dht.computeHeatIndex(f, h);
  //calculamos el indice de calor en celsius (isFahreheit = false)
  float hic = dht.computeHeatIndex(t, h, false);
  /////////////////////////// ultrasonido /////////////////////////////////////
  
   // Eliminamos la última medida
  total = total - lecturas[lecturaActual];

  iniciarTrigger();

  // La función pulseIn obtiene el tiempo que tarda en cambiar entre estados, en este caso a HIGH
  unsigned long tiempo = pulseIn(PinEcho, HIGH);

  // Obtenemos la distancia en cm, hay que convertir el tiempo en segudos ya que está en microsegundos
  // por eso se multiplica por 0.000001
  float distancia = tiempo * 0.000001 * VelSon / 2.0;

  // Almacenamos la distancia en el array
  lecturas[lecturaActual] = distancia;

  // Añadimos la lectura al total
  total = total + lecturas[lecturaActual];

  // Avanzamos a la siguiente posición del array
  lecturaActual = lecturaActual + 1;

  // Comprobamos si hemos llegado al final del array
  if (lecturaActual >= numLecturas)
  {
    primeraMedia = true;
    lecturaActual = 0;
  }

  // Calculamos la media
  media = total / numLecturas;
  
  ///////////////////////////////////////////////////////////////

  //imprimimos valores medidos
  Serial.println("=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=\n");
  //temperatura y humedad
  Serial.print(F("Humedad: "));
  Serial.print(h);
  Serial.println("%");
  Serial.print(F("Temperatura: "));
  Serial.print(t);
  Serial.print(F("°C - "));
  Serial.print(f);
  Serial.println("°F");
   //indices de calor
  Serial.print(F("Índice de calor: "));
  Serial.print(hic);
  Serial.print(F("°C - "));
  Serial.print(hif);
  Serial.println(F("°F"));
  //Intensidad de luz
  Serial.print(F("Intencidad Luminosa: "));
  Serial.print(valorLDR); 
  // Solo mostramos si hemos calculado por lo menos una media
  if (primeraMedia)
  {
    float distanciaLleno = distanciaVacio - media;
    float cantidadLiquido = distanciaLleno * 100 / distancia100;
 
    //Serial.print(media);
    //Serial.println(" cm");
    Serial.println("Nivel de lluvia: ");
    Serial.print(cantidadLiquido);
    Serial.println(" ml");
  }
  Serial.println("\n=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=");
  delay(1500);

  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= 10000) { //envia la temperatura cada 10 segundos
    previousMillis = currentMillis;    
    enviardatos("?temperatura=" + String(t, 2) + "&humedad=" + String(h, 2) + "&luz=" + String(valorLDR));
  }
}

//-------Función para Enviar Datos a la Base de Datos SQL--------
String enviardatos(String datos) {
  String linea = "error";
  WiFiClient client;
  strhost.toCharArray(host, 49);
  if (!client.connect(host, 80)) {
    Serial.println("Fallo de conexion");
    return linea;
  }

  client.print(String("GET ") + strurl + datos + " HTTP/1.1" + "\r\n" + 
               "Host: " + strhost + "\r\n" +
               "Accept: */*" + "*\r\n" +
               "Content-Length: " + datos.length() + "\r\n" +
               "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
               "\r\n" + datos);           
  delay(1000);             
  
  Serial.print("Enviando datos a SQL...");
  
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println("Cliente fuera de tiempo!");
      client.stop();
      return linea;
    }
  }
  // Lee todas las lineas que recibe del servidro y las imprime por la terminal serial
  while(client.available()){
    linea = client.readStringUntil('\r');
     Serial.println(linea);
  }  
 
  return linea;
}
//-------Final Función para Enviar Datos a la Base de Datos SQL--------

// Método que inicia la secuencia del Trigger para comenzar a medir el sensor de ultrasonido
void iniciarTrigger()
{
  // Ponemos el Triiger en estado bajo y esperamos 2 ms
  digitalWrite(PinTrig, LOW);
  delayMicroseconds(2);

  // Ponemos el pin Trigger a estado alto y esperamos 10 ms
  digitalWrite(PinTrig, HIGH);
  delayMicroseconds(10);

  // Comenzamos poniendo el pin Trigger en estado bajo
  digitalWrite(PinTrig, LOW);
}
// Método que inicia la secuencia del Trigger para comenzar a medir el sensor de ultrasonido
