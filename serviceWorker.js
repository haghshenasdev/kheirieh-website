const staticCacheName = "site-static-v1";
const cacheAssets = [
  "/",
  "/css/images/logo_blue.svg",
  "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css",
  "/css/style.css",
  "/js/pwa.js",
  "/500-500-logo.png"
];

self.addEventListener("install", evt => {
  evt.waitUntil(
    caches
      .open(staticCacheName)
      .then(cache => {
        console.log("caching assets...");
        cache.addAll(cacheAssets);
      })
      .catch(err => {})
  );
});

self.addEventListener("fetch", evt => {
  evt.respondWith(
    caches
      .match(evt.request)
      .then(res => {
        return res || fetch(evt.request);
      })
      .catch(err => {
        if (evt.request.url.indexOf(".html") > -1) {
          return caches.match("./pages/fallback.html");
        }
      })
  );
});