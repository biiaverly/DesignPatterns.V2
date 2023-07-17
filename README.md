# DesignPatterns.v2
Structural pattern in PHP using Laravel.

# 1. Introduction
In software engineering and design, a structural pattern is a category of design patterns that focuses on how objects and classes are composed to form larger structures while ensuring flexibility, reusability, and maintainability of the software. Structural patterns are concerned with the relationships between objects, classes, and their composition to create complex systems.

The key goal of structural patterns is to allow the composition of objects or classes in a way that makes it easier to understand, modify, and extend the software system. These patterns help to organize classes and objects in a manner that enables them to work together effectively.


# 2. Design Patters
## 2.1- Adapter

An adapter is a structural design pattern that allows incompatible interfaces of classes to work together. It acts as a bridge between two interfaces, converting the interface of one class into another interface that clients expect. This pattern helps achieve interoperability between classes that otherwise couldn't work together due to their differing interfaces.

In simpler terms, an adapter pattern enables communication between two components by acting as a translator. It enables a class to interact with other classes it couldn't directly communicate with by providing a common interface.

**Analogy**
Imagine you're traveling to a foreign country with different electrical outlets. Your electronic devices, like phone chargers, have plugs designed for your home country's outlets (client code). However, the foreign country's outlets have a different shape (incompatible interface), making it impossible to plug in your devices directly.

In this scenario, a plug adapter serves as an adapter pattern. It bridges the gap between your device's plug (client code) and the foreign outlet (incompatible interface) by providing a standardized interface that fits both. With the adapter, you can seamlessly connect your devices to the foreign outlets and power them up, just as the adapter pattern allows different classes with incompatible interfaces to work together harmoniously.

**Example**
Suppose you are building an e-commerce platform with PHP and Laravel, and you want to integrate two different payment gateways: GatewayA and GatewayB. Each gateway has its own unique methods for processing payments.

    Existing Payment Gateway: GatewayA

GatewayA has methods like processPaymentA($amount, $creditCardData) and refundPaymentA($transactionId). These methods process payments and refunds using GatewayA's system.

    New Payment Gateway: GatewayB

GatewayB has methods like makePaymentB($amount, $cardDetails) and refundB($transId). These methods process payments and refunds using GatewayB's system.

    PaymentGateway Interface:

Create a PaymentGateway interface with common methods like processPayment($amount, $paymentInfo) and refundPayment($transactionId).

    Adapters:

Create adapters for each payment gateway that implement the PaymentGateway interface and internally use the specific methods of the corresponding payment gateways.

    AdapterA for GatewayA:

The AdapterA class will implement the PaymentGateway interface and use GatewayA's methods internally.

    AdapterB for GatewayB:

The AdapterB class will also implement the PaymentGateway interface but use GatewayB's methods internally.

    Client Code:

Your application's client code will interact with the PaymentGateway interface, without knowing the underlying payment gateway. The client code can process payments and refunds through the adapters, which will route the requests to the appropriate payment gateways.

With the adapter pattern, you can seamlessly switch between different payment gateways by just changing the adapter, without modifying the client code. It provides a consistent interface to the client code, regardless of the underlying payment gateway's specific implementation. This flexibility makes it easier to add new payment gateways or replace existing ones in your e-commerce platform without disrupting the rest of the application.


# :warning:  **YOU DO**

## Integrating HTTP Adapters

**Objective:**
The objective of this example is to demonstrate the implementation of the Adapter design pattern to integrate different HTTP adapters into a system for registering finalized budgets. We have two HTTP adapters: `CurlAdapter` and `ReactAdapter`, which implement the `HttpAdapterInterface`. The `RegistraOrcamento` class depends on the `HttpAdapterInterface` and can use any adapter to register finalized budgets.

**Classes and Interfaces:**

1. `HttpAdapterInterface` - Interface representing the HTTP adapter contract with a `post()` method.
2. `CurlAdapter` - Class implementing `HttpAdapterInterface` using cURL to perform HTTP POST requests.
3. `ReactAdapter` - Class implementing `HttpAdapterInterface` using ReactPHP to perform HTTP POST requests.
4. `Finalizado` - Class representing the finalized state of a budget.
5. `Orcamento` - Class representing budget information.
6. `RegistraOrcamento` - Class responsible for registering finalized budgets using any HTTP adapter.

**Steps:**

1. Create the `HttpAdapterInterface` with a `post()` method to handle HTTP POST requests.
2. Implement the `CurlAdapter` and `ReactAdapter` classes, both of which implement the `HttpAdapterInterface`, to perform HTTP POST requests using cURL and ReactPHP, respectively.
3. The `RegistraOrcamento` class should depend on the `HttpAdapterInterface` to register finalized budgets by making an HTTP POST request to the API.
4. The `RegistraOrcamento` class checks if the budget is finalized before registering it. If not finalized, it throws a `DomainException`.
5. The `RegistraOrcamento` class can work with any HTTP adapter that implements the `HttpAdapterInterface`.


