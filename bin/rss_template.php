<?php
	echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
	echo '<?xml-stylesheet type="text/xsl" href="bin/preview.xsl"?>' . "\n";
	$selfRssUrl = str_replace('&', '&amp;', $requestUri);
?><rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <image>
            <url>https://www.sreality.cz/img/sreality-logo.png</url>
            <link>https://www.sreality.cz/</link>
            <title>Sreality.cz RSS</title>
        </image>
		<atom:link href="<?php echo $selfRssUrl; ?>" rel="self" type="application/rss+xml" />
        <link><?php echo $selfRssUrl; ?></link>
        <title>Sreality.cz RSS - page (<?php echo $page;?>/<?php echo ceil($totalCount / $limit); ?>)</title>
        <description>Sreality.cz Custom Configurable RSS Channel (total items count: <?php echo $totalCount; ?>).</description>
		<lastBuildDate><?php echo date(DATE_RSS, time()); ?></lastBuildDate>
		<generator>tomflidr/sreality-rss</generator>
		<?php foreach ($estates as $estate): ?><item>
		<title><?php echo $estate->title; ?></title>
		<link><?php echo str_replace('&', '&amp;', $estate->link); ?></link>
		<description><![CDATA[
		<a href="<?php echo $estate->link; ?>">
			<?php foreach ($estate->images as $image): ?>
				<img src="<?php echo $image; ?>" width="400" height="300" />
			<?php endforeach; ?>
		</a>
		<br />
		<a href="<?php echo $estate->link; ?>"><?php echo $estate->title; ?></a>
		<br />
		Cena: <?php echo $estate->price; ?>Kč<br />
		Nálepky: <?php echo $estate->labels; ?><br />
		Lokalita: <?php echo $estate->locality; ?><br />
		<?php if ($googleMapsApiKey): ?>
			<br />
			<img src="<?php echo completeMapImageUrl($estate, 8, 400, 300); ?>" width="400" height="300" />
			<img src="<?php echo completeMapImageUrl($estate, 15, 400, 300); ?>" width="400" height="300" />
		<?php endif; ?>
		]]></description>
		<guid isPermaLink="false"><?php echo $estate->guid; ?></guid>
		<?php /*<pubDate><?php echo date(DATE_RSS, $estate->date); ?></pubDate>*/ ?>
		<?php /*<pubDate>Mon, 01 Jan 2018 15:43:06 GMT</pubDate>*/ ?>
	</item><?php 
		endforeach; 
	?></channel>
</rss>