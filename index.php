<?php
// esercizio 1

// Utilizza i principi di OOP ed Ereditarieta' per creare una struttura a classi come la seguente:


// +-|Continent
// +-----------|Country
// +--------------------|Region
// +---------------------------|Province
// +------------------------------------|City
// +------------------------------------------|Street

// Ogni classe avra' un attributo public del tipo:
// $nameContinent:
// $nameCountry;
// $nameRegion;
// $nameProvince;
// $nameCity;
// $nameStreet;
// La prima classe genitore avra' la seguente struttura:
// class Continent
// {
//   public $nameContinent;
//   public function __construct($continent)
//   {
//     $this->nameContinent = $continent;
//   }
// }
// Istanzia un nuovo oggetto $myLocation, per poi richiamare un metodo chiamato getMyCurrentLocation() che stampi a schermo la seguente frase: “Mi trovo in Europa, Italia, Puglia, Ba, Bari, Strada San Giorgio Martire 2D“

class Continent
{
  public $nameContinent;
  public function __construct($continent)
  {
    $this->nameContinent = $continent;
  }
};

class Country extends Continent{
    public $nameCountry;

    public function __construct($continent, $country){
        parent::__construct($continent);
        $this->nameCountry = $country;
    }

};

class Region extends Country{
    public $nameRegion;

    public function __construct($continent,$country,$region){
        parent::__construct($continent,$country);
        $this->nameRegion = $region;
    }
}

class Province extends Region{
    public $nameProvince;

    public function __construct($continent,$country,$region,$province){
    parent::__construct($continent,$country,$region);
    $this->nameProvince = $province;
   } 
}

class City extends Province{
    public $nameCity;

    public function __construct($continent,$country,$region,$province,$city){
        parent::__construct($continent,$country,$region,$province);
        $this->nameCity = $city;
    }
}

class Street extends City{
    public $nameStreet;

    public function __construct($continent,$country,$region,$province,$city,$street){
        parent::__construct($continent,$country,$region,$province,$city);
        $this->nameStreet = $street;
    }
    public function getMyCurrentLocation(){
        return "Mi trovo in {$this->nameContinent}, {$this->nameCountry}, {$this->nameRegion}, {$this->nameProvince}, {$this->nameCity}, {$this->nameStreet}";
    }
}

$myLocation = new Street("Europa", "Italia", "Puglia", "Ba", "Bari", "Strada San Giorgio Martire 2D");

echo $myLocation->getMyCurrentLocation();

// crea una struttura a classi sfruttando l’ereditarieta' e seguendo queste semplici regole:
// le classi non devono avere attributi;
// ogni classe avra' un metodo specifico protected per stampare la sua specializzazione;
// non puoi realizzare metodi definiti public per stampare il risultato;
// l’unico metodo public ammesso e' il costrutture.
// Il risultato atteso sara':
// $magikarp = new Fish();
// //Nel terminale visaulizzerete:
// Sono un animale Vertebrato
// Sono un animale a Sangue Freddo
// Splash!
 

class Vertebrates{

    public function __construct(){
        $this->printAnimal();
    }
    protected function printAnimal(){
        echo "\nSono un animale vertebrato!";
    }
}

class ColdBlooded extends Vertebrates{
    protected function printAnimal(){
        parent::printAnimal();
        echo "Sono a sangue freddo!";
    }
}

class WarmBlooded extends Vertebrates{
    protected function printAnimal(){
        parent::printAnimal();
        echo"Sono a sangue caldo!";
    }
    
}

class Mammiferi extends WarmBlooded{
    protected function printAnimal(){
        parent::printAnimal();
        echo "Sono un mammifero!";
    }
}

class Uccelli extends WarmBlooded{
    protected function printAnimal(){
        parent::printAnimal();
        echo "Sono un Uccello!";
    }
}

class Fish extends ColdBlooded{
    protected function printAnimal(){
        parent::printAnimal();
        echo "Sono un pesce!";
    }
}

class Reptile extends ColdBlooded{
    protected function printAnimal(){
        parent::printAnimal();
        echo "Sono un rettile!";
    }
}

class Amphibius extends ColdBlooded {
    protected function printAnimal(){
        parent::printAnimal();
        echo "Sono un anfibio!";
    }
}



$stampa= new Uccelli();

// esercizio 3

// Dato il seguente codice di partenza:
// 
// Completa la classe Fiat con le strutture mancanti e, utilizzando il livello di severita' che ritieni piu' opportuno, estendi i metodi per stampare a terminale la seguente frase: “La mia macchina e' Opel, con targa ND 123 OJ e numero di Telaio 1234“.
// HINT

// Per sapere se l’esercizio e' corretto, stampa in console il var_dump dell’oggetto:
// var_damp($car);
// L’output dovra' avere solamente 3 attributi:
// object(MyCar)#1 (3) {
//   ["num_telaio":"Car":private]=>
//     string(6) "183784"
//   ["nome":protected]=>
//     string(4) "Opel"
//   ["targa":protected]=>
//     string(8) "19384785"
// }


class Car {

    private $num_telaio;

    public function __construct($telaio){
        $this->num_telaio=$telaio;
    }

    protected function getNumTelaio(){
        return $this->num_telaio;
    }
}

class Fiat extends Car {

    protected $license;
    protected $name;

    public function __construct($telaio,$licenses,$names){
        parent::__construct($telaio);
        $this->license=$licenses;
        $this->name=$names;
    }

    public function printCar(){
        echo "\nLa mia macchina è {$this->name}, con targa {$this->license}, e numero di telaio {$this->getNumTelaio()} \n";
    }
}

$car= new Fiat("12345","dksfksdfk","Opel");
$car->printCar();
var_dump($car);

