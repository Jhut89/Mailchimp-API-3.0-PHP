<?php
$lint_report_json = $argv[1];

$lint_report = json_decode($lint_report_json);

$lint_report ?: exit(1);

$number_errors = $lint_report
    ->totals
    ->errors;

$number_warnings = $lint_report
    ->totals
    ->warnings;

if (($number_errors + $number_warnings) > 0) {
    echo "true";
} else {
    echo "false";
}