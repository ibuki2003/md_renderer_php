<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
    <meta charset="UTF-8">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132805532-1"></script>
    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-132805532-1');</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/markdown/style.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/github.min.css" crossorigin="anonymous">
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.css" integrity="sha384-AfEj0r4/OFrOo5t7NnNe46zW/tFgW6x/bCJG8FqQCEo3+Aro6EYUG4+cU+KJWu/X" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.js" integrity="sha384-g7c+Jr9ZivxKLnZTDUhnkOnsh30B4H0rpLUpJ4jAIKs4fnJI+sEnkvrMWph2EDg4" crossorigin="anonymous"></script>
    <script>
        function unsanitize(html) {
            const e = document.createElement('div');
            e.innerHTML = html;
            return e.innerText;
        }
        window.addEventListener('load', ()=>{
            Array.from(document.getElementsByClassName('tex')).forEach((e) => {
                const tex = unsanitize(e.innerHTML);
                katex.render(tex, e, {displayMode: e.nodeName == 'P'});
                e.title=tex;
            });
            window.hljs.initHighlighting();
        });
    </script>

    <title><?=$title ? $title . ' - ' : '' ?>ふわわあのへや</title>
</head>
<body>
    <header>
        <a href="/" class="navbar-brand">ふわわあのへや</a>
        <small>競プロとか、好きなこと、いろいろ。</small>
    </header>
    <main id="md">
        <article>
<?=$content ?>
        </article>
    </main>

    <footer>
        <small>ibuki2003</small>
        <ul>
<? foreach ([
    ["twitter", "https://twitter.com/ibuki2003"],
    ["github", "https://github.com/ibuki2003"],
    ["zenn", "https://zenn.dev/fuwa2003"],
    ["qiita", "https://qiita.com/ibuki2003"],
    ["telegram", "https://t.me/ibuki2003"],
    ["stackoverflow", "https://stackoverflow.com/users/11062133/ibuki2003"],
] as $i): ?>
            <li><a href="<?=$i[1]?>" aria-label="<?=$i[0]?>"><img src="/markdown/link_icons/<?=$i[0]?>.svg"></a></li>
<? endforeach ?>
        </ul>
    </footer>
    </body>
</html>
