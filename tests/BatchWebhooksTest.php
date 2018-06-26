<?php

namespace MailchimpTests;


class BatchWebhooksTest extends MailChimpTestCase
{
    public function testBatchWebhookCollectionUrl()
    {
        $expected_url = $this->expectedUrl("/batch-webhooks/");

        $resource = $this
            ->mailchimp
            ->batchWebhooks();

        self::assertEquals(
            $expected_url,
            $resource->request->getUrl(),
            "The batch webhooks collection url should be constructed correctly"
        );
    }

    public function testBatchWebhooksInstanceUrl()
    {
        $expected_url = $this->expectedUrl("/batch-webhooks/1");

        $resource = $this
            ->mailchimp
            ->batchWebhooks(1);

        self::assertEquals(
            $expected_url,
            $resource->request->getUrl(),
            "The batch webhooks instance url should be constructed correctly"
        );
    }
}