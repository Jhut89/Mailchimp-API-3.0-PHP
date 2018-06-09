<?php
### Account
require 'Account/Account.php';
### Authorized Apps
require 'authorizedApps/Authorized_Apps.php';
### Automations
require 'Automations/Automations.php';
require 'Automations/Removed_Subscribers.php';
	### Emails
	require 'Automations/Emails/Emails.php';
	require 'Automations/Emails/Queue.php';
### Batch Operations
require 'batchOperations/Batch_Operations.php';
### Batch Webhooks
require 'batchWebhooks/Batch_Webhooks.php';
### Campaign Folders
require 'campaignFolders/Campaign_Folders.php';
### Campaigns
require 'Campaigns/Campaigns.php';
require 'Campaigns/Content.php';
require 'Campaigns/Feedback.php';
require 'Campaigns/Send_Checklist.php';
### Conversations
require 'Conversations/Conversations.php';
require 'Conversations/Messages.php';
### Eccommerce Stores
require 'Ecommerce_Stores/Ecommerce_Stores.php';
require 'Ecommerce_Stores/Customers.php';
	### Carts
	require 'Ecommerce_Stores/Carts/Carts.php';
	require 'Ecommerce_Stores/Carts/Lines.php';
	### Orders
	require 'Ecommerce_Stores/Orders/Orders.php';
	require 'Ecommerce_Stores/Orders/Lines.php';
	### Products
	require 'Ecommerce_Stores/Products/Products.php';
	require 'Ecommerce_Stores/Products/Variants.php';
    require 'Ecommerce_Stores/Products/Images.php';
### File Manager Files
require 'fileManagerFiles/File_Manager_Files.php';
### File Manager Folders
require 'fileManagerFolders/File_Manager_Folders.php';
### Lists
require 'Lists/Lists.php';
require 'Lists/Abuse_Reports.php';
require 'Lists/Activity.php';
require 'Lists/Clients.php';
require 'Lists/listsGrowthHistory.php';
require 'Lists/listsMergeFields.php';
require 'Lists/listsSignupForms.php';
require 'Lists/listsWebhooks.php';
	### Interest Categories
	require 'Lists/interestCategories/listsInterestsCategoriesRoot.php';
	require 'Lists/interestCategories/listsInterestsCategroiesInterests.php';
	### Members
	require 'Lists/members/listsMembersRoot.php';
	require 'Lists/members/listsMembersMemberActivity.php';
	require 'Lists/members/listsMembersMemberGoals.php';
	require 'Lists/members/listsMembersMemberNotes.php';
	### Segments
	require 'Lists/segments/listsSegmentsRoot.php';
	require 'Lists/segments/listsSegmentsSegmentMembers.php';
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
require 'libraryUtilities/Utilities.php';
require 'libraryExceptions/Library_Exception.php';