<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0">
    <channel>
        <title>
            <![CDATA[ pwtem.com ]]>
        </title>
        <link>
        <![CDATA[ https://pwtem.com/feed ]]>
        </link>
        <description>
            <![CDATA[ PHD WRITER TEAM ]]>
        </description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach ($posts as $post)
            <item>
                <title>
                    <![CDATA[{{ $post->title }}]]>
                </title>
                <link>{{ $post->slug }}</link>
                <description>
                    <![CDATA[@php $post->description @endphp]]>
                </description>
                <category>{{ $post->category }}</category>
                <author>
                    <![CDATA[Hardk Savani]]>
                </author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
