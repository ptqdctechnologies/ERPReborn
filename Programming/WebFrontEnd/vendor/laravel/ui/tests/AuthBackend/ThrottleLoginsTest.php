<?php

namespace Laravel\Ui\Tests\AuthBackend;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Orchestra\Testbench\TestCase;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\MockObject;

class ThrottleLoginsTest extends TestCase
{
    /**
     * @test
     * @dataProvider specialCharacterProvider
     */
    public function it_can_replace_special_characters(string $value, string $expected): void
    {
        $throttle = $this->getMockForTrait(ThrottlesLogins::class);
        $reflection = new \ReflectionClass($throttle);
        $method = $reflection->getMethod('removeSpecialCharacters');
        $method->setAccessible(true);

        $this->assertSame($expected, $method->invoke($throttle, $value));
    }

    public function specialCharacterProvider(): array
    {
        return [
            ['ⓐⓑⓒⓓⓔⓕⓖⓗⓘⓙⓚⓛⓜⓝⓞⓟⓠⓡⓢⓣⓤⓥⓦⓧⓨⓩ', 'abcdefghijklmnopqrstuvwxyz'],
            ['⓪①②③④⑤⑥⑦⑧⑨⑩⑪⑫⑬⑭⑮⑯⑰⑱⑲⑳', '01234567891011121314151617181920'],
            ['⓵⓶⓷⓸⓹⓺⓻⓼⓽⓾', '12345678910'],
            ['⓿⓫⓬⓭⓮⓯⓰⓱⓲⓳⓴', '011121314151617181920'],
            ['abcdefghijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyz'],
            ['0123456789', '0123456789'],
        ];
    }

    /**
     * @test
     * @dataProvider emailProvider
     */
    public function it_can_generate_throttle_key(string $email, string $expectedEmail): void
    {
        $throttle = $this->getMockForTrait(ThrottlesLogins::class, [], '', true, true, true, ['username']);
        $throttle->method('username')->willReturn('email');
        $reflection = new \ReflectionClass($throttle);
        $method = $reflection->getMethod('throttleKey');
        $method->setAccessible(true);

        $request = $this->mock(Request::class);
        $request->expects('input')->with('email')->andReturn($email);
        $request->expects('ip')->andReturn('192.168.0.1');

        $this->assertSame($expectedEmail . '|192.168.0.1', $method->invoke($throttle, $request));
    }

    public function emailProvider(): array
    {
        return [
            'lowercase special characters' => ['ⓣⓔⓢⓣ@ⓛⓐⓡⓐⓥⓔⓛ.ⓒⓞⓜ', 'test@laravel.com'],
            'uppercase special characters' => ['ⓉⒺⓈⓉ@ⓁⒶⓇⒶⓋⒺⓁ.ⒸⓄⓂ', 'test@laravel.com'],
            'special character numbers' =>['test⑩⓸③@laravel.com', 'test1043@laravel.com'],
            'default email' => ['test@laravel.com', 'test@laravel.com'],
        ];
    }
}
