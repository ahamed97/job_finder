## Installation Steps

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

### Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

import job_finder.sql
```
DB_HOST=localhost
DB_DATABASE=job_finder
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

> Troubleshooting: **Specified key was too long error**. If you see this error message you have an outdated version of MySQL, use the following solution: https://laravel-news.com/laravel-5-4-key-too-long-error

And we're all good to go!

Start up a local development server with `php artisan serve`.
###  API Endpoits

1-`{baseUrl}`/api/v1/vacancies/`{Vacancy Id}`

Response

`{
    "data": {
        "id": 1,
        "job_title": "avc",
        "seniority_level": "adwq",
        "country": "wqweq",
        "city": "ewfdew",
        "salary": "35435",
        "currency": "wfeew",
        "company_size": "233",
        "company_domain": "sdfsd",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "skills": [
            {
                "id": 1,
                "name": "kkk",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "pivot": {
                    "vacancy_id": 1,
                    "skill_id": 1
                }
            }
        ]
    }
}`

2-`{baseUrl}`/api/v1/vacancies?search=`{Search String}`&sort=`{asc}`

Response

`{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "job_title": "avc",
            "seniority_level": "a",
            "country": "wqweq",
            "city": "ewfdew",
            "salary": "35435",
            "currency": "wfeew",
            "company_size": "233",
            "company_domain": "sdfsd",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "skills": [
                {
                    "id": 1,
                    "name": "kkk",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "pivot": {
                        "vacancy_id": 1,
                        "skill_id": 1
                    }
                }
            ]
        },
        {
            "id": 2,
            "job_title": "avc",
            "seniority_level": "b",
            "country": "wqweq",
            "city": "ewfdew",
            "salary": "23432",
            "currency": "wfeew",
            "company_size": "233",
            "company_domain": "sdfsd",
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "skills": []
        }
    ],
    "first_page_url": "http://job_finder.test/api/v1/vacancies?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://job_finder.test/api/v1/vacancies?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://job_finder.test/api/v1/vacancies?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://job_finder.test/api/v1/vacancies",
    "per_page": 15,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}`

3-`{baseUrl}`/api/v1/matching-position?current_experiences_level=`{Current Level}`&skills=`{Comma Separated Skill List}`

Response

`{
    "data": {
        "id": 1,
        "job_title": "avc",
        "seniority_level": "adwq",
        "country": "wqweq",
        "city": "ewfdew",
        "salary": "35435",
        "currency": "wfeew",
        "company_size": "233",
        "company_domain": "sdfsd",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "skills": [
            {
                "id": 1,
                "name": "kkk",
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "pivot": {
                    "vacancy_id": 1,
                    "skill_id": 1
                }
            }
        ]
    }
}`

...



