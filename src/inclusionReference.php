<?php
### Account
require 'account/accountRoot.php';
### Authorized Apps
require 'authorizedApps/authorizedAppsRoot.php';
### Automations
require 'automations/automationsRoot.php';
require 'automations/autoamtionsRemovedSubscribers.php';
	### Emails
	require 'automations/emails/automationsEmailsRoot.php';
	require 'automations/emails/automationsEmailsQueue.php';
### Batch Operations
require 'batchOperations/batchOperationsRoot.php';
### Batch Webhooks
require 'batchWebhooks/batchWebhooksRoot.php';
### Campaign Folders
require 'campaignFolders/campaignFoldersRoot.php';
### Campaigns
require 'campaigns/campaignsRoot.php';
require 'campaigns/campaignsContent.php';
require 'campaigns/campaignsFeedback.php';
require 'campaigns/campaignsSendChecklist.php';
### Conversations
require 'conversations/conversationsRoot.php';
require 'conversations/conversationsMessages.php';
### Eccommerce Stores
require 'ecommerceStores/ecommerceStoresRoot.php';
require 'ecommerceStores/ecommerceStoresCustomers.php';
	### Carts
	require 'ecommerceStores/carts/ecommerceStoresCartsRoot.php'; 
	require 'ecommerceStores/carts/ecommerceStoresCartLines.php';
	### Orders
	require 'ecommerceStores/orders/ecommerceStoresOrdersRoot.php';
	require 'ecommerceStores/orders/ecommerceStoresOrderLines.php';
	### Products
	require 'ecommerceStores/products/ecommerceStoresProductsRoot.php';
	require 'ecommerceStores/products/ecommerStoresProductVariants.php';
    require 'ecommerceStores/products/ecommerceStoresProductImages.php';
### File Manager Files
require 'fileManagerFiles/fileManagerFilesRoot.php';
### File Manager Folders
require 'fileManagerFolders/fileManagerFoldersRoot.php';
### Lists
require 'lists/listsRoot.php';
require 'lists/listsAbuseReports.php';
require 'lists/listsActivity.php';
require 'lists/listsClients.php';
require 'lists/listsGrowthHistory.php';
require 'lists/listsMergeFields.php';
require 'lists/listsSignupForms.php';
require 'lists/listsWebhooks.php';
	### Interest Categories
	require 'lists/interestCategories/listsInterestsCategoriesRoot.php';
	require 'lists/interestCategories/listsInterestsCategroiesInterests.php';
	### Members
	require 'lists/members/listsMembersRoot.php';
	require 'lists/members/listsMembersMemberActivity.php';
	require 'lists/members/listsMembersMemberGoals.php';
	require 'lists/members/listsMembersMemberNotes.php';
	### Segments
	require 'lists/segments/listsSegmentsRoot.php';
	require 'lists/segments/listsSegmentsSegmentMembers.php';
### Reports
require 'reports/reportsRoot.php';
require 'reports/reportsCampaignAbuse.php';
require 'reports/reportsCampaignAdvice.php';
require 'reports/reportsDomainPerformance.php';
require 'reports/reportsEepurlReports.php';
require 'reports/reportsEmailActivity.php';
require 'reports/reportsLocations.php';
require 'reports/reportsSentTo.php';
require 'reports/reportsSubReports.php';
require 'reports/reportsUnsubscribes.php';
	### Click Reports
	require 'reports/clickReports/clickReportsRoot.php';
	require 'reports/clickReports/clickReportsMembers.php';
### Search Campaigns
require 'searchCampaigns/searchCampaignsRoot.php';
### Search Members
require 'searchMembers/searchMembersRoot.php';
### Template Folders
require 'templateFolders/templateFoldersRoot.php';
### Templates
require 'templates/templatesRoot.php';
require 'templates/templateDefaultContent.php';

### Library Utilities
require 'libraryUtilities/mailchimpUtilities.php';
require 'libraryExceptions/libraryExceptions.php';