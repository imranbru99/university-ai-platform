<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>2023-02-14T07:41:35+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>2023-02-14T07:41:35+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('terms') }}</loc>
        <lastmod>2023-02-14T07:41:35+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('privacy') }}</loc>
        <lastmod>2023-02-14T07:41:35+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>


    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>2023-02-14T07:41:35+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('blog') }}</loc>
        <lastmod>2023-02-14T07:41:35+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach ($posts as $post)
        <url>
            <loc>{{ route('postDetails', $post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach





</urlset>
