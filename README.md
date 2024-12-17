

## About Costessey Mills

This is a light weight app that was created to reduce the amount of posts of Facebook asking of Costessey or Taverham mill is open/flooded/closed.

## How to install
1. git clone https://github.com/auxilioit/costessey_mills.git
2. Copy .env.example to .env
3. composer update
4. php artisan migrate
5. php key:generate

## How to update
1. git pull origin master

master will always be the latest stable release

## Features
- Show locations, with basic stats of last 24 hours
- Accept reports, and set status based on majority vote in last 24 hours
- Scheduled task to update status every 1 hour

## Future Features
- Record location status history
- IP Block list
- Admin GUI for adding/editing/overriding Locations, Viewing Reports, Blocking IPs
- Subscriber list, for change alerts
