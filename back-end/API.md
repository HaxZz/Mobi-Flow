# APIs

Format: [JSON](https://en.wikipedia.org/wiki/JSON)

## Sign up (register user)

### Input

```
{
	'username': 'toto',
	'email'   : 'toto@addr.tld',
	'password': 'totopass'
}
```

### Output

```
{
	'result': 'ok'
}
```

```
{
	'result': 'fail',
	'errors':
	[
		'Usename already registered'
	]
}
```

```
{
	'result': 'fail',
	'errors':
	[
		'Email address already used',
		'Password too short'
	]
}
```

## Sign in (login user)

### Input

```
{
	'login'   : 'username',
	'password': 'pass'
}
```

```
{
	'login'   : 'toto@addr.tld',
	'password': 'pass'
}
```

### Output

```
{
	'result': 'ok'
}
```

```
{
	'result': 'fail'
}
```

## Modify profile of user

### Input

```
{
	'password'      : 'newpass',
	'password-check': 'pass'
}
```

```
{
	'username'      : 'toto2',
	'password-check': 'pass'
}
```

```
{
	'username'      : 'toto2',
	'username'      : 'toto2',
	'disabled'      : 'true',
	'password-check': 'pass'
}
```

### Output

```
{
	'result': 'ok'
}
```

```
{
	'result': 'fail',
	'errors':
	[
		'Password not valid'
	]
}
```

```
{
	'result': 'fail',
	'errors':
	[
		'Username already used'
	]
}
```

## Travel

### Input

```
{
	'departure': 'ENSICAEN, site B, Caen 14000, France',
	'arrival'  : 'Le Dome, Caen 14000, France',
	'datetime' :
	{
		'date':
		{
			'year' : '2017',
			'month': '01',
			'day'  : '20'
		},
		'time':
		{
			'hour'  : '18'
			'minute': '44'
		}
	}
}
```

```
{
	'departure': 'ENSICAEN, site B, Caen 14000, France',
	'arrival'  : 'Le Dome, Caen 14000, France',
	'datetime' :
	{
		'date':
		{
			'year' : '2017',
			'month': '01',
			'day'  : '20'
		},
		'time':
		{
			'hour'  : '18'
			'minute': '44'
		}
	},
	"disabled-friendly": 'false'
}
```

```
{
	'departure': 'ENSICAEN, site B, Caen 14000, France',
	'arrival'  : 'Le Dome, Caen 14000, France',
	'datetime' :
	{
		'date':
		{
			'year' : '2017',
			'month': '01',
			'day'  : '20'
		},
		'time':
		{
			'hour'  : '18'
			'minute': '44'
		}
	},
	"user-id": 3
}
```

The user identifier can be used to search only disabled paths.

### Output

```
{
	'travels':
	{
		[
			{
				'???',
				disabled-friendly: 'true'
			},
			{
				'???',
				disabled-friendly: 'false'
			}
		]
	}
}
```
