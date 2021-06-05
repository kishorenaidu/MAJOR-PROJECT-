#include <SoftwareSerial.h>
#include <LiquidCrystal.h>
//SoftwareSerial mySerial(10, 11);
#include <dht11.h>
#define DHT11PIN 4
int PWM = 3;            //Digital pin D3 por PWM signal
int pwm = 0;
dht11 DHT11;
int G=A1;
int G1=A2;
float H,T;
String D;
const int rs = 9, en = 8, d4 = 7, d5 = 6, d6 = 5, d7 = 3;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);
//mySerial.begin(9600);
pinMode(G,INPUT);
pinMode(G1,INPUT);
 lcd.begin(16,2);
 lcd.setCursor(0,0);
 lcd.print("Industry monitoring");
 lcd.setCursor(0,1);
 lcd.print("    Sytem");
 delay(1000);


}

void loop() {
  //delay(1000);
  // put your main code here, to run repeatedly:
  int chk = DHT11.read(DHT11PIN);
  H=((float)DHT11.humidity);
  T=((float)DHT11.temperature);
  int GAS=analogRead(G);
  int GAS1=analogRead(G1);
  if(GAS>900 && GAS1>900)
  {
  D="EMERGENCY";  
  }
  else if(GAS<900 && GAS1<900)
  {
  D="NORMAL";  
  }
lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("GAS1:");
  lcd.print(GAS);
  lcd.setCursor(0, 1);
  lcd.print("GAS2;");
  lcd.print(GAS1);
  delay(500);
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("TEMP:");
  lcd.print(T);
  lcd.setCursor(0, 1);
  lcd.print("HUMIDITY:");
  lcd.print(H);
  delay(500);
  Serial.println("@"+String(H)+"#"+String(T)+"$"+String(GAS)+"%"+String(GAS1)+"^"+D+"&");
  delay(9000);
  
}
