#!/bin/sh
set -e

cd "$(dirname "$0")"
/bin/sh app.sh
/bin/sh node.sh
/bin/sh composer.sh
/bin/sh php.sh
/bin/sh nginx.sh
/bin/sh supervisord.sh

# Clean
rm -rf /var/cache/apk/*
rm -rf /tmp/*
rm -rf "$(dirname "$0")"