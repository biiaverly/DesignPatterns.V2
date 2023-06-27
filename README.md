# DesignPatterns.v1
Behavioral pattern in PHP using Laravel.

# 1. Introduction
Behavioral patterns, also known as  ehavioral design patterns, are a set of design  patterns that focus on the  behavior and interaction between objects in a software system. These patterns aim to provide solutions to problems related to how objects communicate and how control flow is managed in a program.

Behavioral patterns are designed to improve flexibility, extensibility, and code reusability by separating responsibilities and promoting loose coupling between objects.</div>

Behavioral patterns, also known as behavioral design patterns, are a set of design patterns that focus on the  behavior and interaction between objects in a software system. These patterns aim to provide solutions to problems related to how objects communicate and how control flow is managed in a program.

Behavioral patterns are designed to improve flexibility, extensibility, and code reusability by separating responsibilities and promoting loose coupling between objects.


# 2. Design Patters
## 2.1- Strategy

The Strategy design pattern is a behavioral pattern that allows you to define a family of algorithms, encapsulate each one, and make them interchangeable. This enables the client to dynamically select the algorithm they want to use, independent of the client code.

In the context of Laravel, the Strategy pattern can be implemented to aid in decision making based on different strategies or algorithms. It allows you to encapsulate different algorithms into separate classes and select the correct strategy at runtime.


**Problem**
Let's say you are building a Laravel system to process files in different formats such as CSV, JSON, and XML. Each format requires a specific algorithm to properly process the data contained in the files.

**Solution**

    Define the Strategy Interface:
        Create the FileProcessor interface that declares the method for file processing.

    Implement Concrete Strategies:
        Create concrete classes such as CsvProcessor, JsonProcessor, and XmlProcessor that implement the FileProcessor interface.
        Implement the specific logic for processing each file format within the respective classes.

    Client Code:
        Receive the file to be processed.
        Determine the file format (e.g., by checking the file extension).
        Instantiate the appropriate strategy based on the file format.

    Strategy Execution:
        Invoke the process() method on the selected strategy, passing the file to be processed.
        The strategy will handle the processing logic for the specific file format.


:warning::warning::warning:  **YOU DO** :warning::warning::warning:

You have been asked to create a Tax Calculator using the Strategy design pattern. The calculator should be able to calculate different taxes based on the value of a budget. Two specific taxes need to be considered: ISS (Service Tax) and ICMS (Tax on Circulation of Goods and Services).

Here are the specifications for each tax:

ISS:
    The ISS tax rate is 6% of the budget value.

ICMS:
    The ICMS tax rate is 10% of the budget value.

You also need to create a class called "Budget" that represents a budget with the quantity of items. This class will be used as input for the tax calculator.

Now, using the Strategy pattern, you should implement the following steps:

    Define the Strategy interface:
        Create an interface called "Tax" that declares the method for calculating the tax.

    Implement the concrete strategies:
        Create two classes, one for each tax: "IssTax" and "IcmsTax".
        Implement the tax calculation logic in each class according to the mentioned specifications.

    Client:
        Create a class called "TaxCalculator" that takes a "Budget" object and a "Tax" object (the strategy).
        The "TaxCalculator" class will invoke the tax calculation method on the "Tax" object, passing the "Budget" as a parameter.

    Usage:
        Create a "Budget" object with the desired value and item quantity.
        Create "IssTax" and "IcmsTax" objects to represent the tax strategies.
        Create a "TaxCalculator" object and pass the "Budget" object and the desired tax strategy.
        Call the tax calculation method on the "TaxCalculator" to obtain the calculated tax value.