SYMFONYDIR='Symfony'
APACHEUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data' | grep -v root | head -1 | cut -d\  -f1`
sudo setfacl -R -m u:"$APACHEUSER":rwX -m u:`whoami`:rwX "$SYMFONYDIR"/app/cache "$SYMFONYDIR"/app/logs
sudo setfacl -dR -m u:"$APACHEUSER":rwX -m u:`whoami`:rwX "$SYMFONYDIR"/app/cache "$SYMFONYDIR"/app/logs
