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
            'alienKilledTotal' => $this->faker->optional()->passthrough(mt_rand(0, 10000)),
            'bulletsFired' => $this->faker->optional()->passthrough(mt_rand(50, 1000)),
            'deadsPlayer' => $this->faker->optional()->passthrough(mt_rand(5, 15)),
            'level' => $this->faker->optional()->passthrough(mt_rand(1, 5)),
            'highestScore' => $this->faker->optional()->passthrough(mt_rand(0, 10000)),
            'globalPrecision' => $this->faker->optional()->passthrough(mt_rand(5, 100)),
            'timePlayedTotal' => $this->faker->optional()->passthrough(mt_rand(1000, 10000)),
            'sessionTotal' => $this->faker->optional()->passthrough(mt_rand(0, 50)),
            'userName' => $this->faker->name(),
            'gameDataTime' => $this->faker->paragraph(5),
            'gameVersion' => '0.1-alpha'
        ];
    }
}
