# API Documentation
#### v1.0
```
/api
    /timesheet
        /add
        /get
        /edit
        /delete
        /export
    /workorders
        /add
        /get
        /edit
        /archive
        /unarchive
        /delete
    /user
        /register
        /login
        /authenticate
        /logout
        /name
        /type
```
---
## /api/timesheet/add
#### POST
```
KEY: TYPE                           EXAMPLE
-------------------------------------------
workorder: int                      132132
description: str                    "Hello, world!"
length: time range                  ?
date: str datetime                  "12/27/2019"
```
---
## /api/timesheet/get
#### GET
```
KEY: TYPE                           EXAMPLE
-------------------------------------------
uid: str                            "ABEF0189"
range: str int range                "0-49"
daterange: str datetime range       "12/27/2019-12/28/2019"
```
---
## /api/timesheet/edit
#### POST
```
KEY: TYPE                           EXAMPLE
-------------------------------------------
uid: str                            ABEF0189
workorder: int                      132132
description: str                    "Hello, world!"
length: time range                  ?
date: str datetime                  "12/27/2019"
```
---
## /api/timesheet/delete
#### DELETE
```
KEY: TYPE                           EXAMPLE
-------------------------------------------
uid: str                            ABEF0189
```
---
## /api/timesheet/export
#### GET
```
KEY: TYPE                           EXAMPLE
-------------------------------------------
daterange: datetime range           "12/27/2019-12/28/2019"
format: str mimetype                "application/x-xlsx-bju-timesheet"
```
---