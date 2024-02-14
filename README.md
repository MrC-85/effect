# Effect Code Test

The object of this test is to upload a base64 encoded PDF & use AWS Textract API to extract the text and store the result in a DB.

## To Use:
- Checkout code from [GitHub](https://github.com/MrC-85/effect)
- Install composer dependencies
- Populate .env file (database & AWS credentials)
- Run php artisan migrate
- Run php artisan generate:test-token to generate a bearer token
- Using the generated token make a POST request to /api/pdf/store with 'file' set as the base64encoded pdf in the body
- If successful you will recieve the created object in the response
- If unsuccessful you will recieve an error response with message


## Additions.
If I was to spend more time on this project the main thing I would chamge would be to move the proccessing logic to a queue (with AWS' async commands) which would keep the API's response time down.<br /> 
I would also add more fine-grained permissions and possibly a UI to see all of the processed documents etc
