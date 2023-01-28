# ColoCount

#### To run our application on your computer, you need to have the following instructions:

```shell
git clone https://github.com/Hundraw/colocount.git
```
### Development
___
- Install dependencies : `make dev.install`
- Run the development server: 
  - `make dev.up`
  - `make sudo.dev.up` if you have permission issues.
  - `docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d` if you don't have `make` installed.
- Stop the development server: 
  - `make dev.down`
  - `make sudo.dev.down` if you have permission issues.
  - `docker compose -f docker-compose.yml -f docker-compose.dev.yml down` if you don't have `make` installed.

### Production
___
- Run the production server: 
  - `make prod.up`
  - `make sudo.prod.up` if you have permission issues.
  - `docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d` if you don't have `make` installed.
- Stop the production server: 
  - `make prod.down`
  - `make sudo.prod.down` if you have permission issues.
  - `docker compose -f docker-compose.yml -f docker-compose.prod.yml down` if you don't have `make` installed.


J'ai fait une modif qui sert a rien
     
