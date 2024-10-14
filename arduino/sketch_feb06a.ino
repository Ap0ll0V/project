#include <SPI.h>
#include <Ethernet.h>
#include <Servo.h>
byte mac[]={0x7B,0xF8,0xA9,0xF9,0x20,0x0A};
IPAddress ip (10, 0, 10,210);
EthernetServer server(80);
Servo servo;
void setup()
{
  Serial.begin(9600);
  Ethernet.begin(mac,ip);
  server.begin();
  servo.attach(6);
  servo.write(90);
}
int posizione;
void loop()
{
  EthernetClient client= server.available();
  if(client){
    boolean vuota=true;
    String line= String();
    while( client.connected() ){
      if(client.available()){
        char c= client.read();
        line.concat(c);
        if((c=='\n')&&vuota){
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/html");
          client.println("connetion:close");
          client.println("");
          client.println("<!DOCTYPE HTML>");
          client.println("<html>");
          client.println("<h1>gestione servo<h1>");
          client.println("<form cation='/' method='get'> <lable for='valore'>valore</label> <input type='text' id='valore' name='valore'> <imput type='submit' value='invio'> </form>");
          client.println("</html>");
          break;
        }
        if(c=='\n'){
          vuota=true;
          Serial.println("helloword");
          Serial.println(line);
          line=String();
        }
        else{
          if(c!='\r')
          {
           vuota=false;
          }
        }
      }
    }
  }
  servo.write(posizione);
  client.stop();
  Ethernet.maintain();
}
