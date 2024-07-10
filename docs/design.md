# Design decisions

1. AlphaVantage module is fully encapsulated from Laravel framework so in future it can become a separate composer package.
2. Use decorators pattern as the main extensions approach for AlphaVantage & AlphaVantage repository (see. AlphaVantageServiceProvider).
3. Laravel specific code for AlphaVantage module is implemented as kind of Adapter via AlphaVantage interfaces.
