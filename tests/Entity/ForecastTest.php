<?php
namespace App\Tests\Entity;
use App\Entity\Forecast;
use PHPUnit\Framework\TestCase;
class ForecastTest extends TestCase
{
    /**
     * @dataProvider dataGetFahrenheit
     */
    public function testGetFahrenheit($celsius, $expectedFahrenheit): void
    {
        $forecast = new Forecast();
        $forecast->setTemperature($celsius);
        $this->assertEquals($expectedFahrenheit, $forecast->getFahrenheit());
    }
    public function dataGetFahrenheit(): array
    {
        return [
            ['0', 32],
            ['-100', -148],
            ['100', 212],
            ['0.5', 32.9],
            ['-50.7', -59.26],
            ['25.3', 77.54],
            ['-10.2', 13.64],
            ['43.8', 110.84],
            ['-75.5', -103.9],
            ['88.6', 191.48]
        ];
    }
}
