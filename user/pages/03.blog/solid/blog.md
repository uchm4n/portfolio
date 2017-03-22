---
title: 'S.O.L.I.D: Design Principles'
date: '16:01 03/20/2017'
taxonomy:
    category:
        - blog
    tag:
        - SOLID
        - 'Design Patterns'
---

**S.O.L.I.D** is an acronym for the first five object-oriented design(OOD) principles by Robert C. Martin, popularly known as Uncle Bob.
SOLID represents a series of guidelines that developers can use to, if done well, simplify and clarify their code. 
These principles, when combined together, make it easy for a programmer to develop software that are easy to 
maintain and extend. They also make it easy for developers to avoid code smells, 
easily refactor code, and are also a part of the agile or adaptive software development.
Understanding these concepts will make you a better developer.

> **Note:** This article is just my notes, which I gathered from various posts and bundled it all together.

**S.O.L.I.D** STANDS FOR:             
When expanded the acronyms might seem complicated, but they are pretty simple to grasp.

* **[S](#single-responsiblity-principle)** – Single-responsiblity principle
* **[O](#open-closed-principle)** – Open-closed principle
* **[L](#liskov-substitution-principle)** – Liskov substitution principle
* **[I](#interface-segregation-principle)** – Interface segregation principle
* **[D](#dependency-inversion-principle)** – Dependency Inversion Principle

Let’s look at each principle individually to understand why S.O.L.I.D can help make us better developers.


##Single-responsiblity principle
---

> #### A class should have only one reason to change.

For example:

```php
<?php

// Lets examine following code.
// code is violating Single Responsibility Principle.
// Because one Reporter class is implementing many different functions which is not related to each other

class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }
    public function getDate()
    {
        return date('Y/m/d');
    }
    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
    public function formatJson()
    {
        return json_encode($this->getContents());
    }
}

// Now Reformat this code.
// Above class Report is doing many things for example formatJson
// Why should Report class format code? It's responsibility is to report data
// to fetch from db or api and represent it, or do something db specific interactions.
// So that's why we make separate interface, ReportFormattable.
// This way we are sure that, who ever implements this interface it should implement format method too.
// now every class has it's own responsibility

class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }
    public function getDate()
    {
        return date('Y/m/d');
    }
    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

// Note that we inject Report class here
interface ReportFormattable
{
    public function format(Report $report);
}


// Here we implement ReportFormattable interface format function
class JsonReportFormatter implements ReportFormattable
{
    public function format(Report $report)
    {
        return json_encode($report->getContents());
    }
}
```

###Open-Closed principle
-----

In object-oriented programming, the open/closed principle states 
> #### "software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification"     

that is, such an entity can allow its behaviour to be extended without modifying its source code.
This simply means that a class should be easily extendable without modifying the class itself. 
Let’s take a look an example:

```php
<?php

// Open Closed Principle Violation
class Programmer
{
    public function code()
    {
        return 'coding';
    }
}

class Tester
{
    public function test()
    {
        return 'testing';
    }
}

// This class was open for modification.If you think what about it not a big deal but 
// when you have to add other class for example Client you should check this 
// inside this function: elseif ($member instanceof Class)
// this quickly gets muddy and leads to code rot. So a solution is open/close principle
class ProjectManagement
{
    public function process($member)
    {
        if ($member instanceof Programmer) {
            $member->code();
        } elseif ($member instanceof Tester) {
            $member->test();
        };
        throw new Exception('Invalid input member');
    }
}



// Refactored
// Now here we separate extensible behavior behind an interface 
interface Workable
{
    public function work();
}
class Programmer implements Workable
{
    public function work()
    {
        return 'coding';
    }
}
class Tester implements Workable
{
    public function work()
    {
        return 'testing';
    }
}

// Here we flip the dependencies
class ProjectManagement
{
    public function process(Workable $member)
    {
        return $member->work();
    }
}

```


###Liskov substitution principle
---

> #### Functions that use pointers or references to base classes must be able to use objects of derived classes without knowing it.

In mathematics, a Square is a Rectangle. Indeed it is a specialization of a rectangle. 
The "is a" makes you want to model this with inheritance. However if in code you made Square derive from Rectangle, 
then a Square should be usable anywhere you expect a Rectangle. This makes for some strange behavior.

Imagine you had SetWidth and SetHeight methods on your Rectangle base class; this seems perfectly logical. 
However if your Rectangle reference pointed to a Square, then SetWidth and SetHeight doesn't make sense because 
setting one would change the other to match it. 
In this case Square fails the Liskov Substitution Test with Rectangle and the abstraction of having Square inherit 
from Rectangle is a bad one.


```php

<?php
// Liskov Substitution Principle Violation
// The Rectangle - Square problem
class Rectangle
{
    protected $width;
    protected $height;
    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function setWidth($width)
    {
        $this->width = $width;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function area()
    {
         return $this->height * $this->width;
    }
}
class Square extends Rectangle
{
    public function setHeight($value)
    {
        $this->width = $value;
        $this->height = $value;
    }
    public function setWidth($value)
    {
        $this->width = $value;
        $this->height = $value;
    }
}
class RectangleTest
{
    private $rectangle;
    public function __construct(Rectangle $rectangle)
    {
        $this->rectangle = $rectangle;
    }
    public function testArea()
    {
        $this->rectangle->setHeight(2);
        $this->rectangle->setWidth(3);
        // Expect rectangle's area to be 6
    }
}

```

##### Conclusion
This principle is just an extension of the Open Close Principle and it means that we must make sure that new derived classes are extending the base classes without changing their behavior.




###Interface segregation principle
---

The Interface Segregation Principle states that a client should never be forced to implement an interface that it doesn’t use.



```php

<?php

// Interface Segregation Principle Violation
// Here we cave interface which require code and test methods
interface Workable
{
    public function code();
    public function test();
}

// In case of programmer is good to implement this interface
class Programmer implements Workable
{
    public function canCode()
    {
        return true;
    }
    public function code()
    {
        return 'coding';
    }
    public function test()
    {
        return 'testing in localhost';
    }
}

// But when Tester uses this interface here are problem
// Tester can't code so that's why this principle is violated
class Tester implements Workable
{
    public function canCode()
    {
        return false;
    }
    public function code()
    {
         throw new Exception('Opps! I can not code'); // Here
    }
    public function test()
    {
        return 'testing in test server';
    }
}

class ProjectManagement
{
    public function processCode(Workable $member)
    {
        if ($member->canCode()) {
            $member->code();
        }
    }
}

// Now refactor our implementation
// We need to separate previous interface with 2 separate interfaces
// Codeable and Testable
interface Codeable
{
    public function code();
}
interface Testable
{
    public function test();
}

// And then Programmer can pick an interface
class Programmer implements Codeable, Testable
{
    public function code()
    {
        return 'coding';
    }
    public function test()
    {
        return 'testing in localhost';
    }
}

// And Tester class will have one interface
class Tester implements Testable
{
    public function test()
    {
        return 'testing in test server';
    }
}

class ProjectManagement
{
    public function processCode(Codeable $member)
    {
        $member->code();
    }
}


```


###Dependency Inversion Principle
---


> - High-level modules should not depend on low-level modules. Both should depend on abstractions.
> - Abstractions should not depend upon details. Details should depend upon abstractions.


> ##### NOTE: Dependency inversion does note equal Dependency injection

```php

<?php

// Dependency Inversion Principle Violation
class Mailer {}

class SendWelcomeMessage
{
    private $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}


// Refactored
// This is main interface which is "high level module" 
interface Mailer
{
    public function send();
}

// This class is considered low level, bocause it's too specific
class SmtpMailer implements Mailer
{
    public function send()
    {
    }
}

// This class too
class SendGridMailer implements Mailer
{
    public function send()
    {
    }
}

class SendWelcomeMessage
{
    private $mailer;
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

```
