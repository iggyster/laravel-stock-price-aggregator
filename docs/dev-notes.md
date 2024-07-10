# Development notes

1. Cover app with tests
    * (required) unit-tests (for every single unit in the app folder)
2. Apply [Offensive Programming](https://en.wikipedia.org/wiki/Offensive_programming) approach by adding and implementing [Asserts](https://github.com/beberlei/assert).
3. Implement API authentication to increase app security
4. Add CORS
5. Add make-file to simplify installation and configuration.
6. Setup crontab to run scheduler automatically after container deployed.

   The main job has been created, but it's not executed automatically each minute.
   Manual approach is used instead.

7. Update RateLimiter

   Current rate limiter implementation doesn't match API limits (25 request/day).
   It must be updated as a new decorator around AlphaVantage services (not cached one).

8. Improve SQL requests to more elegant

   SQL requests wasn't analyzed so their performance may be improved.

9. Calculation formula must be separated from repository (apply strategy pattern to maintain algorithm change). 

