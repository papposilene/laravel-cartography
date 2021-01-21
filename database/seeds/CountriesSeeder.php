<?php

use App\Country;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Drop the table
        DB::table('countries')->delete();
        // Countries https://github.com/mledoze/countries/blob/master/countries.json
        $countriesFile = File::get('database/data/countries/countries.json');
        $countriesData = json_decode($countriesFile);
        foreach ($countriesData as $data)
        {
            Country::create([
                'name_eng_common'   => addslashes($data->name->common),
                'name_eng_official' => addslashes($data->name->official),
                'cca2'              => $data->cca2,
                'cca3'              => $data->cca3,
                'cioc'              => $data->cioc,
                'tlds'              => json_encode($data->tld, JSON_FORCE_OBJECT),
                'ccn3'              => $data->ccn3,
                'area'              => $data->area,
                'region'            => $data->region,
                'subregion'         => $data->subregion,
                'latlng'            => json_encode(array('lat' => $data->latlng[1], 'lng' => $data->latlng[0])),
                'landlocked'        => ($data->landlocked === true ? 'true' : 'false'),
                'neighbourhood'     => (empty($data->borders) ? 'null' : json_encode($data->borders, JSON_FORCE_OBJECT)),
                'status'            => $data->status,
                'independent'       => ($data->independent === true ? 'true' : 'false'),
                'un_member'         => ($data->unMember === true ? 'true' : 'false'),
                'flag'              => $data->flag,
                'currencies'        => json_encode($data->currencies, JSON_FORCE_OBJECT),
                'capital'           => json_encode($data->capital, JSON_FORCE_OBJECT),
                'demonyms'          => json_encode($data->demonyms, JSON_FORCE_OBJECT),
                'languages'         => json_encode($data->languages, JSON_FORCE_OBJECT),
                'name_native'       => json_encode($data->name->native, JSON_FORCE_OBJECT),
                'name_translations' => json_encode($data->translations, JSON_FORCE_OBJECT)
			]);
        }
    }
}
