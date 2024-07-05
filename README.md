Вы можете использовать для тестирования коллекцию Postman.

Если вы запустили проект через php artisan serve, то данный json можно использовать без правок, иначе отредактируйте переменную "base_url"  в соответствии с host на котором будет доступен проект.

```{
	"info": {
		"_postman_id": "57d13ec3-325a-45e3-bdc5-678cd03ce005",
		"name": "Task Manager API",
		"description": "API for managing tasks",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "4201497"
	},
	"item": [
		{
			"name": "Create Task",
			"request": {
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n    \"title\": \"New Task\",\n    \"description\": \"Task description\",\n    \"status\": \"pending\",\n    \"due_date\": \"2024-07-10\"\n}"
				},
				"url": {
					"raw": "{{base_url}}/api/tasks",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get Tasks",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{base_url}}/api/tasks",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get Task by ID",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{base_url}}/api/tasks/1",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Update Task",
			"request": {
				"method": "PUT",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json",
						"type": "text"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n    \"title\": \"Updated Task\",\n    \"description\": \"Updated task description\",\n    \"status\": \"in_progress\",\n    \"due_date\": \"2024-07-15\"\n}"
				},
				"url": {
					"raw": "{{base_url}}/api/tasks/2",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks",
						"2"
					]
				}
			},
			"response": []
		},
		{
			"name": "Delete Task",
			"request": {
				"method": "DELETE",
				"header": [],
				"url": {
					"raw": "{{base_url}}/api/tasks/1",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Filter Tasks by Status",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{base_url}}/api/tasks?status=in_progress",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks"
					],
					"query": [
						{
							"key": "status",
							"value": "in_progress"
						}
					]
				}
			},
			"response": []
		},
		{
			"name": "Filter Tasks by Due Date",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "{{base_url}}/api/tasks?due_date=2024-05-10",
					"host": [
						"{{base_url}}"
					],
					"path": [
						"api",
						"tasks"
					],
					"query": [
						{
							"key": "due_date",
							"value": "2024-05-10"
						}
					]
				}
			},
			"response": []
		}
	],
	"event": [
		{
			"listen": "prerequest",
			"script": {
				"type": "text/javascript",
				"packages": {},
				"exec": [
					""
				]
			}
		},
		{
			"listen": "test",
			"script": {
				"type": "text/javascript",
				"packages": {},
				"exec": [
					""
				]
			}
		}
	],
	"variable": [
		{
			"key": "base_url",
			"value": "127.0.0.1:8000",
			"type": "string"
		}
	]
}```
