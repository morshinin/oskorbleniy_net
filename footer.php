        </main>
        <footer class="flex justify-between text-gray-400 text-sm mt-auto p-4 border-t border-gray-100 border-solid">
            <div>
                Автор: Михаил Моршинин.&nbsp;
                <a href="morshinin.ru">morshinin.ru</a>.&nbsp;
                <a href="mailto:inbox@morshinin.ru">inbox@morshinin.ru</a>
            </div>
            <div>
                Версия 0.2.0&nbsp;
                <a href="https://github.com/morshinin/oskorbleniy_net">GitHub</a>
            </div>
            <div>
                <div>Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div></div>
        </footer>
        <?php $show_ya_metrica = $_SERVER['REQUEST_URI'] === 'localhost' ? false : true; ?>
        <!-- Yandex.Metrika counter -->
        <?php if ($show_ya_metrica) { ?>
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(71697025, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/71697025" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <?php } ?>
    </body>
</html>
