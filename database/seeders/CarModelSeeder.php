<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandModels = [
            'Acura' => ['MDX', 'RDX', 'TLX', 'Integra', 'Integra Type S', 'ZDX', 'ZDX Type S', 'ADX'],
            'Alfa Romeo' => ['Giulia', 'Stelvio', 'Tonale', 'Milano', 'Junior Ibrida', '4C', 'Brera', 'Spider'],
            'Aston Martin' => ['DB11', 'DB12', 'Vantage', 'DBS', 'Vanquish', 'Valhalla', 'Valkyrie', 'Valour', 'Valiant', 'DBX', 'DBX 707', 'Rapide', 'Lagonda'],
            'Audi' => ['A3', 'A4', 'A5', 'A6', 'A6 e-tron', 'A7', 'A8', 'Q2', 'Q3', 'Q4 e-tron', 'Q5', 'Q6 e-tron', 'Q7', 'Q8', 'Q8 e-tron', 'e-tron GT', 'RS3', 'RS4', 'RS5', 'RS6', 'RS7', 'RS Q3', 'RS Q8', 'R8', 'TT'],
            'Bentley' => ['Continental GT', 'Continental GTC', 'Continental GT Mulliner', 'Continental GTC Mulliner', 'Continental GT Azure', 'Flying Spur', 'Flying Spur Mulliner', 'Flying Spur Azure', 'Bentayga', 'Bentayga EWB', 'Mulsanne'],
            'BMW' => ['1 Series', '2 Series', '3 Series', '4 Series', '5 Series', '6 Series', '7 Series', '8 Series', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'XM', 'i3', 'i4', 'i5', 'i7', 'i8', 'M2', 'M3', 'M4', 'M5', 'M8', 'Z4'],
            'Bugatti' => ['Chiron', 'Chiron Super Sport', 'Chiron Pur Sport', 'Divo', 'Centodieci', 'Bolide', 'La Voiture Noire', 'Veyron', 'EB110', 'W16 Mistral'],
            'Buick' => ['Encore', 'Encore GX', 'Enclave', 'Envision', 'LaCrosse', 'Regal', 'Lucerne', 'Verano', 'Cascada', 'Rendezvous'],
            'BYD' => ['Han', 'Tang', 'Qin', 'Yuan', 'Song', 'Seal', 'Dolphin', 'Atto 3', 'Destroyer 05', 'Frigate 07', 'Seagull', 'e2', 'e3', 'e6'],
            'Cadillac' => ['CT4', 'CT5', 'CT6', 'CTS', 'Escalade', 'Escalade ESV', 'XT4', 'XT5', 'XT6', 'Lyriq', 'Celestiq', 'ELR', 'XLR'],
            'Changan' => ['CS15', 'CS35', 'CS55', 'CS75', 'Eado', 'Eado DT', 'UNI-V', 'UNI-K', 'Alsvin', 'Raeton CC', 'Hunter', 'Deepal SL03'],
            'Chery' => ['Tiggo 2', 'Tiggo 3', 'Tiggo 5', 'Tiggo 7', 'Tiggo 8', 'Arrizo 3', 'Arrizo 5', 'Arrizo 6', 'QQ', 'QQ Ice Cream', 'OMODA 5', 'eQ', 'Fulwin 2'],
            'Chevrolet' => ['Silverado', 'Silverado EV', 'Equinox', 'Tahoe', 'Suburban', 'Corvette', 'Malibu', 'Blazer', 'Trailblazer', 'Traverse', 'Camaro', 'Trax', 'Colorado', 'Spark'],
            'Chrysler' => ['300', 'Pacifica', 'Pacifica Hybrid', 'Voyager', 'Aspen', 'Sebring', 'Crossfire', 'PT Cruiser', 'Concorde'],
            'Citroën' => ['C1', 'C3', 'C3 Aircross', 'C4', 'C4 Cactus', 'C5', 'C5 Aircross', 'Berlingo', 'DS3', 'DS4', 'DS5', 'Jumpy'],
            'Dacia' => ['Sandero', 'Duster', 'Logan', 'Jogger', 'Spring', 'Lodgy', 'Dokker', 'Lodgy Stepway'],
            'Daewoo' => ['Matiz', 'Nexia', 'Lanos', 'Leganza', 'Magnus', 'Tacuma'],
            'Daihatsu' => ['Terios', 'Move', 'Copen', 'Mira', 'Sirion', 'Charade', 'Rocky', 'YRV'],
            'Dodge' => ['Charger', 'Challenger', 'Durango', 'Caravan', 'Viper', 'Dart', 'Grand Caravan', 'Journey'],
            'Dongfeng' => ['Aeolus', 'Venucia', 'Fengon', 'Joy', 'Forthing', 'A9', 'S50', 'E70', 'Rich'],
            'DS Automobiles' => ['DS 3', 'DS 4', 'DS 5', 'DS 7', 'DS 9'],
            'FAW' => ['Bestune', 'Hongqi', 'Jiefang', 'Oley', 'Vita'],
            'Ferrari' => ['296 GTB', 'SF90', 'Roma', 'Portofino', 'F8 Tributo', '812 Superfast', 'GTC4Lusso', 'LaFerrari'],
            'Fiat' => ['500', 'Panda', 'Tipo', 'Punto', 'Ducato', 'Multipla', '500X', '500L'],
            'Fisker' => ['Ocean', 'Pear', 'Rōnin', 'Alaska'],
            'Ford' => ['F-150', 'Mustang', 'Explorer', 'Focus', 'Bronco', 'Ranger', 'Edge', 'Escape', 'Fusion', 'Expedition'],
            'Geely' => ['Emgrand', 'Coolray', 'Tugella', 'Geometry', 'Binrui', 'Binyue', 'Monjaro'],
            'Genesis' => ['G70', 'G80', 'G90', 'GV70', 'GV80', 'GV60', 'Coupe'],
            'GMC' => ['Sierra', 'Yukon', 'Acadia', 'Canyon', 'Hummer EV', 'Terrain', 'Savana'],
            'Great Wall' => ['Wingle', 'Poer', 'Tank', 'ORA', 'Haval Jolion', 'Haval H6', 'Haval F7', 'Haval M6'],
            'Haval' => ['H6', 'Jolion', 'Big Dog', 'Dargo', 'Cool Dog', 'F7', 'F7x', 'H9'],
            'Hino' => ['Dutro', 'Ranger', '700 Series', '500 Series', 'Profia'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'HR-V', 'NSX', 'Odyssey', 'Ridgeline', 'Passport'],
            'Hyundai' => ['Tucson', 'Santa Fe', 'Elantra', 'Kona', 'IONIQ 5', 'Sonata', 'Palisade', 'Veloster', 'Kona EV'],
            'Infiniti' => ['Q50', 'QX60', 'QX80', 'QX55', 'QX50', 'Q60', 'Q70', 'FX'],
            'Isuzu' => ['D-Max', 'MU-X', 'N-Series', 'F-Series', 'Elf', 'Giga', 'VX'],
            'Jaguar' => ['XE', 'XF', 'F-Pace', 'I-Pace', 'F-Type', 'XJ', 'E-Pace', 'XK'],
            'Jeep' => ['Wrangler', 'Grand Cherokee', 'Cherokee', 'Compass', 'Gladiator', 'Renegade', ' Wagoneer'],
            'Kia' => ['Sportage', 'Sorento', 'Telluride', 'EV6', 'Carnival', 'K5', 'Stinger', 'Niro'],
            'Koenigsegg' => ['Jesko', 'Gemera', 'Regera', 'Agera', 'CCXR', 'One:1'],
            'Lada' => ['Granta', 'Vesta', 'Niva', 'XRAY', 'Largus', '4x4', 'Samara'],
            'Lamborghini' => ['Huracán', 'Aventador', 'Urus', 'Revuelto', 'Sian', 'Murciélago', 'Countach'],
            'Lancia' => ['Ypsilon', 'Delta', 'Stratos', 'Thema', 'Flavia', 'Kappa'],
            'Land Rover' => ['Defender', 'Discovery', 'Range Rover', 'Velar', 'Evoque', 'Freelander'],
            'Lexus' => ['ES', 'RX', 'NX', 'LS', 'LC', 'LX', 'UX'],

            'Lincoln' => ['Navigator', 'Aviator', 'Corsair', 'Nautilus', 'Continental', 'MKZ', 'MKT', 'MKX'],
            'Lotus' => ['Emira', 'Evija', 'Elise', 'Exige', 'Eletre', 'Europa', 'Esprit', 'Elite', 'Elan'],
            'Lucid' => ['Air', 'Gravity', 'Sapphire', 'Pure', 'Grand Touring', 'Touring'],
            'Mahindra' => ['Scorpio', 'Thar', 'XUV700', 'Bolero', 'Alturas', 'Marazzo', 'TUV300', 'KUV100'],
            'Maserati' => ['Ghibli', 'Quattroporte', 'MC20', 'Grecale', 'Levante', 'GranTurismo', 'GranCabrio', 'Coupé'],
            'Maybach' => ['S-Class', 'GLS', 'EQS', 'Exelero', '57', '62', 'Maybach 6'],
            'Mazda' => ['CX-5', 'CX-30', 'MX-5', '3', '6', 'CX-90', 'CX-50', 'Mazda2', 'Mazda3', 'Mazda6', 'Mazda CX-3'],
            'McLaren' => ['720S', 'Artura', 'GT', 'Senna', 'P1', '570S', '540C', '675LT', 'Elva', 'Speedtail'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'S-Class', 'GLC', 'AMG GT', 'GLS', 'A-Class', 'B-Class', 'CLA', 'G-Class', 'EQC', 'SLS'],
            'MG' => ['ZS', 'HS', '5', '3', 'Cyberster', 'Marvel R', 'MG6', 'MG3', 'MG Hector', 'MG ZS EV'],

            'Mini' => ['Cooper', 'Countryman', 'Clubman', 'Paceman', 'Electric', 'Convertible', 'John Cooper Works'],
            'Mitsubishi' => ['Outlander', 'Eclipse Cross', 'Pajero', 'Lancer', 'ASX', 'Mirage', 'Outlander PHEV'],
            'Nissan' => ['Altima', 'Rogue', 'Sentra', 'Z', 'Pathfinder', 'GT-R', 'Maxima', 'Armada', 'Titan', 'Leaf'],
            'Opel' => ['Corsa', 'Astra', 'Insignia', 'Mokka', 'Crossland', 'Grandland', 'Zafira', 'Karl', 'Vivaro'],
            'Pagani' => ['Huayra', 'Zonda', 'Utopia', 'Imola', 'Huayra Roadster', 'Zonda Roadster'],

            'Peugeot' => ['208', '308', '508', '3008', '5008', 'e-2008', '2008', 'Partner', 'Expert', 'Boxer'],
            'Polestar' => ['1', '2', '3', '4', '5', '6', 'Polestar Precept'],
            'Pontiac' => ['GTO', 'Firebird', 'Trans Am', 'Grand Prix', 'Solstice', 'Vibe', 'Bonneville', 'Aztek'],
            'Porsche' => ['911', 'Cayenne', 'Panamera', 'Taycan', 'Macan', '718 Cayman', '718 Boxster', 'Targa'],
            'Proton' => ['Saga', 'X70', 'X50', 'Persona', 'Iriz', 'Exora', 'Pride'],

            'RAM' => ['1500', '2500', 'Promaster', 'Chassis Cab', '3500', 'ProMaster City'],
            'Renault' => ['Clio', 'Megane', 'Captur', 'Kadjar', 'Zoe', 'Twingo', 'Koleos', 'Scenic'],
            'Rivian' => ['R1T', 'R1S', 'R2', 'R3', 'EDV'],
            'Rolls-Royce' => ['Phantom', 'Ghost', 'Wraith', 'Cullinan', 'Spectre', 'Dawn', 'Silver Shadow'],
            'Rover' => ['Range Rover', 'Discovery', 'Defender', 'Freelander', 'Evoque', 'Sport', 'Velar'],

            'Saab' => ['9-3', '9-5', '900', '93', '95', '9000', '9-7X', '9-2X', '9-4X'],
            'Scion' => ['tC', 'xA', 'xB', 'FR-S', 'iQ', 'xD', 'xRunner', 'L-Series', 'F-Series'],
            'SEAT' => ['Leon', 'Ibiza', 'Arona', 'Ateca', 'Tarraco', 'Toledo', 'Mii', 'Alhambra', 'Exeo'],
            'Škoda' => ['Octavia', 'Superb', 'Kodiaq', 'Karoq', 'Enyaq', 'Fabia', 'Roomster', 'Rapid', 'Yeti', 'Citigo', 'Scala'],
            'Smart' => ['Fortwo', 'Forfour', '#1', 'Crossblade', 'Roadster', 'City-Coupé', 'Fortwo Cabrio', 'Fortwo Electric Drive'],

            'SsangYong' => ['Rexton', 'Tivoli', 'Korando', 'Musso', 'Rodius', 'Actyon', 'Kyron', 'Stavic'],
            'Subaru' => ['Outback', 'Forester', 'Impreza', 'WRX', 'Crosstrek', 'Legacy', 'Ascent', 'BRZ', 'XV'],
            'Suzuki' => ['Swift', 'Vitara', 'Jimny', 'Baleno', 'S-Cross', 'Celerio', 'Alto', 'Ignis', 'Ertiga'],
            'Tata' => ['Nexon', 'Harrier', 'Safari', 'Tiago', 'Punch', 'Tigor', 'Altroz', 'Hexa', 'Zest'],
            'Tesla' => ['Model S', 'Model 3', 'Model X', 'Model Y', 'Cybertruck', 'Roadster', 'Semi'],

            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Highlander', 'Supra', 'Prius', 'Land Cruiser', 'Hilux', 'Tacoma'],
            'Vauxhall' => ['Corsa', 'Astra', 'Insignia', 'Crossland', 'Grandland', 'Mokka', 'Zafira', 'Vivaro'],
            'VinFast' => ['VF 6', 'VF 7', 'VF 8', 'VF 9', 'VF 3', 'Lux A2.0', 'Lux SA2.0'],
            'Volkswagen' => ['Golf', 'Passat', 'Tiguan', 'ID.4', 'Arteon', 'Polo', 'Jetta', 'Beetle', 'Touareg'],
            'Volvo' => ['XC90', 'XC60', 'S90', 'C40', 'EX90', 'V90', 'S60', 'XC40', 'V60'],
            'Wuling' => ['Hongguang', 'Almaz', 'Astro', 'Bingo', 'Victory', 'Mini EV', 'Cubo', 'Max'],
            'Zotye' => ['T600', 'T300', 'Z500', 'E200', 'SR9', 'Z8', 'T700', 'Z6'],
        ];

        foreach ($brandModels as $brandName => $models) {
            $brand = CarBrand::where('name', $brandName)->first();

            if (!$brand) continue;

            foreach ($models as $modelName) {
                CarModel::firstOrCreate([
                    'car_brand_id' => $brand->id,
                    'slug' => Str::slug($brand->slug . ' ' . $modelName)
                ], [
                    'name' => $modelName,
                    'is_active' => 'active'
                ]);
            }
        }
    }
}
