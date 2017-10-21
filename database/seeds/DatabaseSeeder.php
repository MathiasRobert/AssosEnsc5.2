<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CouleursTableSeeder::class);
        $this->call(CategorieEvenementsTableSeeder::class);
        $this->call(CategorieArticlesTableSeeder::class);

        $this->call(AssociationsTableSeeder::class);
        $this->call(EvenementsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(MembresTableSeeder::class);
        $this->call(FamillesTableSeeder::class);
    }
}
