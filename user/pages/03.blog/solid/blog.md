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
* **L** – Liskov substitution principle
* **I** – Interface segregation principle
* **D** – Dependency Inversion Principle

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
> ### "software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification";
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
class ProjectManagement
{
    public function process(Workable $member)
    {
        return $member->work();
    }
}

```







