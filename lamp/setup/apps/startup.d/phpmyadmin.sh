#!/bin/bash

puser=${USER:-www-data}

function dolog() { logger -t phpmyadmin.sh -p info $*; }

if [ $CONTAINER_INIT == 1 ]; then
  dolog setting phpmyadmin user permissions for "$puser"
  sudo bash -c "chown -R $puser: /var/lib/phpmyadmin/tmp; chgrp --reference /var/lib/phpmyadmin/tmp /var/lib/phpmyadmin/*.php"
  sudo bash -c "chgrp --reference /var/lib/phpmyadmin/tmp \`find /etc/phpmyadmin -group www-data\`"
fi

if [ $APPS_INIT == 1 ]; then
  dolog creating phpmyadmin link in default site
  cd $APPS_DIR/www/default
  ln -s /usr/share/phpmyadmin
fi
