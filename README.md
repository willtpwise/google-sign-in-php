# Google Sign In (PHP Backend)

Authenticate a Google Sign In token on the backend with PHP. The authenticator
will validate the user's Google ID Token.

## Install
```shell
$ php bin/composer install
```

## Usage
Make an HTTPS Post request to `data/example.php` and pass a Google Sign In token
as `token`
```javascript
var xhr = new XMLHttpRequest();
xhr.open('POST', 'https://yourbackend.example.com/data/example.php');
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onload = function() {
  console.log(JSON.parse(xhr.responseText));
};
xhr.send('token=' + id_token);
```

## Returns
The authenticator will return your content, or a JSON object on error / failure

On error / failure, the JSON object will look like so:
```json
{
  "status": false,
  "body": "<Error description>"
}
```
