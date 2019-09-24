<?php
$arrayTemplates = [
    [
        // Это ID тематики
        'intent_id' => 23,
        'templates' => [
            // Это ID шаблонной фразы
            '11' => '(привет|добрый день) [*] могу-ли я заказать # роутеров с доставкой [прямо] домой',
            '12' => 'мне нужно заказать доставку на # (мая|апреля)',
            '13' => 'вам [будет] удобно принять доставку [в] [#]',
            '14' => 'вы ознакомились с [отправленным] (видео|буклетом|памяткой) для продолжения опроса по номеру #',
            '15' => 'В (июне|июле|августе) [_] (покупает|покупают) [*] на море',
            '16' => 'нажмите на (кнопку|клавишу) # для перехода в [_] раздел',
            '17' => '[#] числа вы воспользовались [#] [*] расширенной *',
        ]
    ],
    [
        'intent_id' => 43,
        'templates' => [
            '44' => '[*] (мне нужен|хочу найти) билет на самолёт'
        ]
    ],
    [
        'intent_id' => 15,
        'templates' => [
            '55' => '[*] (помогите|как мне) заказать пиццу [с доставкой] [*]'
        ]
    ],
];

function mes($object)
{
    print_r('<pre>');
    var_dump($object);
    print_r('</pre>');
}

function recognize(string $phrase, array $arrayTemplates = null)
{
    $res = [];

    if (empty($arrayTemplates)) {
        return $res;
    }

    mes(mb_strtoupper($phrase));

    foreach ($arrayTemplates as $thematics) {
        foreach ($thematics['templates'] as $key => $values) {
            $match = '/^' . mb_strtoupper ($values) . '/';

            //заменяем в шаблоне спец символы
            $match = str_replace("_", "(\W*){1}", $match);
            $match = str_replace("*", "(.*)", $match);
            $match = str_replace("[", "(", $match);
            $match = str_replace(["]", "] "], ")?", $match);
            $match = str_replace("#", "[\d]*", $match);
            $match = str_replace("? ", "?[\s]*", $match);

            mes($match);

            if (preg_match($match, mb_strtoupper ($phrase))) {
                $res['intent_id'] = $thematics['intent_id'];
                $res['template_id'] = $key;
                break 2;
            }
        }
    }

    return $res;
}


mes('Start test');
mes(recognize('3 числа вы воспользовались 21 расширенной системой', $arrayTemplates));
mes(recognize('9 числа вы воспользовались 2 значительно улучшенной чем в предыдущие разы версией расширенной программы', $arrayTemplates));
mes(recognize('вы ознакомились с отправленным буклетом для продолжения опроса по номеру 52897895278', $arrayTemplates));
