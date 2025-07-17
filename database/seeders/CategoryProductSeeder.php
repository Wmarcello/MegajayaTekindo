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
                'name' => 'Pump',
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
                'name' => 'Electric Motor',
                'description' => 'Electric and industrial motors',
                'icon' => 'bi-lightning-fill',
                'sort_order' => 3
            ],
            [
                'name' => 'Diesel Motor',
                'description' => 'Diesel and industrial motors',
                'icon' => 'bi-fuel-pump',
                'sort_order' => 4
            ],
            [
                'name' => 'Blower',
                'description' => 'Industrial blowers',
                'icon' => 'bi-wind',
                'sort_order' => 5
            ],
            [
                'name' => 'Submersible Pump',
                'description' => 'Submersible pumps for underwater applications',
                'icon' => 'bi-water',
                'sort_order' => 6
            ],
            [
                'name' => 'Accessories',
                'description' => 'Pump and motor accessories',
                'icon' => 'bi-tools',
                'sort_order' => 7
            ]
        ];

        foreach ($categories as $categoryData) {
            $categoryData['slug'] = Str::slug($categoryData['name']);
            $categoryData['is_active'] = true;
            $category = Category::create($categoryData);

            // Add products based on category
            switch ($category->name) {
                case 'Pump':
                    $this->createPumpProducts($category->id);
                    break;
                case 'Gear Pump':
                    $this->createGearPumpProducts($category->id);
                    break;
                case 'Electric Motor':
                    $this->createElectricMotorProducts($category->id);
                    break;
                case 'Diesel Motor':
                    $this->createDieselMotorProducts($category->id);
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

    private function createPumpProducts($categoryId)
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
                'name'=> 'Ebara 2CDX',
                'brand' => 'Ebara',
                'type' => '2cdx-series',
                'description' => 'Pompa Ebara 2CDX untuk aplikasi industri.',
                'specifications' => 'Flow rate: 5-120 L/min, Head: 10-62m',
                'sort_order' => 4,
                'image' => 'img/2cdx/2cdx.png',
            ],

            [
                'name' => 'Ebara SQPB',
                'brand' => 'Ebara',
                'type' => 'sqpb-series',
                'description' => 'Pompa Ebara SQPB untuk aplikasi industri.',
                'specifications' => 'Flow rate: 6- 175 M³/h, Head: 10-30m',
                'sort_order' => 5,
                'image' => 'img/sqpb/sqpb.png',
            ],

            [
                 'name' => 'Ebara EVMS(L)(G)',
                 'brand' => 'Ebara',
                 'type' => 'evms(L)(G)-series',
                 'description' => 'Pompa Ebara EVMS(L)(G) (Vertiical Multistage Pump) uuntuk aplikasi industri.',
                 'specifications' => 'Flow rate: 0.5- 100 M³/h',
                 'sort_order' => 6,
                 'image' => 'img/evms/evms.png',
            ],
        
            [
                'name' => 'Torishima',
                'brand' => 'Torishima',
                'type' => 'cen-series',
                'description' => 'Premium quality pump for demanding applications',
                'specifications' => 'Flow rate: 200-2000 L/min, Head: 20-200m',
                'sort_order' => 7,
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

    private function createElectricMotorProducts($categoryId)
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
                'brand' => 'Siemens',
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

            [
                'name' => 'Motology 3-Phase',
                'brand' => 'Motology',
                'type' => '3-phase',
                'description' => 'High-performance 3-phase electric motor designed for industrial applications requiring consistent torque and durability. Built with high-efficiency standards and robust construction.',
                'specifications' => 'Power: 0.18 – 200 kW, Voltage: 380–415V, Frequency: 50Hz, Efficiency: IE2/IE3 available',
                'sort_order' => 4,
                'image' => 'img/Motology/3phase.png',

            ],

            [
                'name' => 'Motology 1-Phase',
                'brand' => 'Motology',
                'type' => '1-phase',
                'description' => 'Compact and efficient single-phase electric motor ideal for light-duty and domestic applications. Easy installation and low maintenance.',
                'specifications' => 'Power: 0.18 – 3.7 kW, Voltage: 220–240V, Frequency: 50Hz, Capacitor start/run',
                'sort_order' => 5,
                'image' => 'img/Motology/1phase.png',
            ],

        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }

    private function createDieselMotorProducts($categoryId)
    {
        $products = [
            [
            'name' => 'Isuzu 4JB1T',
            'brand' => 'Isuzu',
            'type' => '4JB1T',
            'description' => 'High-performance diesel motor for demanding applications',
            'specifications' => 'Power: 1-200 kW, Efficiency: IE3/IE4',
            'sort_order' => 1,
            'image' => 'img/isuzu/4jb1t.png',
            ],

            [
                'name' => 'Fawde 4DX23',
                'brand' => 'Fawde',
                'type' => '4DX23',
                'description' => 'Premium quality diesel motor for demanding applications',
                'specifications' => 'Power: 1-200 kW, Efficiency: IE3/IE4',
                'sort_order' => 2,
                'image' => 'img/fawde/4dx23.png',
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
                'name' => 'Futsu Bowler TS',
                'brand' => 'Futsu',
                'type' => 'ts-series',
                'description' => 'Roots-type blower with durable construction and high volumetric efficiency, suitable for various industrial applications such as wastewater treatment, pneumatic conveying, and combustion air supply.',
                'specifications' => 'Type: Roots Blower, Pressure: Up to 0.8 bar (Head ~8 meter), Flow Rate: 0.5–120 m³/min, Cooling: Air-cooled, Lubrication: Oil bath',
                'sort_order' => 1,
                'image' => 'img/Futsu/Futsu_Ts.png',
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
                'sort_order' => 5,
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
            [
               'name' => 'Grundfos CR/CRN Series',
              'brand' => 'Grundfos',
               'type' => 'cr-crn-series',
               'description' => 'Vertical multistage centrifugal pumps designed for a wide range of industrial and domestic applications. Suitable for water supply, pressure boosting, and liquid transfer in high-pressure systems.',
               'specifications' => 'Flow rate: up to 180 m³/h, Head: up to 330 m, Temperature range: -40°C to +180°C',
               'sort_order' => 3,
               'image' => 'img/cr_crn/CR.png',
            ],

            [
               'name' => 'Grundfos CM/CME Series',
               'brand' => 'Grundfos',
               'type' => 'cm-cme-series',
               'description' => 'Horizontal multistage centrifugal pumps designed for compact, reliable, and quiet operation. Suitable for water supply, industrial pressure boosting, and HVAC applications. CME series includes built-in frequency converter for intelligent control.',
               'specifications' => 'Flow rate: up to 36 m³/h, Head: up to 125 m, Temperature range: -20°C to +120°C',
               'sort_order' => 4,
               'image' => 'img/cm_cme/cm_cme.png',
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
            ],
            [
                'name' => 'Impeller',
                'brand' => 'ebara',
                'type'=> 'impeller Ebara',
                'description' => 'Complete range of pump accessories',
                'specifications' => 'Seals, gaskets, impellers, and spare parts',
                'sort_order' => 2,
                'image' => 'img/impeller/impellerEbara.png',
            ],

            [
                'name'=> 'Seal Kit',
                'brand' => 'ebara',
                'type'=> 'seal-kit Ebara',
                'description' => 'Complete range of pump accessories',
                'specifications' => 'Seals Kit Ebara For Pump Cdx/Cdxm & Cd/Cdm ',
                'sort_order' => 3,
                'image' => 'img/Sealkit/SealkitEbara.png',
            ],

        ];

        foreach ($products as $productData) {
            $productData['category_id'] = $categoryId;
            $productData['slug'] = Str::slug($productData['name']);
            $productData['is_active'] = true;
            Product::create($productData);
        }
    }
}