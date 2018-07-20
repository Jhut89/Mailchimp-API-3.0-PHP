#!/usr/bin/env bash

BOLD='\033[1m'
RED='\033[0;31m'
GREEN='\033[0;32m'
NS='\033[0m'

PR_PASSING="true"

echo -e "\n${GREEN}${BOLD}This build is for a pull request${NS}\n"

#for each changed file -> lint -> comment
for changed_file in $(git diff --name-only HEAD $(git merge-base HEAD $TRAVIS_BRANCH)); do
    # split file path into array
    IFS='/' read -r -a split <<< "${changed_file}"
    ROOT_DIR=${split[0]}

    if [ "${ROOT_DIR}" = "src" ]; then
        # this variable is set and check to signal if lint errors are found

        echo -e "\n${changed_file} is in src directory\n"

        # file_report is a json representation of a phpcs report
        json_file_report=$(./vendor/bin/phpcs --report=json --standard=PSR12 "${changed_file}")

        #PHP script, comments on PR with lint issues, sets LINT_ERRORS="true" if errors are found

        LINT_ERRORS=$(php "$(pwd)/travis/CheckErrors.php" "${json_file_report}")

        if [ "${LINT_ERRORS}" = "true" ]; then
            PR_PASSING="false"

            file_report=$(./vendor/bin/phpcs --standard=PSR12 "${changed_file}")

            # Echo a report to standard out so that we can see it in build log
            echo -e "\n\n${RED}${BOLD}${file_report}${NS}\n"

            curl -H "Authorization: token ${LINTER_TOKEN}" -X POST \
            -d "{\"body\": \""${file_report}"\"}" \
            "https://api.github.com/repos/${TRAVIS_REPO_SLUG}/issues/${TRAVIS_PULL_REQUEST}/comments"

            exit 1
        fi
    else
        echo -e "${GREEN}${changed_file} is ${BOLD}NOT${NS}${GREEN} in src directory and will not be linted${NS}\n"
    fi
done

echo "${PR_PASSING}"

#./vendor/bin/phpcs --standard=PSR12 src/