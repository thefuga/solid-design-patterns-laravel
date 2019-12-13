# SOLID design patterns
> Design is the art of arranging code that needs to work today, and to be easy to change forever.
> @Sandi Metz

## Single Responsibility Principle [🔗](https://github.com/thefuga/solid-design-patterns-laravel/tree/master/srp)
> A class has a single responsibility: it does it all, does it well, and does it only.
- A class should have only one reason to change (it's single responsibility should be the only reason to change).
- If a class have only one responsibility it is much more likely to be reused.
- Decorators can help adding functionality without breaking SRP.
- It's much easier to test SRP classes. The scope is clear and you can ignore everything else (stubbing or mocking).
- TDD can help with good design. If it's hard to test, it's an indication that it might be a cleaner design.
- Classes with one responsibility are easier to change.
- Highly cohesive classes likely follow SRP and vice-versa.
- Not all principles/guidelines can be applied globally all the time. Too much time will be wasted rearranging things.
- Tell Don't Ask Vs. Single Responsibility: it's best to ignore tell don't ask in views to keep classes' single responsibility.
- Most of the time it's easier to follow tell don't ask if SRP is followed.
- Following the law of Demeter may help in SRP. LoD states that any method of an object should only call methods belonging to:
    - Itself;
    - Parameters passed to the method;
    - Objects it created;
    - Composite objects.
  Method calls should not be chained to object returned by any of the allowed method calls returns.

### Useful patterns:
- **[Facade Pattern](wiki.c2.com/?FacadePattern):** may help when there's too many small classes. Will hide the complexity and maintain focus on the interface.
- **[Decorator Pattern](http://wiki.c2.com/?DecoratorPattern):** extends a class functionality without bloating it with concrete implementations. Also favors composition over inheritance.
- **[Visitor Pattern](http://wiki.c2.com/?VisitorPattern):** by accepting a visitor, a class may perform an operation without have any external knowledge of it.

### References
- http://www.bradapp.net/docs/demeter-intro.html
- http://wiki.c2.com/?SingleResponsibilityPrinciple
- http://wiki.c2.com/?PrinciplesOfObjectOrientedDesign
- https://pragprog.com/articles/tell-dont-ask
- https://thoughtbot.com/upcase/videos/single-responsibility-principle

## Open/Closed Principle [🔗](https://github.com/thefuga/solid-design-patterns-laravel/tree/master/ocp)
> Software entities (classes, modules, functions, etc.) should be **open** for extension, but **closed** for modification
- The key to keep OCP is dependency injection and polymorphism.
- Trying to keep it open for everything may introduce _indirection_.
- OCP and SRP are related because OCP gives less reason to change a class. In fact if OCP if followed to the letter, the class has ZERO reasons to change.

### Useful patterns
- **[Decorator pattern](http://wiki.c2.com/?DecoratorPattern):** help OCP by composing the class, wrapping methods to change the behavior.
- **[Chain of responsibility](http://wiki.c2.com/?ChainOfResponsibilityPattern):** allows adding other items to the chain without changing anything.
- **[Factory Method](http://wiki.c2.com/?FactoryMethodPattern):** helps if you don't know what you'll be building until runtime. Instead of changing the class, just run this pattern.

### References
- https://www.oodesign.com/open-close-principle.html
- https://clojure.org/about/functional_programming#Functional
- https://thoughtbot.com/upcase/videos/open-closed-principle

## Liskov Substitution Principle [🔗](https://github.com/thefuga/solid-design-patterns-laravel/tree/master/lsp)
> Let q(x) be a property provable about objects x of type T. Then q(y) should be provable for objects y of type S where S is a subtype of T.

> Subclases should be swapable with their superclass without affecting the callers of the code.

- LSP makes life easier on the callers.

## Interface Segregation Principle [🔗](https://github.com/thefuga/solid-design-patterns-laravel/tree/master/isp)
> Clients should not be force to depend on methods that they do not use.

- Somehow relates to YAGNI.

## Dependency Inversion Principle [🔗](https://github.com/thefuga/solid-design-patterns-laravel/tree/master/dip)
> high level modules should not depend on low level modules; both should depend on abstractions.
> Abstractions should not depend on details. Details should depend upon abstractions.

> Systems tend to exhibit the DIP as a natural result of using OCP and Liskov.
> @Uncle Bob
- DIP helps TDD. As the control is inverted, mocks can be easily injected, isolating units to be tested.
- DIP makes dependencies explicit.
- Helps follow SRP - code never builds a dependency and uses it.
- Components built upon abstractions are reusable.
- Coupling is lower, dependencies are explicit.
- Injecting dependencies in frameworks are complicated, so design patters can greatly help.
- May lead to indirection, using a class will require more steps than just instantiating it.
- Somewhere all the dependencies must be configured, so isolating too much may easily become a mess in large applications.

### Useful patterns
- **[Abstracy Factory](wiki.c2.com/?AbstractFactoryPattern) and [Factory Method](http://wiki.c2.com/?FactoryMethodPattern):** help building dependencies.
- **[Facade](http://wiki.c2.com/?FacadePattern):** may help isolating frameworks or other low level dependencies by providing a higher level interface.
- **[Adapter](http://wiki.c2.com/?AdapterPattern):** can help converting incompatible interfaces to injected.
- **[Decorator](http://wiki.c2.com/?DecoratorPattern):** can help providing new functionality to a class.

### References
- https://martinfowler.com/articles/dipInTheWild.html
- https://thoughtbot.com/upcase/videos/dependency-inversion-principle
