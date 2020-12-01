<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 1',
                'description' => 'description 1',
                'image' => 'https://dmi-uploads.imgix.net/general/How-to-Create-the-Best-Video-Marketing-Campaign-Ever-Blog.jpg?fm=jpg&ixlib=php-1.1.0&q=3&w=2060&s=a1d99c808fe72a25ac4b1b0a3b4825fa'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 2',
                'description' => 'description 2',
                'image' => 'https://juraganonline.org/wp-content/uploads/2020/02/campaign-blog-graphic-01-1080x675-1.jpg'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 3',
                'description' => 'description 3',
                'image' => 'https://img.etimg.com/thumb/width-640,height-480,imgsize-113192,resizemode-1,msid-68497142/small-biz/marketing-branding/marketing/how-native-campaigns-can-help-you-achieve-your-campaign-kpis/gettyimages-925192752.jpg'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 4',
                'description' => 'description 4',
                'image' => 'https://dmi-uploads.imgix.net/general/How_to_Create_Your_First_Marketing_Campaign.jpg?fit=crop&fm=jpg&h=630&ixlib=php-1.1.0&q=60&w=1200&s=2b2c5623db2f8d19c1b70b93fc2b4e32'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 5',
                'description' => 'description 5',
                'image' => 'https://qwords.com/blog/wp-content/uploads/2020/04/Pengertian-Dan-Manfaat-Campaign.jpg'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 6',
                'description' => 'description 6',
                'image' => 'https://www.socialsamosa.com/wp-content/uploads/2019/07/Social-Media-Campaigns.png'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'campaign 7',
                'description' => 'description 7',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCcGCVGQqq95gogiLjSJP9TfF9XfGaT2FbZw&usqp=CAU'
            ],
        ]);
    }
}
