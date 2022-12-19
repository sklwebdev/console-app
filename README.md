---
Notes
---

**Docker**

Build image:
```
docker build --rm --no-cache --pull -t sklwebdev/console-lib:local -f docker/Dockerfile .
```

Start container:
```
docker run -d -it --name sklwebdev-console-app sklwebdev/console-lib:local
```

Wait a little and login into container:
```
docker exec -it sklwebdev-console-app sh
```

Execute console command (inside of container):
```
# Template
php console.php %command_name% %your_arguments%

# Example
php console.php custom {verbose,overwrite} [log_file=app.log] {unlimited} [methods={create,update,delete}] [paginate=50] {log}
```

Execute tests (inside of container):
```
php vendor/bin/phpunit
```
