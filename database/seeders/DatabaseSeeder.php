<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\postingan;
use App\Models\kategori;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::create([
            'name' => 'Daffah',
            'email' => 'mh.daffah27@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => '0'
        ]);

        User::create([
            'name' => 'Afrial',
            'email' => 'afrial@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => '0'
        ]);

        postingan::create([
            'kategori_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,2),
            'judul' => 'Postingan pertama',
            'excerpt' => 'Lorem ipsum',
            'paragraf' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, incidunt officiis! Illo dolores laudantium ut eligendi obcaecati facilis ullam voluptatibus hic tempore! Sequi laborum, repellat ratione cupiditate sint aspernatur id! Pariatur excepturi accusamus dicta et beatae officiis omnis soluta necessitatibus distinctio dolores, repellat error tempore ducimus. Quos suscipit tenetur fuga, excepturi dignissimos perspiciatis ea, corrupti vel laudantium nulla nemo optio, odio adipisci veritatis modi cupiditate? Dicta cupiditate earum hic ab fuga ad ducimus adipisci consectetur. Itaque quam saepe dolore, voluptatibus eveniet ex autem accusamus corporis, cupiditate ipsam odio sint voluptatem tempora nemo temporibus officia reprehenderit. Delectus itaque, nihil eveniet facilis fugiat, libero expedita est, reprehenderit optio labore suscipit consequuntur incidunt voluptas magnam quos. Quas quos aperiam dolorem delectus explicabo labore commodi eligendi minus. Perferendis commodi inventore quod nobis a, fugiat laudantium ullam aliquid voluptatibus iste dicta, qui illum reiciendis ratione. Quaerat itaque deleniti vitae autem repudiandae maxime? Debitis necessitatibus beatae deleniti odio quis veniam! Ipsam culpa, ab, incidunt, velit veritatis eaque omnis tempore doloribus ex cum quam similique nihil a! Laudantium fuga enim nisi repellat doloribus numquam, nam eveniet necessitatibus reiciendis. Dolore nam sequi doloremque quasi autem at debitis dolor aliquam illum ut labore asperiores nihil explicabo quisquam maiores, minima repudiandae provident pariatur! Numquam mollitia beatae vel magni iusto quam.',
        ]);

        postingan::create([
            'kategori_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,2),
            'judul' => 'Postingan Kedua',
            'excerpt' => 'Lorem ipsum',
            'paragraf' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae ab illum expedita repudiandae commodi porro aperiam ratione consequuntur, nobis debitis architecto veniam quod omnis, minus ipsum tenetur maiores unde esse voluptate magni dolores. Voluptatem recusandae eveniet nesciunt hic expedita! Mollitia temporibus quam aspernatur eveniet ex ullam deleniti porro ipsam harum.',
        ]);

        postingan::create([
            'kategori_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,2),
            'judul' => 'Postingan Ketiga',
            'excerpt' => 'Lorem ipsum',
            'paragraf' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet at reprehenderit qui sed blanditiis sapiente modi, voluptatem alias illo, corrupti error mollitia expedita omnis sit odio, aliquam doloribus eaque aperiam quae tempora rerum. Eligendi, nisi fugit accusantium adipisci ipsa nam ipsam delectus, maxime tempore corrupti optio odio, ea eaque omnis neque dolor iusto! Nam reprehenderit saepe similique dolore deserunt accusamus neque ratione suscipit eaque quaerat, sit vitae laboriosam nobis sed impedit eum omnis, eius esse vel nulla facilis beatae doloremque ipsam eligendi. At molestias magni, ipsa provident debitis libero, iure velit atque laudantium accusamus exercitationem magnam? Sint voluptas quis libero.',
        ]);

        postingan::create([
            'kategori_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,2),
            'judul' => 'Postingan Keempat',
            'excerpt' => 'Lorem ipsum',
            'paragraf' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet at reprehenderit qui sed blanditiis sapiente modi, voluptatem alias illo, corrupti error mollitia expedita omnis sit odio, aliquam doloribus eaque aperiam quae tempora rerum. Eligendi, nisi fugit accusantium adipisci ipsa nam ipsam delectus, maxime tempore corrupti optio odio, ea eaque omnis neque dolor iusto! Nam reprehenderit saepe similique dolore deserunt accusamus neque ratione suscipit eaque quaerat, sit vitae laboriosam nobis sed impedit eum omnis, eius esse vel nulla facilis beatae doloremque ipsam eligendi. At molestias magni, ipsa provident debitis libero, iure velit atque laudantium accusamus exercitationem magnam? Sint voluptas quis libero.',
        ]);

        kategori::create([
            'slug' => 'Makanan'
        ]);   
        
        kategori::create([
            'slug' => 'Minuman'
        ]); 
        kategori::create([
            'slug' => 'Teknologi'
        ]);         

    }
}
