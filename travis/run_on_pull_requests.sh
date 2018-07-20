#!/usr/bin/env bash

BOLD='\033[1m'
RED='\033[0;31m'
GREEN='\033[0;32m'
NS='\033[0m'

PR_PASSING="true"

echo -e "\n${GREEN}${BOLD}This build is for a pull request${NS}\n"

ALTERED_FILES=$(git diff --name-only $TRAVIS_COMMIT_RANGE)

echo "${ALTERED_FILES}"



#for each changed file -> lint -> comment
for changed_file in $ALTERED_FILES; do
    # split file path into array
    IFS='/' read -r -a split <<< "${changed_file}"
    ROOT_DIR=${split[0]}

    if [ "${ROOT_DIR}" = "src" ]; then

        # file_report is a json representation of a phpcs report
        json_file_report=$(./vendor/bin/phpcs --report=json --standard=PSR12 "${changed_file}")

        #PHP script, comments on PR with lint issues, sets LINT_ERRORS="true" if errors are found

        LINT_ERRORS=$(php "$(pwd)/travis/CheckErrors.php" "${json_file_report}")

        if [ "${LINT_ERRORS}" = "true" ]; then
            # There are errors and this PR did not pass
            PR_PASSING="false"

            # we only want to report errors once per PR so lets do it for the 5.6 build
            if [ "${TRAVIS_PHP_VERSION}" == "5.6" ]; then
                php "$(pwd)/travis/ReportError.php" "${changed_file}" "${json_file_report}"
            fi

            # Get a human readable report
            file_report=$(./vendor/bin/phpcs --standard=PSR12 "${changed_file}")

            # Echo a report to standard out so that we can see it in build log
            echo -e "\n\n${RED}${BOLD}${file_report}${NS}\n"
        fi
    else
        echo -e "${GREEN}${changed_file} is ${BOLD}NOT${NS}${GREEN} in src/ directory and will not be linted${NS}\n"
    fi
done



if [ "${PR_PASSING}" == "true" ]; then
    php "$(pwd)/travis/ReportSuccess.php" "${TRAVIS_PHP_VERSION}"
else
    # This PR did not pass, exit with error status
    exit 1
fi
