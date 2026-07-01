<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $en = optional(Language::where('name', 'English')->first())->id ?? 1;
        $bg = optional(Language::where('name', 'Bulgarian')->first())->id ?? 2;

        $permitBg = 'Сезонна: до 10 дни · Дългосрочна: до 2 месеца';
        $permitEn = 'Seasonal: up to 10 days · Long-term: up to 2 months';

        // slug, iso, [en name,title,short,content,sectors,languages], [bg ...]
        $countries = [
            [
                'slug' => 'nepal', 'iso' => 'np',
                'en' => [
                    'name' => 'Nepal', 'title' => 'Workers from Nepal',
                    'short' => 'Reliable, motivated and hard-working staff for a range of industries.',
                    'content' => "Nepal is one of our key markets for sourcing personnel. Workers from Nepal are known for their reliability, strong work ethic and willingness to adapt quickly to a new working environment.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Tourism, Construction, Manufacturing, Logistics',
                    'languages' => 'Nepali, English',
                ],
                'bg' => [
                    'name' => 'Непал', 'title' => 'Работници от Непал',
                    'short' => 'Надеждни, мотивирани и трудолюбиви служители за различни индустрии.',
                    'content' => "Непал е един от основните ни пазари за подбор на кадри. Работниците от Непал са известни със своята надеждност, силна трудова етика и готовност бързо да се адаптират към нова работна среда.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Туризъм, Строителство, Производство, Логистика',
                    'languages' => 'Непалски, английски',
                ],
            ],
            [
                'slug' => 'india', 'iso' => 'in',
                'en' => [
                    'name' => 'India', 'title' => 'Workers from India',
                    'short' => 'Skilled and semi-skilled workers with a strong work ethic.',
                    'content' => "India offers a large pool of skilled and semi-skilled professionals across many trades. Indian workers are valued for their qualifications, discipline and good command of English.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Manufacturing, IT, Hospitality, Construction',
                    'languages' => 'Hindi, English',
                ],
                'bg' => [
                    'name' => 'Индия', 'title' => 'Работници от Индия',
                    'short' => 'Квалифицирани и полуквалифицирани кадри с добра трудова етика.',
                    'content' => "Индия предлага голям ресурс от квалифицирани и полуквалифицирани специалисти в множество професии. Кадрите от Индия се ценят за квалификацията, дисциплината и доброто владеене на английски език.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Производство, IT, Хотелиерство, Строителство',
                    'languages' => 'Хинди, английски',
                ],
            ],
            [
                'slug' => 'bangladesh', 'iso' => 'bd',
                'en' => [
                    'name' => 'Bangladesh', 'title' => 'Workers from Bangladesh',
                    'short' => 'An excellent choice for manufacturing, construction, hotels and more.',
                    'content' => "Bangladesh is an excellent source of dependable labour for production and construction. Workers are hard-working, adaptable and quick to learn on the job.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Manufacturing, Construction, Hospitality',
                    'languages' => 'Bengali, English',
                ],
                'bg' => [
                    'name' => 'Бангладеш', 'title' => 'Работници от Бангладеш',
                    'short' => 'Отличен избор за производство, строителство, хотели и други.',
                    'content' => "Бангладеш е отличен източник на надеждна работна ръка за производството и строителството. Работниците са трудолюбиви, адаптивни и бързо усвояват новите си задължения.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Производство, Строителство, Хотелиерство',
                    'languages' => 'Бенгалски, английски',
                ],
            ],
            [
                'slug' => 'uzbekistan', 'iso' => 'uz',
                'en' => [
                    'name' => 'Uzbekistan', 'title' => 'Workers from Uzbekistan',
                    'short' => 'Experienced and adaptable workers for your business.',
                    'content' => "Uzbekistan provides experienced, adaptable workers who integrate well into European workplaces. Many have prior experience abroad and a solid command of Russian.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Construction, Manufacturing, Logistics',
                    'languages' => 'Uzbek, Russian',
                ],
                'bg' => [
                    'name' => 'Узбекистан', 'title' => 'Работници от Узбекистан',
                    'short' => 'Опитни и адаптивни служители за вашия бизнес.',
                    'content' => "Узбекистан предоставя опитни и адаптивни работници, които се интегрират добре в европейска работна среда. Много от тях имат предишен опит в чужбина и добро владеене на руски език.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Строителство, Производство, Логистика',
                    'languages' => 'Узбекски, руски',
                ],
            ],
            [
                'slug' => 'kyrgyzstan', 'iso' => 'kg',
                'en' => [
                    'name' => 'Kyrgyzstan', 'title' => 'Workers from Kyrgyzstan',
                    'short' => 'Motivated workers, ready to work in Bulgaria.',
                    'content' => "Kyrgyzstan is a growing source of motivated workers ready to relocate and start quickly. They adapt well and are known for their commitment on the job.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Construction, Agriculture, Manufacturing',
                    'languages' => 'Kyrgyz, Russian',
                ],
                'bg' => [
                    'name' => 'Киргизстан', 'title' => 'Работници от Киргизстан',
                    'short' => 'Мотивирани кадри, готови за работа в България.',
                    'content' => "Киргизстан е все по-важен източник на мотивирани работници, готови да се преместят и да започнат бързо. Те се адаптират лесно и се отличават с ангажираност към работата.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Строителство, Земеделие, Производство',
                    'languages' => 'Киргизки, руски',
                ],
            ],
            [
                'slug' => 'turkey', 'iso' => 'tr',
                'en' => [
                    'name' => 'Turkey', 'title' => 'Workers from Turkey',
                    'short' => 'Qualified specialists with experience across a range of sectors.',
                    'content' => "Turkey offers qualified specialists and tradespeople with extensive experience, often already familiar with European standards and close to Bulgaria geographically.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Construction, Manufacturing, Tourism',
                    'languages' => 'Turkish, English',
                ],
                'bg' => [
                    'name' => 'Турция', 'title' => 'Работници от Турция',
                    'short' => 'Квалифицирани специалисти с опит в редица сектори.',
                    'content' => "Турция предлага квалифицирани специалисти и майстори с богат опит, често вече запознати с европейските стандарти и в непосредствена близост до България.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Строителство, Производство, Туризъм',
                    'languages' => 'Турски, английски',
                ],
            ],
            [
                'slug' => 'philippines', 'iso' => 'ph',
                'en' => [
                    'name' => 'Philippines', 'title' => 'Workers from the Philippines',
                    'short' => 'Dedicated, English-speaking staff for the service industry.',
                    'content' => "The Philippines is renowned for dedicated, service-oriented and fluent English-speaking staff — an excellent fit for hospitality, care and customer-facing roles.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Hospitality, Care, Services',
                    'languages' => 'Filipino, English',
                ],
                'bg' => [
                    'name' => 'Филипини', 'title' => 'Работници от Филипините',
                    'short' => 'Отдадени и англоговорящи служители за сферата на услугите.',
                    'content' => "Филипините са известни с отдадени, ориентирани към обслужване и свободно владеещи английски език служители — отличен избор за хотелиерство, грижи и позиции с директен контакт с клиенти.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Хотелиерство, Грижи, Услуги',
                    'languages' => 'Филипински, английски',
                ],
            ],
            [
                'slug' => 'vietnam', 'iso' => 'vn',
                'en' => [
                    'name' => 'Vietnam', 'title' => 'Workers from Vietnam',
                    'short' => 'Disciplined and dexterous workers for manufacturing and factories.',
                    'content' => "Vietnam is a strong source of disciplined, detail-oriented workers, particularly well-suited to manufacturing and factory environments that demand precision.\n\nWe manage the full process — from selection and experience checks to issuing the necessary permits, transport to Bulgaria and accommodation on arrival.",
                    'sectors' => 'Manufacturing, Factories, Agriculture',
                    'languages' => 'Vietnamese',
                ],
                'bg' => [
                    'name' => 'Виетнам', 'title' => 'Работници от Виетнам',
                    'short' => 'Дисциплинирани и сръчни работници за производство и заводи.',
                    'content' => "Виетнам е силен източник на дисциплинирани и прецизни работници, особено подходящи за производствена и заводска среда, изискваща внимание към детайла.\n\nСъдействаме с целия процес — от подбор и проверка на опита до издаване на необходимите разрешителни, транспорт до България и настаняване при пристигане.",
                    'sectors' => 'Производство, Заводи, Земеделие',
                    'languages' => 'Виетнамски',
                ],
            ],
        ];

        foreach ($countries as $index => $c) {
            foreach (['en' => $en, 'bg' => $bg] as $key => $languageId) {
                $data = $c[$key];
                Country::create([
                    'slug' => $c['slug'],
                    'iso_code' => $c['iso'],
                    'name' => $data['name'],
                    'title' => $data['title'],
                    'short_description' => $data['short'],
                    'content' => $data['content'],
                    'sectors' => $data['sectors'],
                    'languages' => $data['languages'],
                    'permit_time' => $key === 'en' ? $permitEn : $permitBg,
                    'order' => $index + 1,
                    'language_id' => $languageId,
                ]);
            }
        }
    }
}
