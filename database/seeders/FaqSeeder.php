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
                'question' => 'What does Nomad Partners do?',
                'answer' => 'Nomad Partners is a licensed employment intermediary. We connect employers with qualified candidates, both locally and internationally, and support the full recruitment process from selection to onboarding.',
            ],
            [
                'question' => 'Is Nomad Partners a licensed agency?',
                'answer' => "Yes. Nomad Partners holds License №2535 issued by the Ministry of Labour and Social Policy. You can view the official certificate on our home page.",
            ],
            [
                'question' => 'Do candidates pay any fees?',
                'answer' => 'No. Our services for candidates are free of charge. Our fees are covered by the employers we work with.',
            ],
            [
                'question' => 'Which industries and roles do you recruit for?',
                'answer' => 'We recruit across a wide range of sectors, including manufacturing, logistics, hospitality, construction, IT and administration. If you have a specific role in mind, get in touch and we will advise you.',
            ],
            [
                'question' => 'How long does the recruitment process take?',
                'answer' => 'Timelines depend on the role and the requirements. For most positions we present suitable candidates within a few weeks. International placements that involve work permits may take longer.',
            ],
            [
                'question' => 'How can I get started?',
                'answer' => 'The easiest way is to contact us through the form on our Contact page or by phone. Tell us whether you are an employer or a candidate and we will guide you through the next steps.',
            ],
        ];

        $bulgarian = [
            [
                'question' => 'С какво се занимава Nomad Partners?',
                'answer' => 'Nomad Partners е лицензиран посредник по заетостта. Свързваме работодатели с квалифицирани кандидати в страната и в чужбина и подкрепяме целия процес по подбор — от селекцията до започването на работа.',
            ],
            [
                'question' => 'Nomad Partners лицензирана агенция ли е?',
                'answer' => 'Да. Nomad Partners притежава Лиценз №2535, издаден от Министерството на труда и социалната политика. Можете да видите официалното удостоверение на началната ни страница.',
            ],
            [
                'question' => 'Заплащат ли кандидатите такси?',
                'answer' => 'Не. Услугите ни за кандидати са напълно безплатни. Възнаграждението ни се поема от работодателите, с които работим.',
            ],
            [
                'question' => 'За кои индустрии и позиции набирате персонал?',
                'answer' => 'Набираме персонал в широк спектър от сектори, включително производство, логистика, хотелиерство, строителство, ИТ и администрация. Ако имате конкретна позиция предвид, свържете се с нас и ще ви консултираме.',
            ],
            [
                'question' => 'Колко време отнема процесът по подбор?',
                'answer' => 'Сроковете зависят от позицията и изискванията. За повечето позиции представяме подходящи кандидати в рамките на няколко седмици. Международните назначения, свързани с разрешителни за работа, може да отнемат повече време.',
            ],
            [
                'question' => 'Как да започна?',
                'answer' => 'Най-лесно е да се свържете с нас чрез формата на страница Контакт или по телефона. Кажете ни дали сте работодател, или кандидат, и ще ви насочим към следващите стъпки.',
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
