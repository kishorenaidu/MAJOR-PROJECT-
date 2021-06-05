#include "FirebaseESP8266.h"
#define FIREBASE_HOST "project-2d302-default-rtdb.firebaseio.com"
#define FIREBASE_AUTH "l7JKN1pLueHMmf74eE9znD6UMdyBFSZ0bvrca7L6"
#define WIFI_SSID "iotkit"
#define WIFI_PASSWORD "123456789"
#define relay1 5
//#define relay2 9

#include <SoftwareSerial.h>
//SoftwareSerial mySerial(5, 4);//(RX,TX)
String path0="/Indus";
String path3 = "/Switch";
String S,S1,S4,S5,S6,S7,S8;
char *S2;
char *S3[5];
int i=0;
FirebaseData firebaseData;
void setup()
{
  pinMode(relay1,OUTPUT);
  //pinMode(relay2,OUTPUT);
  digitalWrite(relay1,HIGH);
  //digitalWrite(relay2,LOW);
Serial.begin(9600);
//mySerial.begin(9600);
WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  while (WiFi.status() != WL_CONNECTED)
  {
    Serial.print(".");
    delay(300);
  }
  Serial.println();
  Serial.print("Connected with IP: ");
  Serial.println(WiFi.localIP());
  Serial.println();
  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  Firebase.reconnectWiFi(true);
  {
   Serial.println("connected");
  }

}
void loop() {
  Firebase.getString(firebaseData,path3);
String r=(firebaseData.stringData());
 Serial.println(r);
if(r=="OFF")
{
  //digitalWrite(relay2,LOW);
  digitalWrite(relay1,LOW);
}
else if(r=="ON")
{
 //digitalWrite(relay2,HIGH);
 digitalWrite(relay1,HIGH);
}
  if(Serial.available())
  {
   S=Serial.readString(); 
   int e=S.indexOf("@");
   int e1=S.indexOf("#");
   int e2=S.indexOf("$");
   int e3=S.indexOf("%");
   int e4=S.indexOf("^");
   int e5=S.indexOf("&");
    S4=S.substring(e+1,e1);
    S5=S.substring(e1+1,e2);
    S6=S.substring(e2+1,e3);
    S7=S.substring(e3+1,e4);
    S8=S.substring(e4+1,e5);
    Serial.println(S4);
    Serial.println(S5);
    Serial.println(S6);
    Serial.println(S7);
    Serial.println(S8);
    
//String json="{\"HUMIDITY\":" + S4 + ",\"TEMPERATURE\":" + S5 + ",\"GAS1\":" + S6 + ",\"GAS2\":" + S7 + ",\"STATUS\":" + S8 + "}";
String json="{\"Humi\":" + S4 + ",\"Temp\":" + S5 + ",\"Gas1\":" + S6 + ",\"Gas2\":" + S7 + "}";
//Firebase.setJSON(firebaseData,path0,json);
Firebase.setString(firebaseData,path0+"/Humi",S4);
Firebase.setString(firebaseData,"/Status",S8);
 Firebase.setString(firebaseData,path0+"/Temp",S5);
 Firebase.setString(firebaseData,path0+"/Gas1",S6);
 Firebase.setString(firebaseData,path0+"/Gas2",S7);
 //Firebase.setString(firebaseData,"/LONGITUDE",S3);
/*Firebase.setString(firebaseData,"/Forest Fire Detection/GAS1",S6);
Firebase.setString(firebaseData,"/Forest Fire Detection/GAS2",S7);*/
Serial.println(json);
Serial.println(S8);
//Firebase.setString(firebaseData,"/Forest Fire Detection/STATUS",S8);
 }
}
