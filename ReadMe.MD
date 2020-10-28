1. Implementation proposal documented

As far as production ready implementation is concerned there are a couple of things I would like to address that are not currently implemented in this solution.

First of all you will notice that there is no validation of Request parameters and headers. 
This is the first thing to be added since we do not want to go forward if the request is not valid.
This could be done in several ways. 
I would probably implement Abstract controller that would handle this sort of thing. 
Abstract controller would be quite simple. 
It would hold queryString params, and payload params and it would be responsible to call validation methods from ValidatorUtil class.
There would exist a ControllerListener that would listen to Symfony\Component\HttpKernel\Event\ControllerEvent,
 and it would be aware of Serializer and Validator.
It would also get the current Controller from the event and set queryString and paylod parameters 
if the validation is ok.
Controller should remain as thin as possible.


Controller should only invoke UseCase service class, that would actually be aware and handle Domain logic code.
This way we are decoupling our domain logic from Application(Framework) logic, which would help us with testing the code and future changes/updates to the code.
UseCase would create Request object(Domain request) which hold all the information needed for our business logic to work on it.
This domain Request object should be a ValueObject and immutable so that no one could change values once it is instantiated.


Data would be validated before the creation of that object in a static factory method, the constructor of this Request object should be private.
UseCase would than call methods from a ServiceClass that handles the business logic.


The next step would be to communicate with persistence (infrastructure) layer.
I would probably avoid using Doctrine here, or even if using it I would decouple usage of Doctrine entities from domain models.


I would prefer using DataMapper of sort that would handle this.
Once we get our data from persistence layer it would be mapped to domain models and passed to Response object (again this is domain response object).
When this is done we are free to choose our representation layer. 
We could use decorators/transformers to prepare final object to be deserialized to json and sent to http Response object to be passed back to Client.


This is the part where I would utilize JmsSerializer exclusion policy to set what should actually appear in the response. 



2. Field Base authorization documented

Field based authorization could easily be achieved by utilizing JmsSerializer exclusion policy and serialization groups.
This way we can set which property of model to be serialized will be exposed and deserialized to json string in the response.

3. Additional notes
* .env file should not be part of VCS. This is commit-ed only as an example.
* When dealing with larger Db tables I would not recommend page-based pagination, but cursor-paged pagination.
* Search I implemented is only field-based, and it searches only on the top Entity level. 
This should be changed by using JOIN queries, but I would need a bit more time for this.
Global search is not done since I would use ElasticSearch or at least FULLTEXT indexes based search since I saw that Doctrine should support this.
For ElasticSearch I would use FOSElasticaBundle.