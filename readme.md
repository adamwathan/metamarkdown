# MetaMarkdown

MetaMarkdown is a helpful little tool for parsing metadata out of the beginning of a (Multi)Markdown file. It isn't a true MultiMarkdown parser, but all I needed was the metadata, so that's all that's here.

## Usage

Simply pass the path of the file you want to parse into the constructor of a MetaMarkdown object. All of the meta tags will become available as public attributes of the object, and the compiled HTML is available via the 'html' attribute.

	use AdamWathan\MetaMarkdown\MetaMarkdown;

	$metaMarkdown = new MetaMarkdown($myFilePath);

Given the following Markdown file:

	Title: My First Article
	Author: John Doe
	Date: 2013-07-11

	# My First Article

	How exciting.

...the resulting MetaMarkdown object will look like this:

$metaMarkdown->title; // My First Article
$metaMarkdown->author; // Adam Wathan
$metaMarkdown->date; // 2013-07-11

$metaMarkdown->html; // the compiled HTML