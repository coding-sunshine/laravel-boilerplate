- Separated protocol domain and url in .env and .env.example
- All default vendor published
- Installed predis/predis
- Sessions moved to Redis in .env file (.env.example not changed)
- Cache moved to Redis in .env file (.env.example not changed)
- Published stubs for default commands
- Added laravel/ui package to dev requirements
- Published auth with Vue UI
- Ignored generated files in public directory. This should only be generated via builds
- Added email verification by default
- Added Calebporzio Sushi package
- Added Livewire package, published content and made changes in composer script to make sure assets are upto date
- Added ApineJS
- Added Laravel Debugbar package to dev requirements
- Added Nunomaduro Larastan for static analysis to dev requirements (Usage: ``` ./vendor/bin/phpstan analyse --memory-limit=2G ```)


