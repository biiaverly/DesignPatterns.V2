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



