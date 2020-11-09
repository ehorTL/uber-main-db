<?php

use App\Models\Car\CarClass;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classNames = $this->getCarClassesData();
        foreach ($classNames as $className) {
            $c = new CarClass([
                'class_name' => $className
            ]);
            $c->save();
        }
    }

    private function getCarClassesData()
    {
        return [
            "A",
            "B",
            "C",
            "D",
            "E",
            "F",
        ];
    }
}
