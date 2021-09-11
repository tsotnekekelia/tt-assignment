> The application runs in docker container.
> 
> To run the project first copy `.env.example` in the same directory and rename it to `.env`
> 
> In the terminal run below commands:


`./vendor/bin/sail up -d`

`./vendor/bin/sail artisan migrate`

`./vendor/bin/sail npm install`

`./vendor/bin/sail npm run dev`

>To check outgoing emails visit to mailhog at [http://localhost:8026/](http://localhost:8026/)
