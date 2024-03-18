<?php
function reverseStringWithDetails($str) {
    $reversed = '';
    $word = '';
    $length = mb_strlen($str);
    
    for ($i = 0; $i < $length; $i++) {
        $char = mb_substr($str, $i, 1);
        if (ctype_alpha($char)) { // Проверяем, является ли символ буквенным
            $word .= $char; // Строим слово
        } else {
            if ($word !== '') { // Если слово существует, переворачиваем его
                $reversedWord = '';
                $wordLength = mb_strlen($word);
                for ($j = 0; $j < $wordLength; $j++) {
                    // Сохраняем регистр исходного символа для перевернутого
                    $reversedChar = mb_substr($word, $wordLength - $j - 1, 1);
                    $reversedWord .= ctype_upper(mb_substr($word, $j, 1)) ? mb_strtoupper($reversedChar) : mb_strtolower($reversedChar);
                }
                $reversed .= $reversedWord;
                $word = ''; // Сброс текущего слова
            }
            $reversed .= $char; // Добавляем не-буквенный символ к результату
        }
    }
    
    if ($word !== '') { // Обрабатываем оставшееся слово, если оно есть
        $reversedWord = '';
        $wordLength = mb_strlen($word);
        for ($j = 0; $j < $wordLength; $j++) {
            $reversedChar = mb_substr($word, $wordLength - $j - 1, 1);
            $reversedWord .= ctype_upper(mb_substr($word, $j, 1)) ? mb_strtoupper($reversedChar) : mb_strtolower($reversedChar);
        }
        $reversed .= $reversedWord;
    }
    
    return $reversed;
}

function testReverseWordsWithCases() {
    $tests = [
        'Cat' => 'Tac',
        'Мышь' => 'Ьшым',
        'houSe' => 'esuOh',
        'домИК' => 'кимОД',
        'elEpHant' => 'tnAhPele',
        'cat,' => 'tac,',
        'Зима:' => 'Амиз:',
        "is 'cold' now" => "si 'dloc' won",
        'это «Так» "просто"' => 'отэ «Так» "отсорп"',
        'third-part' => 'driht-trap',
        'can`t' => 'nac`t'
    ];

    foreach ($tests as $input => $expected) {
        $result = reverseStringWithDetails($input);
        assert($expected === $result, "Expected '$expected' for '$input', got '$result'");
    }

    echo "All tests passed!\n";
}

testReverseWordsWithCases();