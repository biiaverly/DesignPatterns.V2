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


## 2.2- Chain of Responsability

The Chain of Responsibility is a behavioral design pattern that allows an object to pass a request along a chain of potential handlers until one of them handles the request. It decouples the sender of the request from its receivers and allows multiple objects to have a chance to process the request.

In this pattern, each handler in the chain has a reference to the next handler in line. When a request is received, the handler can choose to process it or pass it to the next handler in the chain. This creates a flexible and extensible system where the request can travel through the chain until a suitable handler is found.

**Problem**

Let's say you are building a web application where users can perform various actions, such as viewing data, creating new records, updating existing records, and deleting records. Each action requires a different level of authorization. For example, viewing data might require basic user authentication, while deleting records might require admin-level authorization.

Using the Chain of Responsibility pattern, you can create a chain of authorization handlers, where each handler represents a specific level of authorization. The request is passed through the chain until it reaches a handler that can handle the authorization level required for the action.


**Solution**

    Define the Handler Interface:
        Create an interface called "AuthorizationHandler" that declares a method for handling authorization requests.

    Implement the Concrete Handlers:
        Create concrete classes for each level of authorization, such as "BasicAuthorizationHandler", "AdminAuthorizationHandler", etc.
        Each handler should implement the "AuthorizationHandler" interface and have a reference to the next handler in the chain.

    Configure the Chain:
        Define the order and composition of the authorization handlers in the chain.
        Each handler should have a method to check if it can handle the authorization level required for the request and a method to process the request if authorized.

    Process the Request:
        When a user performs an action, such as deleting a record, pass the request to the first handler in the chain.
        The chain will process the request sequentially until a handler capable of handling the required authorization level is found.


:warning::warning::warning:  **YOU DO** :warning::warning::warning:

You have been tasked with creating a Discount Calculator using the Chain of Responsibility method. The calculator should be able to calculate discounts based on the quantity of items and the total value of a purchase. Specifically, you need to implement the following discount rules:

    If the quantity of items is greater than 500, apply a 5% discount.
    If the total value of the purchase is greater than 500 reais, apply a 1% discount.


 ## 2.3- Template Method

 The Template Method is a behavioral design pattern that defines the skeleton of an algorithm in a base class but delegates some steps of the algorithm to subclasses. It allows subclasses to provide their own implementation for specific steps while keeping the overall structure of the algorithm intact.

The Template Method pattern is useful when you have an algorithm that has a general structure, but certain steps may vary depending on the specific implementation. By encapsulating the shared structure in a base class and defining abstract or hook methods that can be overridden in subclasses, you can provide a template for the algorithm's behavior while allowing flexibility for customization.

**Problem**
ne problem that can be effectively solved using the Template Method pattern is the implementation of different algorithms or processes that share a common structure but have varying steps or behaviors.

Let's consider the example of a data export system. The system needs to export data from different data sources, such as a database, a CSV file, or an API. Each data source requires a specific set of steps to be followed during the export process, but the overall structure of the export algorithm remains the same.

**Soluton**
Using the Template Method pattern, you can create a base class that defines the common structure of the export algorithm, while allowing subclasses to provide their own implementation for specific steps. Here's how it can be implemented:

    Define a base class called "DataExporter" that contains the template method and abstract methods for the specific steps of the export process.

    Implement concrete classes that inherit from "DataExporter" for each data source, such as "DatabaseExporter," "CSVExporter," and "APIExporter."

    In the base class, implement the template method that outlines the overall structure of the export process. This method calls the abstract methods for the specific steps.

    Subclasses override the abstract methods to provide their own implementation of the specific steps required for exporting data from their respective sources. For example, the "DatabaseExporter" subclass would implement methods to connect to the database, retrieve the data, and save it to a file.



:warning::warning::warning:  **YOU DO** :warning::warning::warning:

Create an abstract class called "Taxed2Aliquotadas" that determines whether to apply the maximum or minimum tax rate based on the budget. Additionally, create two different tax classes that extend this abstract class and implement the respective methods for each tax.

In this scenario, we have an abstract class called "Taxed2Aliquotadas" that serves as a template for determining the tax rate to be applied. This class will have two methods, "applyMaxTaxRate" and "applyMinTaxRate," which will be implemented by its subclasses.

