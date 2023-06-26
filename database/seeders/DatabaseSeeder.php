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
            ['name' => 'Admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),'role' => 'admin','created_at'=>date("Y-m-d H:i:s")],
            ['name' => 'Librarian','email' => 'librarian@gmail.com','password' => bcrypt('librarian'),'role' => 'librarian','created_at'=>date("Y-m-d H:i:s")]
        ]);
        
        //adding authors
        DB::table('authors')->insert([
            ['name' => 'Carmen Natalia','image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTa5YmtFECCdxxUgk_zaeHMC8Y03UoamMCdWIpZIFxQfVWBDQjx1U5usDQoTGV2SShuXI&usqp=CAU','created_at'=>date("Y-m-d H:i:s")],
            ['name' => 'Manuel de Jesús Galván','image' => 'https://www.buscabiografias.com/img/people/Manuel_de_Jesus_Galvan.jpg','created_at'=>date("Y-m-d H:i:s")],
            ['name' => 'Mario Vargas Llosa','image' => 'https://upload.wikimedia.org/wikipedia/commons/b/bf/Mario_Vargas_Llosa_%28crop_2%29.jpg','created_at'=>date("Y-m-d H:i:s")]
        ]);

        //adding categories
        DB::table('categories')->insert([
            ['name' => 'Ficción','created_at'=>date("Y-m-d H:i:s")],
            ['name' => 'Novela histórica','created_at'=>date("Y-m-d H:i:s")]
        ]);

        //adding books
        DB::table('books')->insert([
            ['author_id' => 1,'category_id' => 2,'title' => 'La victoria','description' => ' La novela, originada en 1942, no narra una historia nueva e innovadora, sino el amor que sienten dos hermanos por una misma mujer.','image' => 'https://www.cuestalibros.com/content/images/thumbs/0119619_la-victoria_550.jpeg','created_at'=>date("Y-m-d H:i:s")],
            ['author_id' => 2,'category_id' => 1,'title' => 'Enriquillo','description' => 'Enriquillo es una novela histórica dominicana escrita por Manuel de Jesús Galván y publicada entre 1879 y 1882. Ubicada en el siglo XVI.','image' => 'https://www.cuestalibros.com/content/images/thumbs/0097261_6227920-h.JPG_550.jpeg','created_at'=>date("Y-m-d H:i:s")],
            ['author_id' => 3,'category_id' => 2,'title' => 'La fiesta del Chivo','description' => 'La fiesta del Chivo es una novela publicada en el año 2000 del escritor peruano-español Mario Vargas Llosa. El libro tiene lugar en República Dominicana.','image' => 'https://proceso.com.do/wp-content/uploads/2023/04/La-fiesta-del-Chivo.jpg','created_at'=>date("Y-m-d H:i:s")],
        ]);

    }
}
