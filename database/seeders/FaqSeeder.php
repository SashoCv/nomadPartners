<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $en = optional(Language::where('name', 'English')->first())->id ?? 1;
        $bg = optional(Language::where('name', 'Bulgarian')->first())->id ?? 2;

        $english = [
            [
                'question' => 'How long does the process of hiring a seasonal worker take?',
                'answer' => "The duration of the process depends on the candidate's country of origin and the length of employment. The entire hiring process takes between 3 and 4 weeks.",
            ],
            [
                'question' => 'How long does it take to obtain a seasonal work permit?',
                'answer' => 'Issuing a seasonal employment permit usually takes up to 10 days.',
            ],
            [
                'question' => 'How long does it take to hire an employee for year-round employment?',
                'answer' => 'If the candidate is hired for long-term employment (1 to 3 years), the procedure for obtaining the necessary permits usually takes up to two months.',
            ],
            [
                'question' => 'Which countries do the foreign workers come from?',
                'answer' => 'We work with personnel from countries outside the European Union, including: Turkey, Kyrgyzstan, Uzbekistan, Nepal, Bangladesh, India, the Philippines and Vietnam.',
            ],
            [
                'question' => 'In which sectors can you find people?',
                'answer' => 'We work across a variety of sectors and can find suitable workers for: tourism, agriculture, manufacturing, energy, beauty salons and cosmetic services, construction and logistics.',
            ],
            [
                'question' => 'What are the costs for companies that hire workers from third countries?',
                'answer' => 'The company must cover the transport costs for the workers from their home country to Bulgaria, as well as provide their accommodation. In addition, the company must pay a one-time fee to our agency.',
            ],
            [
                'question' => 'Do you provide accommodation for the workers?',
                'answer' => 'Yes, we can assist with providing accommodation for your workers. We have several dormitories in Sofia, each with over 100 beds, located in convenient areas with easy access to public transport.',
            ],
            [
                'question' => 'What documents are required to start the process of hiring a foreign worker?',
                'answer' => "Basic company documents of the employer, a description of the position and the requirements for the candidate are required. We assist with the candidates' complete documentation.",
            ],
            [
                'question' => 'How long does it take to select suitable candidates?',
                'answer' => 'The first profiles of suitable candidates are usually provided within 3 to 7 working days, depending on the position.',
            ],
            [
                'question' => 'Are interviews conducted with candidates before arrival?',
                'answer' => 'Yes, the employer has the option to conduct online interviews with the pre-approved candidates.',
            ],
            [
                'question' => 'How is the quality of the foreign workers ensured?',
                'answer' => 'Every candidate goes through a preliminary selection, an experience check and a basic assessment of their skills against the specific position.',
            ],
            [
                'question' => 'Do you provide both seasonal and year-round workers?',
                'answer' => 'Yes, we offer both seasonal employment and long-term solutions for permanent positions.',
            ],
            [
                'question' => 'What is the process after the worker arrives in Bulgaria?',
                'answer' => 'After arrival, we assist with accommodation, registration and adaptation to the work environment.',
            ],
            [
                'question' => 'What happens if a worker does not meet expectations?',
                'answer' => 'Depending on the case, we can offer a replacement for the candidate in accordance with the agreed terms.',
            ],
            [
                'question' => 'Is there a minimum number of workers per request?',
                'answer' => 'We work with both small requests for single positions and large group placements.',
            ],
            [
                'question' => 'How quickly can workers start work after approval?',
                'answer' => 'Once the documents are finalized and the permits are issued, the workers can start work immediately after their arrival.',
            ],
            [
                'question' => 'Do you provide support with communication with the candidates?',
                'answer' => 'Yes, we provide coordination and communication between the employer and the candidates throughout the entire process.',
            ],
            [
                'question' => 'How is payment to the foreign workers carried out?',
                'answer' => 'Payment is made directly by the employer in accordance with Bulgarian labour legislation.',
            ],
            [
                'question' => 'Can workers change employer after arrival?',
                'answer' => 'Changing employer is possible, but it is subject to legal procedures and a new permit.',
            ],
            [
                'question' => 'Do you offer long-term support after the placement?',
                'answer' => 'Yes, we provide ongoing support throughout the entire period of employment.',
            ],
        ];

        $bulgarian = [
            [
                'question' => 'Колко време отнема процесът по назначаване на сезонен служител?',
                'answer' => 'Продължителността на процеса зависи от произхода на кандидата и продължителността на заетостта. Като целият процес по назначаване трае между 3 и 4 седмици.',
            ],
            [
                'question' => 'Какъв е срокът за получаване на разрешителното за сезонна работа?',
                'answer' => 'Обикновено издаването на разрешение за сезонна заетост отнема до 10 дни.',
            ],
            [
                'question' => 'Какъв е срокът за назначаване на служител с целогодишна заетост?',
                'answer' => 'Ако кандидатът се наема за дългосрочна заетост (от 1 до 3 години), процедурата за получаване на необходимите разрешителни обикновено отнема до два месеца.',
            ],
            [
                'question' => 'От кои държави идват чуждестранните служители?',
                'answer' => 'Сътрудничим си с кадри от страни извън Европейския съюз, включително: Турция, Киргизстан, Узбекистан, Непал, Бангладеш, Индия, Филипини и Виетнам.',
            ],
            [
                'question' => 'В кои сектори можете да намерите хора?',
                'answer' => 'Ние работим с различни сектори, като можем да открием подходящи служители за: туризъм, земеделие, производство, енергетика, салони за красота и козметични услуги, строителство и логистика.',
            ],
            [
                'question' => 'Какви са разходите за фирмите, които наемат служители от трети страни?',
                'answer' => 'Фирмата трябва да поеме разходите за транспорт на служители от тяхната държава до България, както и да осигури тяхното настаняване. Допълнително, фирмата трябва да заплати еднократна такса към нашата агенция.',
            ],
            [
                'question' => 'Предоставяте ли настаняване за служителите?',
                'answer' => 'Да, можем да съдействаме с осигуряване на настаняване за вашите служители. Разполагаме с няколко общежития в София, всяко с над 100 легла, разположени на удобни локации с лесен достъп до градски транспорт.',
            ],
            [
                'question' => 'Какви документи са необходими за започване на процеса по наемане на чуждестранен служител?',
                'answer' => 'Необходими са основни фирмени документи на работодателя, описание на позицията и изискванията към кандидата. Ние съдействаме с пълната документация за кандидатите.',
            ],
            [
                'question' => 'Колко време отнема подборът на подходящи кандидати?',
                'answer' => 'Обикновено първите профили на подходящи кандидати се предоставят в рамките на 3 до 7 работни дни, в зависимост от позицията.',
            ],
            [
                'question' => 'Провеждат ли се интервюта с кандидатите преди пристигане?',
                'answer' => 'Да, работодателят има възможност да провежда онлайн интервюта с предварително одобрените кандидати.',
            ],
            [
                'question' => 'Как се гарантира качеството на чуждестранните служители?',
                'answer' => 'Всеки кандидат преминава предварителен подбор, проверка на опит и базова оценка на уменията спрямо конкретната позиция.',
            ],
            [
                'question' => 'Осигурявате ли сезонни и целогодишни служители?',
                'answer' => 'Да, предлагаме както сезонна заетост, така и дългосрочни решения за постоянни позиции.',
            ],
            [
                'question' => 'Какъв е процесът след пристигане на служителя в България?',
                'answer' => 'След пристигане съдействаме с настаняване, регистрация и адаптация към работната среда.',
            ],
            [
                'question' => 'Какво се случва, ако служителят не отговаря на очакванията?',
                'answer' => 'В зависимост от случая, можем да предложим замяна на кандидата съгласно договорените условия.',
            ],
            [
                'question' => 'Има ли минимален брой служители за заявка?',
                'answer' => 'Работим както с малки заявки за единични позиции, така и с големи групови назначения.',
            ],
            [
                'question' => 'Колко бързо могат да започнат работа служителите след одобрение?',
                'answer' => 'След финализиране на документите и издаване на разрешителни, служителите могат да започнат работа веднага след пристигането си.',
            ],
            [
                'question' => 'Предоставяте ли подкрепа при комуникация с кандидатите?',
                'answer' => 'Да, осигуряваме координация и комуникация между работодателя и кандидатите през целия процес.',
            ],
            [
                'question' => 'Как се извършва плащането към чуждестранните служители?',
                'answer' => 'Заплащането се извършва директно от работодателя съгласно българското трудово законодателство.',
            ],
            [
                'question' => 'Могат ли служителите да сменят работодател след пристигане?',
                'answer' => 'Смяната на работодател е възможна, но подлежи на законови процедури и ново разрешително.',
            ],
            [
                'question' => 'Предлагате ли дългосрочна подкрепа след назначаването?',
                'answer' => 'Да, предоставяме постоянна подкрепа по време на целия период на заетост.',
            ],
        ];

        foreach ($english as $index => $faq) {
            Faq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'order' => $index + 1,
                'language_id' => $en,
            ]);
        }

        foreach ($bulgarian as $index => $faq) {
            Faq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'order' => $index + 1,
                'language_id' => $bg,
            ]);
        }
    }
}