The two subclasses, let's call them "TaxA" and "TaxB," will provide their own specific implementations of the tax calculation methods based on their unique tax rules.

By using this design, you can create multiple tax classes that inherit from the "Taxed2Aliquotadas" abstract class. Each subclass will implement the appropriate methods for calculating taxes according to their specific rules. This approach ensures code reuse, allows for easy addition of new tax classes, and promotes a clear separation of concerns between the abstract tax determination logic and the implementation details of each tax subclass.

 ## 2.4- State

The State design pattern is a behavioral design pattern that allows an object to alter its behavior when its internal state changes. It enables an object to appear as if it has changed its class, as its behavior can vary based on its internal state.

In the State pattern, the behavior of an object is encapsulated in separate state objects that implement a common interface. These state objects represent different states of the object, and they handle the object's behavior based on their specific state. The object maintains a reference to the current state object and delegates the behavior to that state object.


**Problem**
Let's consider an example where you have an Order entity in an e-commerce application, and the order can be in different states such as "Pending", "Processing", "Shipped", and "Delivered". Each state has its own set of actions and behavior associated with it.


**Solution**


    Define a State interface: Create an interface, let's call it "OrderState", that declares methods representing the actions or behaviors associated with each state, such as "confirmOrder," "processPayment," "shipOrder," and so on.

    Implement Concrete State classes: Create concrete classes that implement the "OrderState" interface, representing each state of the order, such as "PendingState," "ProcessingState," "ShippedState," and "DeliveredState". Each class will provide its own implementation of the methods declared in the interface.

    Implement the Context class: Create a class called "Order" that represents the context or entity, such as an Order object in our example. The Order class should maintain a reference to the current state object and delegate method calls to that state object.

    Define state transitions: In the Order class, define methods for transitioning between states. For example, you could have methods like "transitionToProcessingState," "transitionToShippedState," etc. These methods will update the current state object reference based on the state transition rules.

    Use the State pattern in Laravel: In your Laravel application, you can utilize the State pattern by implementing the State interface and the concrete state classes within your Order entity. This allows you to encapsulate the behavior associated with each state and manage the state transitions within the Order entity.

:warning::warning::warning:  **YOU DO** :warning::warning::warning:


Implement a state-based discount system for a budget management application in Laravel. The budget can be in one of four states: "aprovacao" (approval), "aprovado" (approved), "reprovado" (disapproved), or "finalizado" (finalized). Each state allows for a specific discount to be applied.


 ## 2.5- Command
"Command" refers to a behavioral pattern that aims to encapsulate a request as an object, allowing you to parameterize clients with different requests, queue or log requests, and support undo operations.

The Command pattern is based on the principle that all requests are encapsulated as objects, known as commands. These commands have a common interface that defines a method, for example, execute(), which is invoked to perform the action associated with the command.

**Problem**
One problem that can be effectively addressed with the Command design pattern is the implementation of a menu or toolbar system in a graphical user interface (GUI) application.

In such an application, you may have various menu items or buttons that trigger different actions when clicked. Instead of directly coupling the UI components with the specific actions they perform, the Command pattern can be employed to decouple the invoker (UI component) from the receiver (action execution).

**Solution**

    Define the Command interface: Create an interface that declares the common methods for executing the command, such as execute().

    Implement concrete Command classes: Create concrete classes that implement the Command interface for each specific action you want to associate with a UI component. Each concrete command should encapsulate the necessary logic to execute the corresponding action.

    Create invoker objects: Implement the UI components (e.g., menu items, buttons) that will invoke the commands. These invoker objects should have a reference to a Command object and call its execute() method when triggered.

    Set up the associations: Associate the appropriate Command objects with the corresponding UI components. This can be done during the initialization of the application or dynamically at runtime.

    Handle user interaction: When a UI component is interacted with (e.g., clicked), the associated Command object's execute() method should be invoked by the invoker.

:warning::warning::warning:  **YOU DO** :warning::warning::warning:

Develop a system that utilizes the Command pattern to generate customized orders. Each order should be created based on the customer's name, item value, and quantity provided as input to the Command. The system should encapsulate this information in a Command object, which will be responsible for creating the order based on the given parameters.


