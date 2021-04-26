# [JS in JSON](https://github.com/WebReflection/js-in-json#readme) Session


### JS
```js
import Session from 'js-in-json-session';

const session = new Session(jsonBundle);

session.add('Module');
const output = session.flush();
```


### PHP
[session.php](./php/session.php)
```php
include(__DIR__.'/session.php');

$session = new JSinJSON\Session($jsonBundle);
$session->add('Module');
$output = $session->flush();
```


### Python
[session.py](./python/session.py)
```python
from session import Session

session = Session(jsonBundle)
session.add('Module')
output = session.flush()
```