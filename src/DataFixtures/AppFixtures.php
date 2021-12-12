<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Ingredient;
use App\Entity\Pizza;
use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // default client
        $client = new Client();
        $client->setPhoneNumber('0123568920');
        $manager->persist($client);
        $client->setFirstName('aghilas');
        $client->setLastName('izem');
        $client->setEmail('izemaghilas@nicepizza.fr');


        // sauces
        $sauceTomate = new Sauce();
        $sauceTomate->setName('Sauce tomate');
        $sauceBarbecue = new Sauce();
        $sauceBarbecue->setName('Sauce barbecue');
        $cremeFraiche = new Sauce();
        $cremeFraiche->setName('Crème fraîche');

        // ingredients
        $mozzarella = new Ingredient();
        $mozzarella->setName('Mozzarella');
        
        $peperonni = new Ingredient();
        $peperonni->setName('Peperonni');
        
        $jambon = new Ingredient();
        $jambon->setName('Jambon');
        
        $champignons = new Ingredient();
        $champignons->setName('Champignons');
        
        $oignons = new Ingredient();
        $oignons->setName('Oignons');
        
        $poivrons = new Ingredient();
        $poivrons->setName('Poivrons');
        
        $beouf = new Ingredient();
        $beouf->setName('Beouf');

        $poulet = new Ingredient();
        $poulet->setName('Poulet');

        $merguez = new Ingredient();
        $merguez->setName('Merguez');
        
        $chevre = new Ingredient();
        $chevre->setName('Chèvre');
        
        $formeAmbert = new Ingredient();
        $formeAmbert->setName('Forme d\'Ambert');
        
        $emmental = new Ingredient();
        $emmental->setName('Emmental');
        
        $miel = new Ingredient();
        $miel->setName('Miel');
        
        //pizzas
        $merguerita = new Pizza();
        $manager->persist($merguerita);
        $merguerita->setName('Marguerita');
        $merguerita->setSauce($sauceTomate);
        $merguerita->setPrice(500);
        $merguerita->addIngredient($mozzarella);
        
        $merguezPizza = new Pizza();
        $manager->persist($merguezPizza);
        $merguezPizza->setName('Merguez');
        $merguezPizza->setSauce($sauceTomate);
        $merguezPizza->setPrice(500);
        $merguezPizza->addIngredient($mozzarella);
        $merguezPizza->addIngredient($merguez);

        $peperonniPizza = new Pizza();
        $manager->persist($peperonniPizza);
        $peperonniPizza->setName('Peperonni');
        $peperonniPizza->setSauce($sauceTomate);
        $peperonniPizza->setPrice(500);
        $peperonniPizza->addIngredient($mozzarella);
        $peperonniPizza->addIngredient($peperonni);

        $jambonPizza = new Pizza();
        $manager->persist($jambonPizza);
        $jambonPizza->setName('Jambon');
        $jambonPizza->setSauce($sauceTomate);
        $jambonPizza->setPrice(500);
        $jambonPizza->addIngredient($mozzarella);
        $jambonPizza->addIngredient($jambon);

        $chevreMiel = new Pizza();
        $manager->persist($chevreMiel);
        $chevreMiel->setName('Chèvre-Miel');
        $chevreMiel->setSauce($cremeFraiche);
        $chevreMiel->setPrice(800);
        $chevreMiel->addIngredient($mozzarella);
        $chevreMiel->addIngredient($chevre);
        $chevreMiel->addIngredient($miel);

        $reine = new Pizza();
        $manager->persist($reine);
        $reine->setName('Reine');
        $reine->setSauce($sauceTomate);
        $reine->setPrice(600);
        $reine->addIngredient($mozzarella);
        $reine->addIngredient($jambon);
        $reine->addIngredient($champignons);

        $orientale = new Pizza();
        $manager->persist($orientale);
        $orientale->setName('Orientale');
        $orientale->setSauce($sauceTomate);
        $orientale->setPrice(800);
        $orientale->addIngredient($mozzarella);
        $orientale->addIngredient($oignons);
        $orientale->addIngredient($poivrons);
        $orientale->addIngredient($merguez);

        $indienne = new Pizza();
        $manager->persist($indienne);
        $indienne->setName('Indienne');
        $indienne->setSauce($cremeFraiche);
        $indienne->setPrice(900);
        $indienne->addIngredient($mozzarella);
        $indienne->addIngredient($champignons);
        $indienne->addIngredient($oignons);
        $indienne->addIngredient($poulet);
        $indienne->addIngredient($emmental);

        $delux = new Pizza();
        $manager->persist($delux);
        $delux->setName('Delux');
        $delux->setSauce($sauceTomate);
        $delux->setPrice(900);
        $delux->addIngredient($mozzarella);
        $delux->addIngredient($champignons);
        $delux->addIngredient($oignons);
        $delux->addIngredient($poivrons);
        $delux->addIngredient($beouf);

        $frommage = new Pizza();
        $manager->persist($frommage);
        $frommage->setName('4 Frommages');
        $frommage->setSauce($sauceTomate);
        $frommage->setPrice(1000);
        $frommage->addIngredient($mozzarella);
        $frommage->addIngredient($chevre);
        $frommage->addIngredient($formeAmbert);
        $frommage->addIngredient($emmental);

        $cannibale = new Pizza();
        $manager->persist($cannibale);
        $cannibale->setName('Cannibale');
        $cannibale->setSauce($sauceBarbecue);
        $cannibale->setPrice(1100);
        $cannibale->addIngredient($mozzarella);
        $cannibale->addIngredient($beouf);
        $cannibale->addIngredient($poulet);
        $cannibale->addIngredient($merguez);

        $manager->flush();
    }
}
