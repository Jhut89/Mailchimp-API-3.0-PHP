<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutch
 * Date: 6/24/18
 * Time: 12:40 PM
 */

namespace MailchimpTests;

class BatchOperationsTest extends MailChimpTestCase
{
    public function testBatchOperationsCollectionUrl()
    {
        $expected_url = $this->expectedUrl("/batches/");

        $batches = $this
            ->mailchimp
            ->batches();

        self::assertEquals(
            $expected_url,
            $batches->request->getUrl(),
            "The batch operations collection url should be constructed correctly"
        );
    }

    public function testBatchOperationsInstanceUrl()
    {
        $expected_url = $this->expectedUrl("/batches/1");

        $batches = $this
            ->mailchimp
            ->batches(1);

        self::assertEquals(
            $expected_url,
            $batches->request->getUrl(),
            "The batch operations instance url should be constructed correctly"
        );
    }
}