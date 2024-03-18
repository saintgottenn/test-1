<?php

use PHPUnit\Framework\TestCase;

require_once "index.php";

class StringReverserTest extends TestCase
{
    public function testReverseStringWithDetails()
    {
        $this->assertEquals('Tac', reverseStringWithDetails('Cat'));
        $this->assertEquals('Ьшым', reverseStringWithDetails('Мышь'));
        $this->assertEquals('esuOh', reverseStringWithDetails('houSe'));
        $this->assertEquals('кимОД', reverseStringWithDetails('домИК'));
        $this->assertEquals('tnAhPele', reverseStringWithDetails('elEpHant'));
        $this->assertEquals('driht-ytrap', reverseStringWithDetails('third-party'));
        $this->assertEquals("nac't", reverseStringWithDetails("can't"));
        $this->assertEquals('tac,', reverseStringWithDetails('cat,'));
        $this->assertEquals('Амиз:', reverseStringWithDetails('Зима:'));
        $this->assertEquals("si 'dloc' won", reverseStringWithDetails("is 'cold' now"));
        $this->assertEquals('отэ «Так» "отсорп"', reverseStringWithDetails('это «Так» "просто"'));
    }
}