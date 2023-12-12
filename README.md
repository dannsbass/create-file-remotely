# create-file-remotely
Simple script to create file on server from local computer

# How does it work?
1. put `git_server.php` on your server.
2. run `git_client.php` from your local computer with 1 parameter (file name)
3. your server will create a new file

# Example
```bash
php git_client.php document1.txt
```