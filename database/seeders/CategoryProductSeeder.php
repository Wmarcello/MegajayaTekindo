<?php
// database/seeders/CategoryProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        // Categories
        $categories = [
            [
                'name' => 'Pump Centrifugal',
                'description' => 'Various types of industrial pumps',
                'icon' => 'bi-droplet-fill',
                'sort_order' => 1
            ],
            [
                'name' => 'Gear Pump',
                'description' => 'Specialized gear pumps',
                'icon' => 'bi-gear-fill',
                'sort_order' => 2
            ],
            [
                'name' => 'Motor',
                'description' => 'Electric and industrial motors',
                'icon' => 'bi-lightning-fill',
                'sort_order' => 3
            ],
            [
                'name' => 'Blower',
                'description' => 'Industrial blowers',
                'icon' => 'bi-wind',
                'sort_order' => 4
            ],
            [
                'name' => 'Submersible Pump',
                'description' => 'Submersible pumps for underwater applications',
                'icon' => 'bi-water',
                'sort_order' => 5
            ],
            [
                'name' => 'Accessories',
                'description' => 'Pump and motor accessories',
                'icon' => 'bi-tools',
                'sort_order' => 5
            ]
        ];

        foreach ($categories as $categoryData) {
            $categoryData['slug'] = Str::slug($categoryData['name']);
            $categoryData['is_active'] = true;
            $category = Category::create($categoryData);

            // Add products based on category
            switch ($category->name) {
                case 'Pump Centrifugal':
                    $this->createPumpCentrifugalProducts($category->id);
                    break;
                case 'Gear Pump':
                    $this->createGearPumpProducts($category->id);
                    break;
                case 'Motor':
                    $this->createMotorProducts($category->id);
                    break;
                case 'Blower':
                    $this->createBlowerProducts($category->id);
                    break;
                case 'Submersible Pump':
                    $this->createSubmersiblePumpProducts($category->id);
                    break;
                case 'Accessories':
                    $this->createAccessoryProducts($category->id);
                    break;
            }
        }
    }

    private function createPumpCentrifugalProducts($categoryId)
    {
        $products = [
            [
                'name' => 'Ebara FSA',
                'brand' => 'Ebara',
                'type' => 'fsa-series',
                'description' => 'Pompa Ebara FSA untuk aplikasi industri.',
                'specifications' => 'Flow rate: 100-500 L/min, Head: 10-50m',
                'sort_order' => 1,
                'image' => 'img/fsa/FSA.png',
            
               
            
            ],

            [
                 'name' => 'Ebara GS ',
                'brand' => 'Ebara',
                'type' => 'gs-series',
                'description' => 'Pompa Ebara GS untuk aplikasi industri.',
                'specifications' => 'Flow rate: 200-800 L/min, Head: 20-80m',
                'sort_order' => 2,
                'image' => 'img/gs/gs.png',
            ],

            [
                'name' => 'Ebara CDX ',
                'brand' => 'Ebara',
                'type' => 'cdx-series',
                'description' => 'Pompa Ebara CDX untuk aplikasi industri.',
                'specifications' => 'Flow rate: 100-500 L/min, Head: 10-50m',
                'sort_order' => 3,
                'image' => 'img/cdxcart/cdx.png',
            ],
        
            [
                'name' => 'KSB Industrial Pump',
                'brand' => 'KSB', 
                'description' => 'Reliable industrial pump for various applications',
                'specifications' => 'Flow rate: 50-500 L/min, Head: 5-50m',
                'sort_order' => 4,
                'image' => 'img/produk/ksb-industrial-pump.jpg',
            ],
            [
                'name' => 'Torishima',
                'brand' => 'Torishima',
                'type' => 'cen-series',
                'description' => 'Premium quality pump for demanding applications',
                'specifications' => 'Flow rate: 200-2000 L/min, Head: 20-200m',
                'sort_order' => 5,
                'image' => 'img/cen/cen.png',
            ],
        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }

    private function createGearPumpProducts($categoryId)
    {
        $products = [
            [
                'name' => 'Koshin',
                'brand' => 'Koshin',
                'type' => 'gl-series',
                'description' => 'Precision gear pump for consistent flow',
                'specifications' => 'Displacement: 10-100 cc/rev, Pressure: 100-300 bar',
                'sort_order' => 1,
                'image' => 'img/koshin/koshin_1.png',
            ],
            
        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }

    private function createMotorProducts($categoryId)
    {
        $products = [

            [
                'name' =>'Titan ',
                'brand' => 'Titan',
                'type' => 'electric-motor',
                'description' => 'High-performance electric motor for industrial applications',
                'specifications' => 'Power: 1-200 kW, Efficiency: IE3/IE4',
                'sort_order' => 1,
                'image' => 'img/titan/titan_1.png',
            ],
            
            [
                'name' => 'Siemens',
                'brand' => 'SIEMENS',
                'type' => '1LEO',
                'description' => 'Industrial grade electric motor',
                'specifications' => 'Power: 1-200 kW, Efficiency: IE3/IE4',
                'sort_order' => 2,
                'image' => 'img/siemens/1leo.png',
            ],
            [
                'name' => 'Teco ',
                'brand' => 'Teco',
                'type' => 'AESV1S',
                'description' => 'Cost-effective electric motor solution',
                'specifications' => 'Power: 0.25-50 kW, Standard efficiency',
                'sort_order' => 3,
                'image' => 'img/Teco/aesv1s.png',
            ],

        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }

    private function createBlowerProducts($categoryId)
    {
        $products = [
            [
                'name' => 'Fu-Tsu Industrial Blower',
                'brand' => 'Fu-Tsu',
                'description' => 'High-capacity industrial blower',
                'specifications' => 'Air flow: 1000-10000 m³/h, Pressure: 10-100 kPa',
                'sort_order' => 1,
                'image' => 'img/produk/fu-tsu-industrial-blower.jpg',
            ]
        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }

    private function createSubmersiblePumpProducts($categoryId)
    {
        $products = [
            [
         'name' => 'Ebara D-Series',
         'brand' => 'Ebara',
         'type' => 'Dvs-Ds-Dl-Df',
         'description' => 'Submersible pump for deep water applications',
         'specifications' => 'Flow rate: 100-1000 L/min, Depth: 10-100m',
         'sort_order' => 1,
         'image' => 'img/Dseries/Dseries.png',
            ],
            [
                'name' =>'Grundfos Sp',
                'brand' => 'Grundfos',
                'type' => 'sp-series',
                'description' => 'Submersible pump for deep water applications',
                'specifications' => 'Flow rate: 100-1000 L/min, Depth: 10-100m',
                'sort_order' => 2,
                'image' => 'img/Grundfos/Spgrundfos.png',
            ],
            ];

            foreach ($products as $productData) {
                $productData['category_id'] = $categoryId;
                $productData['slug'] = Str::slug($productData['name']);
                $productData['is_active'] = true;
                Product::create($productData);
            }
        }

    private function createAccessoryProducts($categoryId)
    {
        $products = [
            [
                'name' => 'Tival',
                'brand' => 'Tival',
                'type'=> 'FF-4',
                'description' => 'Complete range of pump accessories',
                'specifications' => 'Seals, gaskets, impellers, and spare parts',
                'sort_order' => 1,
                'image' => 'img/tival/tivalff4.png',
            ]
        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }
}