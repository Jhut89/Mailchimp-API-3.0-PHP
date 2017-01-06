#MAILCHIMP API 3.0 PHP

This is a PHP library for [version 3.0 of MailChimp's API](https://developer.mailchimp.com)

This library assumes a basic understanding of the MailChimp application and its associated functions. 

##Installation

There are two ways you can include this library in you project. One is through Composer and the other is by cloning this repository and manualy including the `mailchimpRoot.php` file.

For Composer run:

```php
composer require jhut89/mailchimp3php
```

Then run `composer install` and add composer autoloader to your project with:

```php
require "vendor/autoload.php";
```

To manually include this library you can clone this repository and use it with:

```php
require '/path/to/mailchimpRoot.php';
```

The only file that you need to require is mailchimpRoot.php. The file structure for this library should not be altered as its usage depends upon it.

##Instantiation

```php
$mailchimp = new mailchimp('123abc123abc123abc123abc-us0');
```

To instantiate you will need a new instance of the `mailchimp` class with your MailChimp account's API key as its only argument.

##Constructing a Request

Once you have instantiated the `mailchimp` class you can start constructing requests. Constructing requests is done by 'chaining' methods to the `$mailchimp` instance. In most cases this 'chain' will end with the HTTP verb for your request. So an example of retrieving a lists collection would look like this:

```php
$mailchimp->lists()->GET();
```

Retrieving an instance can be accomplished by giving a unique identifier for the instance you want as an argument to the appropriate method. For example if I wanted to retrieve a list instance from the above example I would simply pass a `list_id`, as the only argument for the `lists()` method. Like this:

```php
$mailchimp->lists('1a2b3c4d')->GET();
```

Methods available for each position in the chain depend on what the prior method returns. For example if I wanted to retrieve subscribers from a list in my account I would:

```php
$mailchimp->lists('1a2b3c4d')->members()->GET();
```

Notice that I provided a `list_id` to the `lists()` method, as there would be no way to retrieve a list of subscribers from a lists collection. The above request however will only return 10 subscriber instances from the members collection. This is because MailChimp's API uses pagination (documented [HERE](http://developer.mailchimp.com/documentation/mailchimp/guides/get-started-with-mailchimp-api-3/#parameters)) that defaults to `count=10` and `offset=0`. This library allows you to alter query string parameters by by passing them as an argument to the `GET()` method. We do this by providing an array of key-value pairs where the keys are the query parameter you wish to provide/alter and its value is the parameter's value. As an example if I wanted to retrieve the second 100 subscribers from my list I could:

```php
$mailchimp->lists('1a2b3c4d')->members()->GET([ "count" => "100", "offset" => "100"]);
```

This would be equivalent to making a get request against:

```
Https://us0.api.mailchimp.com/3.0/lists/1a2b3c4d/members?count=100&offset=100
```

Going a little further we can retrieve a single list member by giving the `members_hash` (md5 hash of lower-case address) to the `members()` method. Like this:

```php
$mailchimp->lists('1a2b3c4d')->members('8bdbf060209f35b52087992a3cbdf4d7')->GET();
```

###POST

While being able to retrieve data from your account is great we also need to be able to post new data. This can be done by calling the `POST()` method at the end of a chain. As an example subscribing an address to a list would look like this:

```php
$mailchimp->lists('1a2b3c4d')->members()->POST('subscribed', 'example@domain.com');
```

In this case I would not provide `members()` with an identifier as I want to post to its collection. Also notice that the post data is a series of arguments. These are the required parameters as defined by [MailChimp's documentation](http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/#create-post_lists_list_id_members) in the order that they appear there (top to bottom). Assuming there are more parameters listed in MailChimp's documentation than just those required a final argument can be passed as an `array()` to add these optional parameters to the request. As an example if I wanted to add 'email_type' and merge-fields containing my subscriber's name to the above request I can:

```php
$merge_values = array( "FNAME" => "John", "LNAME" => "Doe");

$optional_parameters = array( "email_type" => "html", "merge_fields" => $merge_values )

$mailchimp->lists('1a2b3c4d')->members()->POST('subscribed', 'example@domain.com', $optional_parameters);
```

###PATCH/PUT

This library handles PUT and PATCH request similar to that of POST requests. Meaning that if there are required fields listed in MailChimp's documentation they will be listed arguments for that method. Those methods that do not have any required parameters take a single argument being and array of parameters you wish to patch. As an example if I was patching the subscriber that we used above, to have a new first name, that would look like this.

```php
$mailchimp->lists('1a2b3c4d')->members('a1167f5be2df7113beb69c95ebcdb2fd')->PATCH( [ "merge_fields" => ["FNAME" => "Jane"] ] );
```

###DELETE

Deleting a record from MailChimp is performed with the `DELETE()` method and is constructed similar to GET requests. If I wanted to delete the above subscriber I would:

```php
$mailchimp->lists('1a2b3c4d')->members('a1167f5be2df7113beb69c95ebcdb2fd')->DELETE();
```

##Method Tree (\*excluding verbs)

	mailchimp()
		account()

		apps()

		automations()
	  		removedSubscribers()
	    	emails()
	    		queue()

	    batches()

	    campaignFolders()

	    campaigns()
	    	CANCEL()
	    	PAUSE()
	    	REPLICATE()
	    	RESUME()
	    	SCHEDULE()
	    	SEND()
	    	TEST()
	    	UNSCHEDULE()
	    	checklist()
	    	feedback()
	    	content()

	    conversations()
	    	messages()

	    ecomm_stores()
	    	customers()
	    	products()
	    		variants()
	    	orders()
	    		lines()
	    	carts()
	    		lines()

	    fileManagerFiles()

	    fileManagerFolders()

	    lists()
	    	BATCH_SUB()
	    	webhooks()
	    	signupForms()
	    	mergeFields()
	    	growthHistory()
	    	clients()
	    	activity()
	    	abuseReports()
	    	segments()
	    		BATCH()
	    		members()
	    	members()
	    		notes()
	    		goals()
	    		activity()
	       	interestCategories()
	       		interests()

	    reports()
	    	unsubscribes()
	    	subReports()
	    	sentTo()
	    	locations()
	    	emailActivity()
	    	eepurl()
	    	domainPerformance()
	    	advice()
	    	abuse()
	    	clickReports()
	    		members()

	    searchCampaigns()

	    searchMembers()

	    templateFolders()

	    templates()
	    	defaultContent()

\*Please see [MailChimp's API Documentation](http://developer.mailchimp.com/documentation/mailchimp/reference/overview/) for what verbs are appropriate where.

\*\*Please watch for updates, and feel free to Fork or Pull Request. Check out the Wiki for a little more info on contributing.




