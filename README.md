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


:warning::warning::warning:  **YOU DO** :warning::warning::warning:
