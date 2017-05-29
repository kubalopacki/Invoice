<?php

class Produkt //tworzy klasę
{
    public $Nazwa;
    public $Cena;
    public $Kolor;
    public $Podatek;

    public function setCena($cena)  //tworzymy funkcje ktora nadaje wartosc wlasciwosciom obiektow
    {
        $this->Cena = $cena;  //przypisuje wartosc zmiennej $cena
    }

    public function setNazwa($nazwa)
    {
        $this->Nazwa = $nazwa;
    }

    public function setKolor($kolor)
    {
        $this->Kolor = $kolor;
    }

    public function setPodatek($podatek)
    {
        $this->Podatek = $podatek;
    }


}

    $rama = new Produkt;
    $rama->setCena("1299");
    $rama->setNazwa("Rama");
    $rama->setKolor("Czerwony");
    $rama->setPodatek("0.1");

    $widelec = new Produkt;
    $widelec->setCena("499");
    $widelec->setNazwa("Widelec");
    $widelec->setKolor("Czarny");
    $widelec->setPodatek("0.1");


    $kierownica = new Produkt;
    $kierownica->setCena("229");
    $kierownica->setNazwa("Kierownica");
    $kierownica->setKolor("Czarny");
    $kierownica->setPodatek("0.07");

    $mostek = new Produkt;
    $mostek->setCena("189");
    $mostek->setNazwa("Mostek");
    $mostek->setKolor("Chrom");
    $mostek->setPodatek("0.23");

    $gripy = new Produkt;
    $gripy->setCena("29");
    $gripy->setNazwa("Gripy");
    $gripy->setKolor("Czarny");
    $gripy->setPodatek("0.52");

    $piasta_przod = new Produkt;
    $piasta_przod->setCena("259");
    $piasta_przod->setNazwa("Piasta Przednia");
    $piasta_przod->setKolor("Chrom");
    $piasta_przod->setPodatek("0.15");

    $obrecz = new Produkt;
    $obrecz->setCena("200");
    $obrecz->setNazwa("Obrecz");
    $obrecz->setKolor("Czarne");
    $obrecz->setPodatek("0.23");

    $opona = new Produkt;
    $opona->setCena("100");
    $opona->setNazwa("Opona");
    $opona->setKolor("Czarny");
    $opona->setPodatek("0.1");

class Koszyk
{
    public $produkty_w_koszyku;
    public $liczba_sztuk = [];
    public $podsumowanie;
    public $wartosc_koszyka;

    public function dodajProduktDoKoszyka(Produkt $produkt, $ilosc_sztuk)
    {
        $this->produkty_w_koszyku[$produkt->Nazwa] = $produkt;
        if (array_key_exists($produkt->Nazwa, $this->produkty_w_koszyku)) {
        }

        if (array_key_exists($produkt->Nazwa, $this->liczba_sztuk)) {
            $this->liczba_sztuk[$produkt->Nazwa] = $this->liczba_sztuk[$produkt->Nazwa] + $ilosc_sztuk;
        } else {
            $this->liczba_sztuk[$produkt->Nazwa] = $ilosc_sztuk;
        }
    }

    public function podliczZamowienieNetto()
    {
        echo "Podsumowanie Koszyka NETTO" . PHP_EOL . PHP_EOL;
        foreach ($this->produkty_w_koszyku as $produkt) {
            /** @var Produkt $produkt */
            $nazwaProduktu = $produkt->Nazwa;
            $ilosc = $this->liczba_sztuk[$nazwaProduktu];
            $cena = $produkt->Cena;
            $suma = $cena * $ilosc;

            echo sprintf("%10s %4s x %4s = %5s", $nazwaProduktu, $ilosc, $cena, $suma) . " PLN" . PHP_EOL;
        }
        echo PHP_EOL . PHP_EOL;
    }

    public function podliczZamowienieBrutto()
    {
        echo "Podsumowanie Koszyka BRUTTO" . PHP_EOL . PHP_EOL;
        foreach ($this->produkty_w_koszyku as $produkt) {
            $nazwaProduktu = $produkt->Nazwa;
            $ilosc = $this->liczba_sztuk[$nazwaProduktu];
            $cena = $produkt->Cena;
            $podatek = $produkt->Podatek + 1;
            $podatek_paragon = $produkt->Podatek;
            $suma_brutto = $cena * $podatek * $ilosc;

            echo sprintf("%12s %6s x %6s x %6s = % 9.2f", $nazwaProduktu, $ilosc, $cena, $podatek_paragon, $suma_brutto) . " PLN" . PHP_EOL;

            $this->podsumowanie[$produkt->Nazwa] = $suma_brutto;
        }
        echo PHP_EOL . PHP_EOL;
    }

    public function iloscProduktowWKoszyku()
    {
        echo "W koszyku znajduje się: " . array_sum($this->liczba_sztuk) . " produktów" . PHP_EOL . PHP_EOL;
    }

    public function sumaKoszykaNetto()
    {
        $wartosc = 0;
        foreach ($this->produkty_w_koszyku as $produkt) {
            $wartosc = $produkt->Cena * $this->liczba_sztuk[$produkt->Nazwa] + $wartosc;
        }
        echo "Cena wszystkich produktów w koszyku(netto): " . $wartosc . " PLN" . PHP_EOL;
    }

    public function sumaKoszykaBrutto()
    {
        $suma_brutto = array_sum($this->podsumowanie);

        echo "Cena wszystkich produktów w koszyku(brutto): " . $suma_brutto . " PLN" . PHP_EOL;
    }

    public function totalPriceBrutto()
    {
        $total_price_brutto = 0;
        foreach ($this->produkty_w_koszyku as $produkt) {
            $total_price_brutto = $produkt->Cena * ($produkt->Podatek + 1) * ($this->liczba_sztuk[$produkt->Nazwa]) + $total_price_brutto;
        }
        echo $total_price_brutto;
    }

}


$koszyk1 = new Koszyk();
$koszyk1->DodajProduktDoKoszyka($rama, 1);
$koszyk1->DodajProduktDoKoszyka($gripy, 1);
$koszyk1->DodajProduktDoKoszyka($widelec, 1);
$koszyk1->DodajProduktDoKoszyka($opona, 4);
$koszyk1->dodajProduktDoKoszyka($obrecz, 3);
$koszyk1->DodajProduktDoKoszyka($rama, 4);
$koszyk1->DodajProduktDoKoszyka($opona, 4);
$koszyk1->dodajProduktDoKoszyka($mostek, 2);
$koszyk1->dodajProduktDoKoszyka($kierownica, 4);
$koszyk1->podliczZamowienieNetto();
$koszyk1->podliczZamowienieBrutto();
$koszyk1->IloscProduktowWKoszyku();
$koszyk1->sumaKoszykaNetto();
$koszyk1->sumaKoszykaBrutto();
