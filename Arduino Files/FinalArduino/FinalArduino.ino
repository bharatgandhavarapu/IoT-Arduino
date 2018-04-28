#include <DHT.h>
#include <SPI.h>
#include <Ethernet.h>

#define DHTPIN 9                    // what pin we're connected to
#define DHTTYPE DHT11               // DHT 11 

byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED
};

IPAddress server(192, 168, 1, 106);

EthernetClient client;

const int ledPin = 3;               //the number of the LED pin
const int fanPin = 5;               //the number of the FAN pin
const int ldrPin = A0;              //the number of the LDR pin

/*Interval to read*/
long interval = 5000;
long previousMillis = 0;
unsigned long currentMillis = 0;

int t, h, f;
String data = "";

int val = 0;                        // variable to store the read value
int inPin = 3;                      // voltage connected to analog pin
float volt = 0;                     // variable to hold the voltage read

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  dht.begin();
  Serial.begin(9600);
  pinMode(ldrPin, INPUT);
  pinMode(ledPin, OUTPUT);
  pinMode(fanPin, OUTPUT);

  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }
  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
  } else {
    Serial.print("IP Address        : ");
    Serial.println(Ethernet.localIP());
    Serial.print("Subnet Mask       : ");
    Serial.println(Ethernet.subnetMask());
    Serial.print("Default Gateway IP: ");
    Serial.println(Ethernet.gatewayIP());
    Serial.print("DNS Server IP     : ");
    Serial.println(Ethernet.dnsServerIP());
  }

  delay(1000);
  Serial.println("connecting...");
  data = "";
}

void loop() {
  Serial.println();
  ledControl();
  Serial.println();
  fanControl();
  Serial.println();

  currentMillis = millis();
  if (currentMillis - previousMillis > interval) {
    previousMillis = currentMillis;

    if (client.connect(server, 80)) {
      Serial.println("Connected");
      client.print("GET /add.php?");
      client.print(data);
      client.println(" HTTP/1.1");
      client.println("Host: 192.168.1.105");
      client.println("Connection: close");
      client.println();
      client.stop();
    }
    else
    {
      Serial.println("Connection unsuccesful");
    }
  }
  delay(1);                         //Time to recive the values by the server.
}

void ledControl() {

  int sensorReading = analogRead(ldrPin);     //read the input on analog pin 0

  Serial.print("ldr value is : ");
  Serial.println(sensorReading);
  int value = map(sensorReading, 1023, 0, 0, 255);
  Serial.print("mapped value is : ");
  Serial.println(value);
  analogWrite(ledPin, value);
}

void fanControl() {

  h = dht.readHumidity();
  // Read temperature as Celsius
  t = dht.readTemperature();
  // Read temperature as Fahrenheit
  f = dht.readTemperature(true);

  // Check if any reads failed and exit early (to try again).
  if (isnan(h) || isnan(t) || isnan(f)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  data = "temp=";
  data.concat(t);
  data.concat("&hum=");
  data.concat(h);

  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.print(" %\t");

  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.print(" *C ");
  Serial.print(f);
  Serial.println(" *F\t");

  if (t < 25 ) {                                  // If the temperature less than 25
    analogWrite(fanPin, 0);                       // 0% PWM duty cycle
    Serial.println("Fan OFF ");
  }
  else if (t >= 25 & t < 30) {                    // If the temperature is between 25 & 30
    analogWrite(fanPin, 77);                      // 30% of maximum duty cycle value (255).
    Serial.println("Current Fan Speed is : 30%");
  }
  else if (t >= 30 & t < 35) {                    // If the temperature is between 30 & 35
    analogWrite(fanPin, 153);                     // 60% of maximum duty cycle value (255).
    Serial.println("Current Fan Speed is : 60%");
  }
  else if (t >= 35) {                             // If the temperature is above 35
    analogWrite(fanPin, 255);                     // 100% duty cycle
    Serial.println("Current Fan Speed is : 100%");
  }
}
