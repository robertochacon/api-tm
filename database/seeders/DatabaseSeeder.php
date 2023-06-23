<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //adding users
        DB::table('users')->insert([
            ['name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin'],
            ['name' => 'Librarian','email' => 'librarian@gmail.com','password' => bcrypt('librarian'),'role' => 'librarian']
        ]);
        
        //adding authors
        DB::table('authors')->insert([
            ['name' => 'Carmen Natalia'],
            ['name' => 'Manuel de Jesús Galván'],
            ['name' => 'Mario Vargas Llosa']
        ]);

        //adding categories
        DB::table('categories')->insert([
            ['name' => 'Ficción'],
            ['name' => 'Novela histórica']
        ]);

        //adding books
        DB::table('books')->insert([
            ['author_id' => 1,'category_id' => 1,'title' => 'La victoria','description' => ' La novela, originada en 1942, no narra una historia nueva e innovadora, sino el amor que sienten dos hermanos por una misma mujer.'],
            ['author_id' => 2,'category_id' => 1,'title' => 'Enriquillo','description' => 'Enriquillo es una novela histórica dominicana escrita por Manuel de Jesús Galván y publicada entre 1879 y 1882. Ubicada en el siglo XVI.'],
            ['author_id' => 3,'category_id' => 2,'title' => 'La fiesta del Chivo','description' => 'La fiesta del Chivo es una novela publicada en el año 2000 del escritor peruano-español Mario Vargas Llosa. El libro tiene lugar en República Dominicana.'],
        ]);

    }
}
