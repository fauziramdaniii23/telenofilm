<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'fauziramdani',
            'email' => 'fauziramdani234@gmail.com',
            'password' => bcrypt('aa12345'),
            'phone_number' => '085659761805',
            'role' => 'developer',
        ]);
        
        User::create([
            'name' => 'ardiramdani',
            'email' => 'ardiramdani@gmail.com',
            'password' => bcrypt('aa12345'),
            'phone_number' => '085659761805',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'lukman',
            'email' => 'lukman@gmail.com',
            'password' => bcrypt('aa12345'),
            'phone_number' => '085659761805',
            'role' => 'user',
        ]);
        User::create([
            'name' => 'dea',
            'email' => 'dea@gmail.com',
            'password' => bcrypt('aa12345'),
            'phone_number' => '085659761805',
            'role' => 'user',
        ]);
        User::create([
            'name' => 'Imam',
            'email' => 'imam@gmail.com',
            'password' => bcrypt('aa12345'),
            'phone_number' => '085659761805',
            'role' => 'user',
        ]);
        User::create([
            'name' => 'alya',
            'email' => 'alya@gmail.com',
            'password' => bcrypt('aa12345'),
            'phone_number' => '085659761805',
            'role' => 'user',
        ]);

        Category::create([
            'name' => 'prewedding'
        ]);

        Category::create([
            'name' => 'wedding'
        ]);

        Category::create([
            'name' => 'engagement'
        ]);
        
        Category::create([
            'name' => 'graduation'
        ]);

        Category::create([
            'name' => 'ads'
        ]);
    
        Category::create([
            'name' => 'event'
        ]);

        // paket Prewedding
        Paket::create([
            'category_id' => '1',
            'name' => 'PW Photo',
            'description' => '<div>✓ 1 Photographer<br>5 hours service&nbsp;<br>Max 2 outfit and location&nbsp;<br>Unlimited takes (20 edited photos)&nbsp;<br>All files on Gdrive / in Website</div>',
            'price' => '450000'
        ]);
        Paket::create([
            'category_id' => '1',
            'name' => 'PW Video',
            'description' => '<div>1 Videographer<br>5 hours service<br>Max 2 outfit and location<br>1-2 minutes cinematic video<br>File on Gdrive / in website</div>',
            'price' => '650000'
        ]);
        Paket::create([
            'category_id' => '1',
            'name' => 'PW Reguler',
            'description' => '<div>1 Photographer + 1 Videographer<br>1 Videographer<br>5 hours service<br>Max 2 outfit and location<br>1-2 minutes cinematic video<br>File on Gdrive / in website</div>',
            'price' => '1050000'
        ]);
        Paket::create([
            'category_id' => '1',
            'name' => 'PW Maksimal',
            'description' => '<div>1 Photographer + 1 Videographer<br>6-7 hours service<br>Max 3 outfit and 2 location<br>Unlimited takes (30 edited photos)<br>3-5 minutes cinematic video<br>30 seconds instastory highlight<br>Print w/ Minimalist Frame 16RP (2 pcs)<br>All files on Flashdisk / in Website </div>',
            'price' => '1050000'
        ]);
        //paket Wedding
        Paket::create([
            'category_id' => '2',
            'name' => 'WD Photo',
            'description' => '<div>1 Photographer<br>6-8 hours service<br>Unlimited takes (20 edited photos)<br>All files on Gdrive / in Website</div>',
            'price' => '600000'
        ]);
        Paket::create([
            'category_id' => '2',
            'name' => 'WD Video',
            'description' => '<div>1 Videographer<br>6-8 hours service<br>1-2 minutes cinematic video<br>File on Gdrive / in Website</div>',
            'price' => '700000'
        ]);
        Paket::create([
            'category_id' => '2',
            'name' => 'WD Reguler',
            'description' => '<div>1 Photographer + 1 Videographer<br>6-8 hours service<br>Unlimited takes (20 edited photos)<br>1-2 minutes cinematic video<br>All files on Gdrive / in Website</div>',
            'price' => '1200000'
        ]);
        Paket::create([
            'category_id' => '2',
            'name' => 'WD Maksimal',
            'description' => '<div>1 Photographer + 1 Videographer<br>6-8 hours service<br>Unlimited takes (30 edited photos)<br>3-5 minutes cinematic video<br>30 seconds instastory highlight<br>Print w/ Frame Minimalis 16RP (2 pcs)<br>All files on Flashdisk</div>',
            'price' => '2350000'
        ]);
        //paket engagement
        Paket::create([
            'category_id' => '3',
            'name' => 'Engagement Reguler',
            'description' => '<div>1 Photographer + 1 Videographer<br>5 hours service<br>Unlimited takes (30 edited photos)<br>1-2 minutes cinematic video<br>All files on Gdrive / in Website</div>',
            'price' => '1050000'
        ]);
        Paket::create([
            'category_id' => '3',
            'name' => 'Engagement Maksimal',
            'description' => '<div>1 Photographer + 1 Videographer<br>6 hours service<br>Unlimited takes (40 edited photos)<br>3-5 minutes cinematic video<br>30 seconds instastory highlight<br>Print w/ MinimalistFrame 16RP (2 pcs)<br>All files on Gdrive / in Website</div>',
            'price' => '2150000'
        ]);
        //paket graduation
        Paket::create([
            'category_id' => '4',
            'name' => 'Group GD',
            'description' => '<h1><em>(3-4 Graduate)</em></h1><div>1 Photographer<br>90 minutes service<br>Unlimited takes (50 edited photos)<br>All files on Gdrive</div>',
            'price' => '175000'
        ]);
        Paket::create([
            'category_id' => '4',
            'name' => 'Extra Group GD',
            'description' => '<h1><em>(5 Graduate and More)</em></h1><div>1 Photographer<br>2 hours service<br>Unlimited takes (60 edited photos)<br>All files on Gdrive / in Website</div><div><br></div>',
            'price' => '150000'
        ]);
        Paket::create([
            'category_id' => '4',
            'name' => 'Personal GD',
            'description' => '<div>1 Photographer<br>60 minutes service<br>Unlimited takes (20 edited photos)<br>All files on Gdrive / in Website</div>',
            'price' => '325000'
        ]);
        Paket::create([
            'category_id' => '4',
            'name' => 'Soulmate GD',
            'description' => '<h1><em>(2 Graduate)</em></h1><div>1 Photographer<br>90 minutes service<br>Unlimited takes (40 edited photos)<br>All files on Gdrive / in Website</div><div><br></div>',
            'price' => '400000'
        ]);
    }
}