## 2.2- Bridge
Bridge pattern is a structural pattern that decouples an abstraction from its implementation, allowing them to vary independently. It aims to solve the problem of having a multitude of class combinations when dealing with multiple dimensions of variations.

The Bridge pattern is useful when you have two orthogonal hierarchies (abstraction and implementation) that need to be extended independently. It promotes flexibility and maintainability by avoiding class explosion, where you would need to create a large number of subclasses to cover all combinations of variations.

Key components of the Bridge pattern:

    Abstraction: This represents the high-level abstraction, defining the interface and maintaining a reference to the implementation. It doesn't implement the functionality itself but delegates it to the implementation.

    Refined Abstraction: This is a subclass of the abstraction, providing additional features on top of the basic interface defined by the abstraction.

    Implementation: This represents the low-level implementation, defining the interface for specific operations.

    Concrete Implementation: These are subclasses of the implementation, providing different concrete implementations for the operations.

The Bridge pattern promotes the "prefer composition over inheritance" principle, allowing you to change or extend the implementation without affecting the abstraction or vice versa. It provides a more flexible and adaptable design for complex systems with multiple dimensions of variations.

**Example**
Imagine you are developing a remote control system for various electronic devices like TVs, DVD players, and audio systems. Each device has its own unique features and functions. Additionally, you want the remote control to work with different communication protocols, such as Infrared (IR) and Bluetooth.

In this scenario, you can apply the Bridge pattern to create a flexible and extensible remote control system:

    Abstraction: RemoteControl

The RemoteControl class represents the high-level abstraction of a remote control. It defines the common methods that any remote control should have, such as turnOn, turnOff, volumeUp, and volumeDown.

    Refined Abstraction: TVRemote, DVDRemote, AudioRemote

These are subclasses of the RemoteControl class, representing specific remote controls for different electronic devices. Each Refined Abstraction adds additional features tailored to the corresponding device. For example, the TVRemote may have methods like changeChannel and adjustBrightness, while the DVDRemote may have methods like play, pause, and fastForward.

    Implementation: CommunicationProtocol

The CommunicationProtocol interface represents the low-level implementation of communication protocols. It defines the basic methods for communication, such as sendCommand and receiveData.

    Concrete Implementations: IRProtocol, BluetoothProtocol

These are subclasses of the CommunicationProtocol interface, providing specific implementations for different communication protocols. The IRProtocol may send and receive commands using infrared signals, while the BluetoothProtocol may use Bluetooth technology for communication.

By using the Bridge pattern, you can create a remote control system that allows you to add new devices (TVs, DVD players, audio systems) and communication protocols (IR, Bluetooth) independently. The RemoteControl hierarchy focuses on device-specific features, while the CommunicationProtocol hierarchy focuses on communication details. This separation enables you to mix and match different devices with different communication protocols, achieving a more flexible and modular design for your remote control system.

# :warning:  **YOU DO**
##  Exporting Reports

**Objective:**
The objective of this example is to demonstrate the implementation of the Bridge design pattern to export reports in different formats. We will use the Bridge pattern to decouple the abstraction (report content) from the implementation (file export format). The system should be able to export reports in XML and ZIP formats without modifying the existing report classes.

**Classes and Interfaces:**

1. `ConteudoExportado` (ContentExported) - Interface representing the content to be exported in the report.
2. `ArquivoExportado` (FileExported) - Interface representing the file export implementation.
3. `Orcamento` (Budget) - Class representing the information of a budget.
4. `Pedido` (Order) - Class representing the information of an order.
5. `OrcamentoRelatorio` (BudgetReport) - Class implementing `ConteudoExportado` for exporting budget information.
6. `PedidoRelatorio` (OrderReport) - Class implementing `ConteudoExportado` for exporting order information.
7. `ExportarXml` (ExportXml) - Class implementing `ArquivoExportado` to export content in XML format.
8. `ExportarZip` (ExportZip) - Class implementing `ArquivoExportado` to export content in ZIP format.

**Steps:**
1. Create the `ConteudoExportado` interface with a method `conteudo()` that returns an array representing the content to be exported.
2. Implement the `OrcamentoRelatorio` and `PedidoRelatorio` classes, which implement the `ConteudoExportado` interface, to represent budget and order reports, respectively.
3. Create the `ArquivoExportado` interface with a method `salvar(ConteudoExportado $conteudoExportado)` that takes a `ConteudoExportado` object and returns the file path where the report is saved.
4. Implement the `ExportarXml` and `ExportarZip` classes, which implement the `ArquivoExportado` interface, to export content in XML and ZIP formats, respectively.
5. The `OrcamentoRelatorio` and `PedidoRelatorio` classes should contain a reference to an `ArquivoExportado` object to handle the file export.


![Alt text](resources/img/Bridge.jpg?raw=true "Title")
## 2.3- Adapter

## 2.4- Composite

## 2.5- Decorator

