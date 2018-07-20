<?php

$script_name = $argv[0];
$file_under_test = $argv[1];
$json_file_report = $argv[2];

$linter_bot_token = getenv('LINTER_TOKEN');
$repo_slug = getenv('TRAVIS_REPO_SLUG');
$pull_request = getenv('TRAVIS_PULL_REQUEST');

$file_report = json_decode($json_file_report);

if (!$file_report) {
    print "\nUNABLE TO DESERIALIZE REPORT\n";
    exit(1);
}

foreach ($file_report->files as $file => $report) {
    $comment = "FILE: $file_under_test";
    foreach ($report->messages as $message) {
        $comment .= "\n" . "line: " . $message->line;
        $comment .= "\n" . "message: " . $message->message . "\n";
    }

    $request_params = ["body" => $comment];
    $serialized_params = json_encode($request_params);
    if (!$serialized_params) {
        print "\nUNABLE TO SERIALIZE MESSAGE\n";
        exit(1);
    }

    $auth = ["Authorization: token $linter_bot_token"];

    $ch = curl_init("https://api.github.com/repos/" . $repo_slug . "/issues/" . $pull_request . "/comments");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $auth);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $serialized_params);
    $response = curl_exec($ch);

    var_dump($response);
}



