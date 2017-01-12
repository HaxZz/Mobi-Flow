# APIs

Format: [JSON](https://en.wikipedia.org/wiki/JSON)

## Sign up (register user)

### Input

```
{
	"username": "toto",
	"email"   : "toto@addr.tld",
	"password": "totopass"
}
```

### Output

```
{
	"result": "ok"
}
```

```
{
	"result": "fail",
	"errors":
	[
		"Usename already registered"
	]
}
```

```
{
	"result": "fail",
	"errors":
	[
		"Email address already used",
		"Password too short"
	]
}
```

## Sign in (login user)

### Input

```
{
	"login"   : "username",
	"password": "pass"
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
	'username-id'   : 3,
	'password-check': 'pass'
}
```

```
{
	'username'      : 'toto2',
	'username-id'   : 3,
	'password-check': 'pass'
}
```

```
{
	'username'      : 'toto3',
	'disabled'      : 'true',
	'username-id'   : 3,
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
	"beginning": {"longitude" : "00", "latitude" : "00" },
	"ending"  : {"longitude" : "00", "latitude" : "00" },
	"datetime_beginning":
	{
		"date":
		{
			"year" : "2017",
			"month": "01",
			"day"  : "20"
		},
		"time":
		{
			"hour'  : '18',
			'minute': '44'
		}
	}
}
```

```
{
	'departure': 'ENSICAEN, site B, Caen 14000, France',
	'arrival'  : 'Le Dome, Caen 14000, France',
	'datetime-arrival' :
	{
		'date':
		{
			"year" : "2017",
			"month": "01",
			"day" : "20"
		},
		"time":
		{
			"hour"  : "18",
			"minute": "44"
		}
	},
	"disability": "None"
}
```

```
{
	"beginning": {"longitude" : "00", "latitude" : "00" },
    "ending"  : {"longitude" : "00", "latitude" : "00" },
	"datetime_departure" :
	{
		"date":
		{
			"year" : "2017",
			"month": "01",
			"day"  : "20"
		},
		"time":
		{
			"hour"  : "18",
			"minute": "44"
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

```
{
	'travels': null,
	'errors':
	[
		'Departure not found'
	]
}
```

```
{
	'travels': null,
	'errors':
	[
		'Arrival not defined'
	]
}
```

```
{
	'travels': null,
	'errors':
	[
		'Departure not defined',
		'Date not defined'
	]
}
```
```
[
  {
    "trajet": [
      {
        "traceCoordonnees": [
          {
            "latitude": 44.864228,
            "longitude": -0.746756
          },
          {
            "latitude": 44.864065,
            "longitude": -0.728742
          }
        ],
        "infos": null,
        "mode": "crow_fly",
        "fin": {
          "time": "20170120T191900",
          "coordinates": {
            "latitude": 44.864065,
            "longitude": -0.728742
          },
          "adress": "Village de Magudas (Saint-Médard-en-Jalles)"
        },
        "beginning": {
          "time": "20170120T185752",
          "coordinates": {
            "latitude": 44.864228,
            "longitude": -0.746756
          },
          "adress": ""
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.864065,
            "longitude": -0.728742
          },
          {
            "latitude": 44.860755,
            "longitude": -0.728534
          },
          {
            "latitude": 44.859833,
            "longitude": -0.725913
          },
          {
            "latitude": 44.860721,
            "longitude": -0.723906
          },
          {
            "latitude": 44.86542,
            "longitude": -0.714142
          },
          {
            "latitude": 44.867293,
            "longitude": -0.71016
          },
          {
            "latitude": 44.870783,
            "longitude": -0.710099
          },
          {
            "latitude": 44.871306,
            "longitude": -0.707662
          },
          {
            "latitude": 44.873806,
            "longitude": -0.704582
          },
          {
            "latitude": 44.872617,
            "longitude": -0.703489
          },
          {
            "latitude": 44.869521,
            "longitude": -0.703082
          },
          {
            "latitude": 44.862449,
            "longitude": -0.699207
          },
          {
            "latitude": 44.861152,
            "longitude": -0.694571
          },
          {
            "latitude": 44.859303,
            "longitude": -0.684578
          },
          {
            "latitude": 44.858673,
            "longitude": -0.682116
          },
          {
            "latitude": 44.858065,
            "longitude": -0.678173
          },
          {
            "latitude": 44.858338,
            "longitude": -0.668003
          },
          {
            "latitude": 44.857298,
            "longitude": -0.659647
          },
          {
            "latitude": 44.856924,
            "longitude": -0.657063
          },
          {
            "latitude": 44.856439,
            "longitude": -0.651798
          },
          {
            "latitude": 44.856142,
            "longitude": -0.647673
          },
          {
            "latitude": 44.856134,
            "longitude": -0.644644
          },
          {
            "latitude": 44.856332,
            "longitude": -0.642731
          }
        ],
        "infos": {
          "modeTransport": "Bus",
          "endingStop": "Henri Barbusse (Mérignac)",
          "beginningStop": "Village de Magudas (Saint-Méard-en-Jalles)",
          "direction": "Henri Barbusse (Mérignac)",
          "line": "71"
        },
        "mode": "public_transport",
        "fin": {
          "time": "20170120T194000",
          "coordinates": {
            "latitude": 44.856332,
            "longitude": -0.642731
          },
          "adress": "Henri Barbusse (Mérignac)"
        },
        "beginning": {
          "time": "20170120T191900",
          "coordinates": {
            "latitude": 44.864065,
            "longitude": -0.728742
          },
          "adress": "Village de Magudas (Saint-Médard-en-Jalles)"
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.856332,
            "longitude": -0.642731
          },
          {
            "latitude": 44.856215,
            "longitude": -0.642179
          }
        ],
        "infos": null,
        "mode": "transfer",
        "fin": {
          "time": "20170120T194111",
          "coordinates": {
            "latitude": 44.856215,
            "longitude": -0.642179
          },
          "adress": "Henri Barbusse (M\u00e9rignac)"
        },
        "beginning": {
          "time": "20170120T194000",
          "coordinates": {
            "latitude": 44.856332,
            "longitude": -0.642731
          },
          "adress": "Henri Barbusse (M\u00e9rignac)"
        }
      },
      {
        "traceCoordonnees": null,
        "infos": null,
        "mode": "waiting",
        "fin": null,
        "beginning": null
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.856215,
            "longitude": -0.642179
          },
          {
            "latitude": 44.856326,
            "longitude": -0.638524
          },
          {
            "latitude": 44.85693,
            "longitude": -0.636029
          },
          {
            "latitude": 44.857137,
            "longitude": -0.633026
          },
          {
            "latitude": 44.856785,
            "longitude": -0.631103
          },
          {
            "latitude": 44.856289,
            "longitude": -0.628904
          },
          {
            "latitude": 44.855777,
            "longitude": -0.626096
          },
          {
            "latitude": 44.853902,
            "longitude": -0.622541
          },
          {
            "latitude": 44.852358,
            "longitude": -0.619033
          },
          {
            "latitude": 44.852193,
            "longitude": -0.613865
          },
          {
            "latitude": 44.851734,
            "longitude": -0.611074
          },
          {
            "latitude": 44.850125,
            "longitude": -0.605117
          },
          {
            "latitude": 44.847797,
            "longitude": -0.602155
          },
          {
            "latitude": 44.846503,
            "longitude": -0.597574
          }
        ],
        "infos": {
          "modeTransport": "Bus",
          "endingStop": "Rue de Caud\u00e9ran (Bordeaux)",
          "beginningStop": "Henri Barbusse (M\u00e9rignac)",
          "direction": "Pole d'Echanges Quinconces (arr\u00eat de Descente) (Bordeaux)",
          "line": "2"
        },
        "mode": "public_transport",
        "fin": {
          "time": "20170120T200100",
          "coordinates": {
            "latitude": 44.846503,
            "longitude": -0.597574
          },
          "adress": "Rue de Caud\u00e9ran (Bordeaux)"
        },
        "beginning": {
          "time": "20170120T195000",
          "coordinates": {
            "latitude": 44.856215,
            "longitude": -0.642179
          },
          "adress": "Henri Barbusse (M\u00e9rignac)"
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.846503,
            "longitude": -0.597574
          },
          {
            "latitude": 44.84588,
            "longitude": -0.598459
          }
        ],
        "infos": null,
        "mode": "transfer",
        "fin": {
          "time": "20170120T200340",
          "coordinates": {
            "latitude": 44.84588,
            "longitude": -0.598459
          },
          "adress": "Pasteur (Bordeaux)"
        },
        "beginning": {
          "time": "20170120T200100",
          "coordinates": {
            "latitude": 44.846503,
            "longitude": -0.597574
          },
          "adress": "Rue de Caud\u00e9ran (Bordeaux)"
        }
      },
      {
        "traceCoordonnees": null,
        "infos": null,
        "mode": "waiting",
        "fin": null,
        "beginning": null
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.84588,
            "longitude": -0.598459
          },
          {
            "latitude": 44.848633,
            "longitude": -0.597229
          },
          {
            "latitude": 44.85204,
            "longitude": -0.594698
          },
          {
            "latitude": 44.854496,
            "longitude": -0.592892
          },
          {
            "latitude": 44.85615,
            "longitude": -0.591629
          },
          {
            "latitude": 44.857693,
            "longitude": -0.590473
          },
          {
            "latitude": 44.859881,
            "longitude": -0.588864
          },
          {
            "latitude": 44.861421,
            "longitude": -0.586961
          },
          {
            "latitude": 44.862559,
            "longitude": -0.584081
          },
          {
            "latitude": 44.863335,
            "longitude": -0.58209
          },
          {
            "latitude": 44.864953,
            "longitude": -0.578037
          },
          {
            "latitude": 44.866432,
            "longitude": -0.574367
          },
          {
            "latitude": 44.868345,
            "longitude": -0.569838
          },
          {
            "latitude": 44.870352,
            "longitude": -0.565162
          }
        ],
        "infos": {
          "modeTransport": "Bus",
          "endingStop": "Latule (Bordeaux)",
          "beginningStop": "Pasteur (Bordeaux)",
          "direction": "Brandenburg (Bordeaux)",
          "line": "9"
        },
        "mode": "public_transport",
        "fin": {
          "time": "20170120T202000",
          "coordinates": {
            "latitude": 44.870352,
            "longitude": -0.565162
          },
          "adress": "Latule (Bordeaux)"
        },
        "beginning": {
          "time": "20170120T200700",
          "coordinates": {
            "latitude": 44.84588,
            "longitude": -0.598459
          },
          "adress": "Pasteur (Bordeaux)"
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.870352,
            "longitude": -0.565162
          },
          {
            "latitude": 44.8703728021,
            "longitude": -0.5651707346
          },
          {
            "latitude": 44.870413,
            "longitude": -0.565075
          },
          {
            "latitude": 44.870541,
            "longitude": -0.564867
          },
          {
            "latitude": 44.8705646462,
            "longitude": -0.5648122881
          },
          {
            "latitude": 44.8705646462,
            "longitude": -0.5648122881
          }
        ],
        "infos": null,
        "mode": "street_network",
        "fin": {
          "time": "20170120T202030",
          "coordinates": {
            "latitude": 44.8705646462,
            "longitude": -0.5648122881
          },
          "adress": "Boulevard Alfred Daney (Bordeaux)"
        },
        "beginning": {
          "time": "20170120T202000",
          "coordinates": {
            "latitude": 44.870352,
            "longitude": -0.565162
          },
          "adress": "Latule (Bordeaux)"
        }
      }
    ]
  },
  {
    "trajet": [
      {
        "traceCoordonnees": [
          {
            "latitude": 44.864228,
            "longitude": -0.746756
          },
          {
            "latitude": 44.864065,
            "longitude": -0.728742
          }
        ],
        "infos": null,
        "mode": "crow_fly",
        "fin": {
          "time": "20170120T191900",
          "coordinates": {
            "latitude": 44.864065,
            "longitude": -0.728742
          },
          "adress": "Village de Magudas (Saint-M\u00e9dard-en-Jalles)"
        },
        "beginning": {
          "time": "20170120T185752",
          "coordinates": {
            "latitude": 44.864228,
            "longitude": -0.746756
          },
          "adress": ""
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.864065,
            "longitude": -0.728742
          },
          {
            "latitude": 44.860755,
            "longitude": -0.728534
          },
          {
            "latitude": 44.859833,
            "longitude": -0.725913
          },
          {
            "latitude": 44.860721,
            "longitude": -0.723906
          },
          {
            "latitude": 44.86542,
            "longitude": -0.714142
          },
          {
            "latitude": 44.867293,
            "longitude": -0.71016
          },
          {
            "latitude": 44.870783,
            "longitude": -0.710099
          },
          {
            "latitude": 44.871306,
            "longitude": -0.707662
          },
          {
            "latitude": 44.873806,
            "longitude": -0.704582
          },
          {
            "latitude": 44.872617,
            "longitude": -0.703489
          },
          {
            "latitude": 44.869521,
            "longitude": -0.703082
          },
          {
            "latitude": 44.862449,
            "longitude": -0.699207
          },
          {
            "latitude": 44.861152,
            "longitude": -0.694571
          },
          {
            "latitude": 44.859303,
            "longitude": -0.684578
          },
          {
            "latitude": 44.858673,
            "longitude": -0.682116
          },
          {
            "latitude": 44.858065,
            "longitude": -0.678173
          },
          {
            "latitude": 44.858338,
            "longitude": -0.668003
          },
          {
            "latitude": 44.857298,
            "longitude": -0.659647
          },
          {
            "latitude": 44.856924,
            "longitude": -0.657063
          },
          {
            "latitude": 44.856439,
            "longitude": -0.651798
          },
          {
            "latitude": 44.856142,
            "longitude": -0.647673
          },
          {
            "latitude": 44.856134,
            "longitude": -0.644644
          },
          {
            "latitude": 44.856332,
            "longitude": -0.642731
          }
        ],
        "infos": {
          "modeTransport": "Bus",
          "endingStop": "Henri Barbusse (M\u00e9rignac)",
          "beginningStop": "Village de Magudas (Saint-M\u00e9dard-en-Jalles)",
          "direction": "Henri Barbusse (M\u00e9rignac)",
          "line": "71"
        },
        "mode": "public_transport",
        "fin": {
          "time": "20170120T194000",
          "coordinates": {
            "latitude": 44.856332,
            "longitude": -0.642731
          },
          "adress": "Henri Barbusse (M\u00e9rignac)"
        },
        "beginning": {
          "time": "20170120T191900",
          "coordinates": {
            "latitude": 44.864065,
            "longitude": -0.728742
          },
          "adress": "Village de Magudas (Saint-M\u00e9dard-en-Jalles)"
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.856332,
            "longitude": -0.642731
          },
          {
            "latitude": 44.857088,
            "longitude": -0.643579
          }
        ],
        "infos": null,
        "mode": "transfer",
        "fin": {
          "time": "20170120T194250",
          "coordinates": {
            "latitude": 44.857088,
            "longitude": -0.643579
          },
          "adress": "Lib\u00e9ration (M\u00e9rignac)"
        },
        "beginning": {
          "time": "20170120T194000",
          "coordinates": {
            "latitude": 44.856332,
            "longitude": -0.642731
          },
          "adress": "Henri Barbusse (M\u00e9rignac)"
        }
      },
      {
        "traceCoordonnees": null,
        "infos": null,
        "mode": "waiting",
        "fin": null,
        "beginning": null
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.857088,
            "longitude": -0.643579
          },
          {
            "latitude": 44.861518,
            "longitude": -0.641788
          },
          {
            "latitude": 44.864854,
            "longitude": -0.638456
          },
          {
            "latitude": 44.868839,
            "longitude": -0.635939
          },
          {
            "latitude": 44.872366,
            "longitude": -0.633366
          },
          {
            "latitude": 44.873629,
            "longitude": -0.63033
          },
          {
            "latitude": 44.875332,
            "longitude": -0.630605
          },
          {
            "latitude": 44.879754,
            "longitude": -0.634022
          },
          {
            "latitude": 44.881039,
            "longitude": -0.632204
          },
          {
            "latitude": 44.881747,
            "longitude": -0.630399
          },
          {
            "latitude": 44.881045,
            "longitude": -0.628705
          },
          {
            "latitude": 44.876248,
            "longitude": -0.621601
          },
          {
            "latitude": 44.874652,
            "longitude": -0.61914
          },
          {
            "latitude": 44.873947,
            "longitude": -0.616978
          },
          {
            "latitude": 44.87821,
            "longitude": -0.613957
          },
          {
            "latitude": 44.882837,
            "longitude": -0.610807
          },
          {
            "latitude": 44.885406,
            "longitude": -0.609108
          },
          {
            "latitude": 44.884801,
            "longitude": -0.606115
          },
          {
            "latitude": 44.883921,
            "longitude": -0.600734
          },
          {
            "latitude": 44.883401,
            "longitude": -0.597582
          },
          {
            "latitude": 44.882623,
            "longitude": -0.593235
          },
          {
            "latitude": 44.880049,
            "longitude": -0.59146
          },
          {
            "latitude": 44.877748,
            "longitude": -0.591528
          },
          {
            "latitude": 44.875772,
            "longitude": -0.59021
          },
          {
            "latitude": 44.876036,
            "longitude": -0.585398
          },
          {
            "latitude": 44.876233,
            "longitude": -0.581519
          },
          {
            "latitude": 44.875325,
            "longitude": -0.579484
          },
          {
            "latitude": 44.873889,
            "longitude": -0.577364
          },
          {
            "latitude": 44.873991,
            "longitude": -0.575584
          }
        ],
        "infos": {
          "modeTransport": "Bus",
          "endingStop": "Les Aubiers (Bordeaux)",
          "beginningStop": "Lib\u00e9ration (M\u00e9rignac)",
          "direction": "Les Aubiers (station Tram) (Bordeaux)",
          "line": "35"
        },
        "mode": "public_transport",
        "fin": {
          "time": "20170120T202800",
          "coordinates": {
            "latitude": 44.873991,
            "longitude": -0.575584
          },
          "adress": "Les Aubiers (Bordeaux)"
        },
        "beginning": {
          "time": "20170120T200100",
          "coordinates": {
            "latitude": 44.857088,
            "longitude": -0.643579
          },
          "adress": "Lib\u00e9ration (M\u00e9rignac)"
        }
      },
      {
        "traceCoordonnees": [
          {
            "latitude": 44.873991,
            "longitude": -0.575584
          },
          {
            "latitude": 44.8740389268,
            "longitude": -0.575586631
          },
          {
            "latitude": 44.874045,
            "longitude": -0.575476
          },
          {
            "latitude": 44.87405,
            "longitude": -0.575373
          },
          {
            "latitude": 44.874063,
            "longitude": -0.575146
          },
          {
            "latitude": 44.874081,
            "longitude": -0.574896
          },
          {
            "latitude": 44.874138,
            "longitude": -0.573851
          },
          {
            "latitude": 44.874157,
            "longitude": -0.573507
          },
          {
            "latitude": 44.874216,
            "longitude": -0.572464
          },
          {
            "latitude": 44.874212,
            "longitude": -0.571867
          },
          {
            "latitude": 44.874222,
            "longitude": -0.571703
          },
          {
            "latitude": 44.874292,
            "longitude": -0.571049
          },
          {
            "latitude": 44.874319,
            "longitude": -0.570498
          },
          {
            "latitude": 44.874347,
            "longitude": -0.570372
          },
          {
            "latitude": 44.87433,
            "longitude": -0.569371
          },
          {
            "latitude": 44.874332,
            "longitude": -0.569244
          },
          {
            "latitude": 44.874346,
            "longitude": -0.56903
          },
          {
            "latitude": 44.874355,
            "longitude": -0.568906
          },
          {
            "latitude": 44.874378,
            "longitude": -0.568562
          },
          {
            "latitude": 44.87438,
            "longitude": -0.568476
          },
          {
            "latitude": 44.870483,
            "longitude": -0.566689
          },
          {
            "latitude": 44.870447,
            "longitude": -0.566518
          },
          {
            "latitude": 44.870398,
            "longitude": -0.566269
          },
          {
            "latitude": 44.870349,
            "longitude": -0.56601
          },
          {
            "latitude": 44.870318,
            "longitude": -0.565839
          },
          {
            "latitude": 44.870541,
            "longitude": -0.564867
          },
          {
            "latitude": 44.8705646462,
            "longitude": -0.5648122881
          },
          {
            "latitude": 44.8705646462,
            "longitude": -0.5648122881
          }
        ],
        "infos": null,
        "mode": "street_network",
        "fin": {
          "time": "20170120T204553",
          "coordinates": {
            "latitude": 44.8705646462,
            "longitude": -0.5648122881
          },
          "adress": "Boulevard Alfred Daney (Bordeaux)"
        },
        "beginning": {
          "time": "20170120T202800",
          "coordinates": {
            "latitude": 44.873991,
            "longitude": -0.575584
          },
          "adress": "Les Aubiers (Bordeaux)"
        }
      }
    ]
  }
]

```
