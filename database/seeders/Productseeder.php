<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('Products')->insert([
              [
                'name'=>'oppo',
                'price'=>'1000',
                'discription'=>'A smart phone in reasonable price',
                'category'=>'mobile',
                'gallery'=>'https://propakistani.pk/price/wp-content/uploads/2018/10/Xcell-View-in-Pakistan.jpg'
         
              ],
              [
                'name'=>'tv',
                'price'=>'1000',
                'discription'=>'A smart tv in reasonable price',
                'category'=>'mobile',
                'gallery'=>'https://images.samsung.com/is/image/samsung/pk-fhd-t5300-ua43t5300auxmm-frontblack-265965080?$PD_GALLERY_L_JPG$'
         
              ],
              [
                'name'=>'fridge',
                'price'=>'1000',
                'discription'=>'A smart fridge in reasonable price',
                'category'=>'mobile',
                'gallery'=>'https://cdn.vox-cdn.com/thumbor/ojxl2Kjpxspkevt3O7g_uU6hsZA=/0x389:8426x7181/1400x933/filters:focal(3671x2467:5117x3913):no_upscale()/cdn.vox-cdn.com/uploads/chorus_image/image/62795169/samsung_fridge.0.jpg'
         
              ],
          ]);
    }
}
