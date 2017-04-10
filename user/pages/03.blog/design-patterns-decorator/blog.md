---
title: 'Design Patterns: Decorator Pattern'
date: '16:01 03/20/2017'
taxonomy:
    category:
        - blog
    tag:
        - 'Design Patterns'
        - Decorator
---

A decorator allows us to dynamically extend the behavior of a particular 
object at runtime, without needing to inheritance whole class with it's methods.
For example:

```php
<?php


interface CarService{
    //This is the method which every class should implement
    public function getCost();
}

class BasicInspection implements CarService{
    public function getCost(){
        return 25;
    }
}

class OilChange implements CarService{
    protected $carService;
    
    //We inject interface here, than after wrapping BasicInspection class
    //We will inherit that functionality + OilChange functionality 
    public function __construct(CarService $carService) {
        $this->carService = $carService;
    }
    
    public function getCost(){
        return 29 + $this->carService->getCost();
    }
}

class TireRotation implements CarService{
    protected $carService;
    
    //We inject interface here, than after wrapping BasicInspection class
    //We will inherit that functionality + OilChange functionality 
    public function __construct(CarService $carService) {
        $this->carService = $carService;
    }
    
    public function getCost(){
        return 15 + $this->carService->getCost();
    }
}



echo (new OilChange(new BasicInspection))->getCost(); // 29 + 25 = 54
echo (new TireRotation((new OilChange(new BasicInspection))))->getCost(); // 29 + 25 + 15 = 69
echo (new TireRotation(new BasicInspection))->getCost(); // 15 + 25 = 40













```



