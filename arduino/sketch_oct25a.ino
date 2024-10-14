int ledb = 2;
int ledg = 3;
int ledv = 4;
int ledr = 5;

void setup() {
  pinMode (ledb, OUTPUT);
  pinMode (ledg, OUTPUT);
  pinMode (ledv, OUTPUT);
  pinMode (ledr, OUTPUT);
  digitalWrite(ledb,LOW);
  digitalWrite(ledg,LOW);
  digitalWrite(ledv,LOW);
  digitalWrite(ledr,LOW);
  Serial.begin(9600);
  Serial.println("inserire li comando");

}
String com="";
void loop() {
  if(Serial.available()){
    char c=Serial.read();
    if((c=='\n')||(c=='\r')){
      processa(com);
      com="";
      
    }else
    {
      com+=c;
    }
    }

}
void processa(String com){
  if(com=="accendere led blu")
  {
    Serial.println("led blu acesso");
    digitalWrite(ledb,HIGH);
    digitalWrite(ledr,LOW);
    digitalWrite(ledg,LOW);
    digitalWrite(ledv,LOW);
  }
  else if(com=="accendere led giallo")
  {
    Serial.println("led giallo acesso");
    digitalWrite(ledg,HIGH);
    digitalWrite(ledb,LOW);
    digitalWrite(ledr,LOW);
    digitalWrite(ledv,LOW);
  }
  else if(com=="accendere led verde")
  {
    Serial.println("led verde acesso");
    digitalWrite(ledb,LOW);
    digitalWrite(ledg,LOW);
    digitalWrite(ledr,LOW);
    digitalWrite(ledv,HIGH);
  }
  else if(com=="accendere led rosso")
  {
    Serial.println("led rosso acesso");
    digitalWrite(ledb,LOW);
    digitalWrite(ledg,LOW);
    digitalWrite(ledv,LOW);
    digitalWrite(ledr,HIGH);
  }
  else if(com=="spegnere i led")
  {
    Serial.println("i led sono spenti");
    digitalWrite(ledb,LOW);
    digitalWrite(ledg,LOW);
    digitalWrite(ledv,LOW);
    digitalWrite(ledr,LOW);
  }
  else{
     Serial.println("ri in resichi i dati");
  }
}
