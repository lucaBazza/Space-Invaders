<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        /*
        this.alienKilledTotal = 0;
        this.bulletsFired = 0;
        this.deadsPlayer = 0;
        this.level = 1;
        this.highestScore = 0;
        this.globalPrecision = 0f;
        this.timePlayedTotal = 0f;
        this.sessionTotal = 1;
        this.userName = "";

        // Versioning
        this.gameDataTime = DateTime.Now.ToString("yyyy-MM-dd h:mm:ss");
        this.gameVersion = "";
        */

        return [
            'uuid' => $this->faker->uuid(),
            'alienKilledTotal' => $this->faker->numberBetween(0, 10000),
            'bulletsFired' => $this->faker->numberBetween(50, 1000),
            'deadsPlayer' => $this->faker->numberBetween(5, 15),
            'level' => $this->faker->numberBetween(1, 5),
            'highestScore' => $this->faker->numberBetween(0, 10000),
            'globalPrecision' => $this->faker->numberBetween(5, 100),
            'timePlayedTotal' => $this->faker->numberBetween(1000, 10000),
            'sessionTotal' => $this->faker->numberBetween(0, 50),
            'userName' => $this->faker->name(),
            'gameDataTime' => $this->faker->paragraph(5),
            'gameVersion' => '0.1-alpha'
        ];
    }
}
