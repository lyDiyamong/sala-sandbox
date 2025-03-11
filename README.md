## About Sala Sandbox

Sala Sandbox is a standalone app, built by Sala Tech Team with the intention to allow external developers or freelancer to be able produce the apps/reports and submit to Sala's marketplace. Here are the features of Sala Sandbox:

- Developer Account
- API guideline
- Sandbox Environment for Testing
- Create a new app or report
- Deploy App to the market place

More features are coming in the future.

## Getting Started

Sala Sandbox is built base on Laravel Framework 12, include VueJs 3 and Antd Template.

The environment is based on dockerized containers, so to get started, you must install docker desktop on your local machine.
Below are the step by step to install the application:

- Clone the code from git server
- Copy .env.example, and rename to .env
- Update your database configuration to match with the postgres container. You may find the information about database's credential in docker-compose.yml
- Build your containers: docker compose up -d
- Remote to your app container: docker compose exec -it app bash
- Start your vite server: npm install & npm run dev
- You may access to your browser: http://locahost:8300
