# event-dispatcher-slim!
In this light slim app, I demonstrate how to use an event dispatcher with a DI in a PHP Slim app. 

# Global thinking
In clean architecture, your app contains business domains, dependencies should be defined by explicit boundaries between them.
Event dispatcher permits to domains to trigger events from one domain to others (mediator and observer pattern).
Doing this way, sub domains become modules that you will can transform from monolith module to micro service very easy.

Abstraction is another important thing in clean architecture because it is based on Dependancy inversion. To do it, we use the Dependancy Injection, classes don't depend to concret classes this way, they only use interfaces (contracts).

# Event Dispatcher

To respect the PSR-14, see app/src/domain/Abstraction/Event
Here I created objects based on interfaces of PSR-14

## Event

Used to trigger, in some implementations, like Symfony, event are identified by string like "user.creation", here each event MUST be an object.

You can find one in app/src/domain/Notification/User/Listeners/UserCreatedListener.php

## Listener provider

Responsible of listeners list, this object is a part of the Event Dispatcher, he is responsibles of listeners collection actions like "add", "remove", "filter by event type".

He is used in the file app/src/boostrap/listeners.php to register  listeners in the event dispatcher

## Event dispatcher

This object has be unique (maybe singleton ?) this one registers listeners and is used by others objects to dispatch events. He is registred in PHP DI in the file app/src/boostrap/listeners.php


# DI

In this app example, we use PHP DI with Slim, that's the container variable in public/index.php

## Use interfaces !

The goal is to abstract the logic, the domain code shouldn't be dependant to infrastructure code, which is the technical details.
To do so, interfaces defined in the domain logic, will be linked to class implementations in the service container.
Most of them should be autowired automaticaly, but you will have to do it manualy if an interface is used by several classes.

## Autoload in Controllers

DI permits to your controller constructor to load services by using domain interfaces so use it for services and usecases.

## Who should handle the event dispatcher ?

DI will gives you the event dispatcher, some developers gives it to useCase like in this example (because the event dispatcher is store in the domain) but some handle it in the presenter of the useCase. As usual with concepts, use it according to your teams and methods
