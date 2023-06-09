<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Countries;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['country' => 'Afghanistan'],
            ['country' => 'Albania'],
            ['country' => 'Algeria'],
            ['country' => 'Andorra'],
            ['country' => 'Angola'],
            ['country' => 'Antigua and Barbuda'],
            ['country' => 'Argentina'],
            ['country' => 'Armenia'],
            ['country' => 'Australia'],
            ['country' => 'Austria'],
            ['country' => 'Azerbaijan'],
            ['country' => 'Bahamas'],
            ['country' => 'Bahrain'],
            ['country' => 'Bangladesh'],
            ['country' => 'Barbados'],
            ['country' => 'Belarus'],
            ['country' => 'Belgium'],
            ['country' => 'Belize'],
            ['country' => 'Benin'],
            ['country' => 'Bhutan'],
            ['country' => 'Bolivia'],
            ['country' => 'Bosnia and Herzegovina'],
            ['country' => 'Botswana'],
            ['country' => 'Brazil'],
            ['country' => 'Brunei'],
            ['country' => 'Bulgaria'],
            ['country' => 'Burkina Faso'],
            ['country' => 'Burundi'],
            ['country' => 'Cabo Verde'],
            ['country' => 'Cambodia'],
            ['country' => 'Cameroon'],
            ['country' => 'Canada'],
            ['country' => 'Central African Republic'],
            ['country' => 'Chad'],
            ['country' => 'Chile'],
            ['country' => 'China'],
            ['country' => 'Colombia'],
            ['country' => 'Comoros'],
            ['country' => 'Congo, Democratic Republic of the'],
            ['country' => 'Congo, Republic of the'],
            ['country' => 'Costa Rica'],
            ['country' => 'Côte d’Ivoire'],
            ['country' => 'Croatia'],
            ['country' => 'Cuba'],
            ['country' => 'Cyprus'],
            ['country' => 'Czech Republic'],
            ['country' => 'Denmark'],
            ['country' => 'Djibouti'],
            ['country' => 'Dominica'],
            ['country' => 'Dominican Republic'],
            ['country' => 'East Timor (Timor-Leste)'],
            ['country' => 'Ecuador'],
            ['country' => 'Egypt'],
            ['country' => 'El Salvador'],
            ['country' => 'Equatorial Guinea'],
            ['country' => 'Eritrea'],
            ['country' => 'Estonia'],
            ['country' => 'Eswatini'],
            ['country' => 'Ethiopia'],
            ['country' => 'Fiji'],
            ['country' => 'Finland'],
            ['country' => 'France'],
            ['country' => 'Gabon'],
            ['country' => 'Gambia'],
            ['country' => 'Georgia'],
            ['country' => 'Germany'],
            ['country' => 'Ghana'],
            ['country' => 'Greece'],
            ['country' => 'Grenada'],
            ['country' => 'Guatemala'],
            ['country' => 'Guinea'],
            ['country' => 'Guinea-Bissau'],
            ['country' => 'Guyana'],
            ['country' => 'Haiti'],
            ['country' => 'Honduras'],
            ['country' => 'Hungary'],
            ['country' => 'Iceland'],
            ['country' => 'India'],
            ['country' => 'Indonesia'],
            ['country' => 'Iran'],
            ['country' => 'Iraq'],
            ['country' => 'Ireland'],
            ['country' => 'Israel'],
            ['country' => 'Italy'],
            ['country' => 'Jamaica'],
            ['country' => 'Japan'],
            ['country' => 'Jordan'],
            ['country' => 'Kazakhstan'],
            ['country' => 'Kenya'],
            ['country' => 'Kiribati'],
            ['country' => 'Korea, North'],
            ['country' => 'Korea, South'],
            ['country' => 'Kosovo'],
            ['country' => 'Kuwait'],
            ['country' => 'Kyrgyzstan'],
            ['country' => 'Laos'],
            ['country' => 'Latvia'],
            ['country' => 'Lebanon'],
            ['country' => 'Lesotho'],
            ['country' => 'Liberia'],
            ['country' => 'Libya'],
            ['country' => 'Liechtenstein'],
            ['country' => 'Lithuania'],
            ['country' => 'Luxembourg'],
            ['country' => 'Madagascar'],
            ['country' => 'Malawi'],
            ['country' => 'Malaysia'],
            ['country' => 'Maldives'],
            ['country' => 'Mali'],
            ['country' => 'Malta'],
            ['country' => 'Marshall Islands'],
            ['country' => 'Mauritania'],
            ['country' => 'Mauritius'],
            ['country' => 'Mexico'],
            ['country' => 'Micronesia'],
            ['country' => 'Moldova'],
            ['country' => 'Monaco'],
            ['country' => 'Mongolia'],
            ['country' => 'Montenegro'],
            ['country' => 'Morocco'],
            ['country' => 'Mozambique'],
            ['country' => 'Myanmar (Burma)'],
            ['country' => 'Namibia'],
            ['country' => 'Nauru'],
            ['country' => 'Nepal'],
            ['country' => 'Netherlands'],
            ['country' => 'New Zealand'],
            ['country' => 'Nicaragua'],
            ['country' => 'Niger'],
            ['country' => 'Nigeria'],
            ['country' => 'North Macedonia'],
            ['country' => 'Norway'],
            ['country' => 'Oman'],
            ['country' => 'Pakistan'],
            ['country' => 'Palau'],
            ['country' => 'Panama'],
            ['country' => 'Papua New Guinea'],
            ['country' => 'Paraguay'],
            ['country' => 'Peru'],
            ['country' => 'Philippines'],
            ['country' => 'Poland'],
            ['country' => 'Portugal'],
            ['country' => 'Qatar'],
            ['country' => 'Romania'],
            ['country' => 'Russia'],
            ['country' => 'Rwanda'],
            ['country' => 'Saint Kitts and Nevis'],
            ['country' => 'Saint Lucia'],
            ['country' => 'Saint Vincent and the Grenadines'],
            ['country' => 'Samoa'],
            ['country' => 'San Marino'],
            ['country' => 'Sao Tome and Principe'],
            ['country' => 'Saudi Arabia'],
            ['country' => 'Senegal'],
            ['country' => 'Serbia'],
            ['country' => 'Seychelles'],
            ['country' => 'Sierra Leone'],
            ['country' => 'Singapore'],
            ['country' => 'Slovakia'],
            ['country' => 'Slovenia'],
            ['country' => 'Solomon Islands'],
            ['country' => 'Somalia'],
            ['country' => 'South Africa'],
            ['country' => 'Spain'],
            ['country' => 'Sri Lanka'],
            ['country' => 'Sudan'],
            ['country' => 'Sudan, South'],
            ['country' => 'Suriname'],
            ['country' => 'Sweden'],
            ['country' => 'Switzerland'],
            ['country' => 'Syria'],
            ['country' => 'Taiwan'],
            ['country' => 'Tajikistan'],
            ['country' => 'Tanzania'],
            ['country' => 'Thailand'],
            ['country' => 'Togo'],
            ['country' => 'Tonga'],
            ['country' => 'Trinidad and Tobago'],
            ['country' => 'Tunisia'],
            ['country' => 'Turkey'],
            ['country' => 'Turkmenistan'],
            ['country' => 'Tuvalu'],
            ['country' => 'Uganda'],
            ['country' => 'Ukraine'],
            ['country' => 'United Arab Emirates'],
            ['country' => 'United Kingdom'],
            ['country' => 'United States'],
            ['country' => 'Uruguay'],
            ['country' => 'Uzbekistan'],
            ['country' => 'Vanuatu'],
            ['country' => 'Vatican City'],
            ['country' => 'Venezuela'],
            ['country' => 'Vietnam'],
            ['country' => 'Yemen'],
            ['country' => 'Zambia'],
            ['country' => 'Zimbabwe'],
        ];

        Countries::insert($countries);
    }
}
