<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 6/24/18
 * Time: 12:40 PM
 */

namespace MailchimpTests;

use MailchimpAPI\BatchOperations;

class BatchOperationsTest extends MailChimpTestCase
{
    public function testBatchOperationsCollectionUrl()
    {
        $this->endpointUrlBuildTest(
            BatchOperations::URL_COMPONENT,
            $this->mailchimp->batches(),
            "The batch operations collection url should be constructed correctly"
        );
    }

    public function testBatchOperationsInstanceUrl()
    {
        $this->endpointUrlBuildTest(
            BatchOperations::URL_COMPONENT . 1,
            $this->mailchimp->batches(1),
            "The batch operations instance url should be constructed correctly"
        );
    }
}