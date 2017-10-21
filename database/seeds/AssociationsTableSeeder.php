<?php

use Illuminate\Database\Seeder;

use App\Association;

class AssociationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Association::create([
        	'id'=> 1,
        	'nom'  => "Bureau Des Eleves",
        	'diminutif'  => "BDE",
        	'email'  => "bde@ensc.fr",
        	'couleur_id'  => 1,
        	'lien_facebook'  => "https://www.facebook.com/bde.ensc/",
        	'lien_siteweb'  => null,
        	'description_courte' => "Le BDE gère ta vie étudiante en t'organisant des soirées de folieeeee !",
      		'description_longue' => null,
        	'logo' => "/images/bde.jpg",
        ]);

        Association::create([
        	'id'=> 2,
        	'nom'  => "Bureau Des Sports",
        	'diminutif'  => "BDS",
        	'email'  => "bde@ensc.fr",
        	'couleur_id'  => 2,
        	'lien_facebook'  => null,
        	'lien_siteweb'  => null,
        	'description_courte' => "Le BDS te permet de faire un peu de sport pour entretenir ton corps alcolisé !",
      		'description_longue' => null,
        	'logo' => "/images/bds.jpg",
        ]);


        Association::create([
        	'id'=> 3,
        	'nom'  => "Bureau Des Arts",
        	'diminutif'  => "BDA",
        	'email'  => "bda@ensc.fr",
        	'couleur_id'  => 3,
        	'lien_facebook'  => null,
        	'lien_siteweb'  => null,
        	'description_courte' => "Le BDA illumine tes journées et te fait découvrir des monts et merveilles.",
      		'description_longue' => null,
        	'logo' => "/images/bda.jpg",
        ]);

        Association::create([
        	'id'=> 5,
        	'nom'  => "Junior Entreprise",
        	'diminutif'  => "JE",
        	'email'  => "je@ensc.fr",
        	'couleur_id'  => 4,
        	'lien_facebook'  => null,
        	'lien_siteweb'  => null,
        	'description_courte' => "La JE te propose des repas hors de prix et te fait gagner plein de sous sous",
      		'description_longue' => null,
        	'logo' => "/images/je.jpg",
        ]);


        Association::create([
        	'id'=> 6,
        	'nom'  => "Asso des diplômés en cognitique",
        	'diminutif'  => "ADCOG",
        	'email'  => "adcog@ensc.fr",
        	'couleur_id'  => 5,
        	'lien_facebook'  => null,
        	'lien_siteweb'  => null,
        	'description_courte' => "Un président grandiose !",
      		'description_longue' => null,
        	'logo' => "/images/adcog.jpg",
        ]);


    }
}