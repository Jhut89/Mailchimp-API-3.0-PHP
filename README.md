#MAILCHIMP API 3.0 PHP

This is a PHP library for [version 3.0 of MailChimp's API](https://developer.mailchimp.com)

This library assumes a basic understanding of the MailChimp application and its associated functions. 

##Installation

	require '/path/to/mailchimpRoot.php';

The only file that you need to require is mailchimpRoot.php. The file structure for this library should not be altered as its usage depends upon it.

##Instantiation

	$mailchimp = new mailchimp('123abc123abc123abc123abc-us0');

To instantiate you will need a new instance of the `mailchimp` class with your MailChimp accounts API key as its only argument.

##Constructing a Request

Once you have instantiated the `mailchimp` class you can start constructing requests. Constructing requests is done by 'chaining' methods to the `$mailchimp` instance. In most cases this 'chain' will end with the HTTP verb for your request. So an example of retrieving a lists collection would look like this:

	$mailchimp->lists()->GET();

Retrieving an instance can be accomplished by giving a unique identifier for the instance you want as an argument to the appropriate method. For example if I wanted to retrieve a list instance from the above example I would simply pass a `list_id`, as the only argument, for the `lists()` method. Like this:

	$mailchimp->lists('1a2b3c4d')->GET();

Methods available for each position in the chain depend on what the prior method returns. For example if I wanted to retrieve subscribers from a list in my account I would:

	$mailchimp->lists('1a2b3c4d')->members()->GET();

Notice that I provided a `list_id` to the list method, as there would be no way to retrieve a list of subscribers from a lists collection. The above request however will only return 10 subscriber instances from the members collection. This is because MailChimp's API uses pagination (documented [HERE](http://developer.mailchimp.com/documentation/mailchimp/guides/get-started-with-mailchimp-api-3/#parameters)) that defaults to `count=10` and `offset=0`. This library allows you to alter query string parameters by by passing them as an argument to the `GET()` method. We do this by providing an array of key value pairs where the keys are the query parameter you wish to provide/alter and its value is the parameters value. As an example if I wanted to retrieve the second 100 subscribers from my list I could:

	$mailchimp->lists('1a2b3c4d')->members()->GET([ "count" => "100", "offset" => "100"]);

This would be equivalent to making a get request against:

	Https://us0.api.mailchimp.com/3.0/lists/1a2b3c4d/members?count=100&offset=100

Going a little further we can retrieve a single list member by giving the `members_hash` (md5 hash of lower-case address) to the `members()` method. Like this:

	$mailchimp->lists('1a2b3c4d')->members('8bdbf060209f35b52087992a3cbdf4d7')->GET();

###POST

While being able to retrieve data from your account is great we also need to be able to post new data. This can be done by calling the `POST()` method at the end of a chain. As an example subscribing an address to a list would look like this:

	$mailchimp->lists('1a2b3c4d')->members()->POST('subscribed', 'example@domain.com');

In this case I would not provide `members()` with an identifier as I want to post to its collection. Also notice that the post data is a series of arguments. These are the required parameters as defined by [MailChimp's documentation](http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/#create-post_lists_list_id_members) in the order that they appear there (top to bottom). Assuming there are more parameters listed in MailChimp's documentation than just those required a final argument can be passed as an `array()` to add these optional parameters to the request. As an example if I wanted to add 'email_type' and merge-fields containing my subscriber's name to the above request I can:

	$merge_values = array( "FNAME" => "John", "LNAME" => "Doe");

	$optional_parameters = array( "email_type" => "html", "merge_fields" => $merge_values )

	$mailchimp->lists('1a2b3c4d')->members()->POST('subscribed', 'example@domain.com', $optional_parameters);

###PATCH/PUT

This library handles PUT and PATCH request similar to that of POST requests. Meaning that if there are required fields listed in MailChimps documentation they will be listed arguments for that method. Those methods that do not have any required parameters take a single argument being and array of parameters you wish to patch. As an example if i was patching the subscriber that we used above to have a new first name that would look like this.

	$mailchimp->lists('1a2b3c4d')->members('a1167f5be2df7113beb69c95ebcdb2fd')->PATCH( [ "merge_fields" => ["FNAME" => "Jane"] ] );

###DELETE

Deleting a record from MailChimp is performed with the `DELETE()` method and is constructed similar to GET requests. If I wanted to delete the above subscriber I would:

	$mailchimp->lists('1a2b3c4d')->members('a1167f5be2df7113beb69c95ebcdb2fd')->DELETE();

##Method Tree (\*excluding verbs)

	mailchimp()
		account()

		apps()

		automations()
	  		removed_subscribers()
	    	emails()
	    		queue()

	    batches()

	    campaign_folders()

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

	    file_manager_files()

	    file_manager_folders()

	    lists()
	    	BATCH_SUB()
	    	webhooks()
	    	signup_forms()
	    	merge_fields()
	    	growth_history()
	    	clients()
	    	activity()
	    	abuse_reports()
	    	segments()
	    		BATCH()
	    		members()
	    	members()
	    		notes()
	    		goals()
	    		activity()
	       	interest_categories()
	       		interests()

	    reports()
	    	unsubscribes()
	    	sub_reports()
	    	sent_to()
	    	locations()
	    	email_activity()
	    	eepurl()
	    	domain_performance()
	    	advice()
	    	abuse()
	    	click_reports()
	    		members()

	    search_campaigns()

	    search_members()

	    template_folders()

	    templates()
	    	default_content()

\*Please see [MailChimp's API Documentation](http://developer.mailchimp.com/documentation/mailchimp/reference/overview/) for what verbs are appropriate where.





